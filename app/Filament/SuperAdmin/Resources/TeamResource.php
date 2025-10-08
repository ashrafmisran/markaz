<?php

namespace App\Filament\SuperAdmin\Resources;

use App\Models\Team;
use App\Models\User;
use BackedEnum;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Actions\CreateAction;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Filament\Tables\Columns\TextColumn;

class TeamResource extends Resource
{
    protected static ?string $model = Team::class;

    protected static BackedEnum|string|null $navigationIcon = 'heroicon-o-user-group';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->schema([
                TextInput::make('name')->required(),

                // Owner (optional)
                Select::make('owner_id')
                    ->label('Setiausaha')
                    ->relationship('owner', 'name')
                    ->searchable()
                    ->preload()
                    ->placeholder('Pilih Setiausaha')
                    ->createOptionForm([
                        TextInput::make('name')->required(),
                        TextInput::make('email')->email()->required(),
                        TextInput::make('password')->required()->password(),
                    ]),

                // Select existing users to attach to the team
                Select::make('members')
                    ->label('AJK')
                    ->multiple()
                    ->relationship('members', 'name')
                    ->searchable()
                    ->preload()
                    ->createOptionForm([
                        TextInput::make('name')->required(),
                        TextInput::make('email')->email()->required(),
                        TextInput::make('password')->required()->password(),
                    ]),

            ]);
    }

    /**
     * Create any users added via the inline repeater before creating the Team.
     */
    public static function mutateFormDataBeforeCreate(array $data): array
    {
        $newMemberIds = [];

        if (! empty($data['new_members']) && is_array($data['new_members'])) {
            foreach ($data['new_members'] as $member) {
                if (empty($member['email'])) {
                    continue;
                }

                $user = User::firstOrCreate([
                    'email' => $member['email'],
                ], [
                    'name' => $member['name'] ?? $member['email'],
                    'password' => bcrypt($member['password'] ?? 'password'),
                ]);

                $newMemberIds[] = $user->id;
            }
        }

        // Merge any existing selected members with newly created ones.
        $existing = $data['members'] ?? [];
        $merged = array_merge(is_array($existing) ? $existing : [], $newMemberIds);

        $data['members'] = array_values(array_unique($merged));

        // Remove the repeater data so it doesn't attempt to be saved to the teams table.
        unset($data['new_members']);

        return $data;
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id'),
                TextColumn::make('name'),
                TextColumn::make('owner.name')->label('Setiausaha'),
                TextColumn::make('members_count')->label('Bil. AJK')
                    ->counts('members')
                    ->suffix(' orang'),
            ])
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->headerActions([
                CreateAction::make()
            ])
            ->filters([]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTeams::route('/'),
            'create' => Pages\CreateTeam::route('/create'),
            'edit' => Pages\EditTeam::route('/{record}/edit'),
        ];
    }
}

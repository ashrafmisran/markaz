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
use Filament\Actions\Action;

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
                TextColumn::make('name')
                    ->searchable()
                    ->sortable()
                    ->description(fn ($record): string => $record->owner?->name ? "Admin: {$record->owner->name}" : 'Tiada admin ditetapkan'),
                TextColumn::make('members_count')->label('Bil. AJK')
                    ->counts('members')
                    ->suffix(' orang'),
            ])
            ->recordActions([
                EditAction::make()
                    ->iconButton(),
                DeleteAction::make()
                    ->iconButton()
                    ->requiresConfirmation(),
                Action::make('add-member')
                    ->iconButton()
                    ->form([
                        Select::make('members')
                            ->label('Pilih AJK')
                            ->multiple()
                            ->relationship('members', 'name')
                            ->preload()
                            ->searchable()
                            ->placeholder('Pilih AJK untuk ditambah')
                            ->createOptionForm([
                                TextInput::make('name')->required(),
                                TextInput::make('email')->email()->required(),
                                TextInput::make('password')->required()->password(),
                            ])
                            ->helperText('Jika AJK belum wujud, mereka akan dicipta secara automatik.'),
                    ])
                    ->action(function (Request $request, Team $record, array $data) {
                        if (empty($data['members']) || ! is_array($data['members'])) {
                            return;
                        }

                        $record->members()->attach($data['members']);

                        // If the current user is a member of this team, refresh their session.
                        if (in_array(Auth::id(), $data['members'] ?? [])) {
                            Auth::user()->refreshCurrentTeamSession();
                        }
                    })
                    ->requiresConfirmation()
                    ->color('success')
                    ->icon('heroicon-o-user-plus')
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
        ];
    }
}

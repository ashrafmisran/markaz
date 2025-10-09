<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Filament\Models\Contracts\HasTenants;
use Filament\Panel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class User extends Authenticatable implements HasTenants
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Return the tenants the user has access to for the given panel.
     *
     * Safe default: return an empty array. Replace this with your
     * actual tenant lookup (for example: $this->teams or related model).
     *
     * @return array<Model>|Collection
     */
    public function getTenants(Panel $panel): array | Collection
    {
        // Return the teams the user belongs to for Filament tenancy.
        if (method_exists($this, 'teams')) {
            return $this->teams()->get();
        }

        return [];
    }

    /**
     * Whether the user can access the provided tenant instance.
     *
     * Safe default: allow access to all tenants returned from getTenants().
     */
    public function canAccessTenant(Model $tenant): bool
    {
        if (method_exists($this, 'teams')) {
            return $this->teams()->where('teams.id', $tenant->getKey())->exists();
        }

        return false;
    }

    /**
     * The teams that this user belongs to.
     */
    public function teams(): BelongsToMany
    {
        return $this->belongsToMany(Team::class, 'team_user')->withTimestamps();
    }

    public function portfolios()
    {
        return $this->hasMany(Portfolio::class, 'user_id');
    }

    public function memberships()
    {
        return $this->hasOne(Membership::class, 'user_id');
    }
}

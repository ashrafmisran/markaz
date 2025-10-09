<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'owner_id',
        'public_id',
    ];

    public function members()
    {
        return $this->belongsToMany(User::class, 'team_user')->withTimestamps();
    }

    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

    protected static function booted(): void
    {
        static::creating(function (Team $team) {
            if (empty($team->public_id)) {
                $team->public_id = Illuminate\Support\Str::random(24);
            }
        });
    }

    public function getRouteKeyName(): string
    {
        return 'public_id';
    }
}

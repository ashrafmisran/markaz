<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    protected $fillable = [
        'name',
        'description',
        'program_start',
        'program_end',
        'team_id',
        'creator_id',
        'location',
    ];

    public function team()
    {
        return $this->belongsTo(Team::class);
    }
}

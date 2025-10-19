<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Meeting extends Model
{
    protected $fillable = [
        'title',
        'date',
        'time',
        'location',
        'team_id',
        'minutes',
    ];

    public function team()
    {
        return $this->belongsTo(Team::class);
    }

    protected $casts = [
        'date' => 'date',
        'time' => 'datetime:H:i',
    ];
    
    public function agendas()
    {
        return $this->hasMany(Agenda::class);
    }
}

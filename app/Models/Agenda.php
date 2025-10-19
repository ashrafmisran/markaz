<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    protected $fillable = [
        'meeting_id',
        'title',
        'description',
        'order',
        'presented_by',
        'decision',
        'status',
    ];

    public function meeting()
    {
        return $this->belongsTo(Meeting::class);
    }

    public function presenter()
    {
        return $this->belongsTo(Person::class, 'presented_by', 'mykad');
    }

    public function team()
    {
        return $this->belongsTo(Team::class);
    }
}

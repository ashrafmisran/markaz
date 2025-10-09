<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
    protected $fillable = [
        'name',
        'state_id',
    ];

    public function state()
    {
        return $this->belongsTo(State::class);
    }

    public function branches()
    {
        return $this->hasMany(Branch::class);
    }
}

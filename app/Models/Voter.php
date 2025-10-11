<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Voter extends Model
{
    protected $fillable = [
        'mykad',
        'name',
        'house_no',
        'locality_id',
        'daerah_mengundi_id',
        'dun_id',
        'parliament_id',
        'saluran',
        'no_siri',
        'has_voted',
    ];

    public function person()
    {
        return $this->belongsTo(Person::class, 'mykad', 'mykad');
    }
}

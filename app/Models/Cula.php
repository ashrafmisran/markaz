<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cula extends Model
{
    protected $table = 'cula';

    protected $fillable = [
        'name',
        'description',
        'recorded_by',
        'remark',
        'mykad',
        'source',
        'kod_cula_id',
    ];

    public function people() : hasMany
    {
        return $this->hasMany(Person::class, 'mykad', 'mykad');
    }
}

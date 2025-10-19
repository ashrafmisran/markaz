<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dun extends Model
{
    protected $table = 'dun';

    protected $fillable = [
        'name',
        'code',
        'parliament_id',
    ];

}

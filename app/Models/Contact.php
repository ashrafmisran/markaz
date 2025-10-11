<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Contact extends Model
{
    protected $table = 'contacts';

    protected $fillable = [
        'type',
        'value',
        'mykad',
        'is_primary',
        'remark',
    ];

    public function person() : BelongsTo
    {
        return $this->belongsTo(Person::class, 'mykad', 'mykad');
    }
}

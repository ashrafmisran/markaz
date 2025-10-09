<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Account extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'team_id',
        'category',
        'code_no',
        'name',
        'account_number',
        'bank_name',
        'description',
        'initial_balance',
    ];

    public function team()
    {
        return $this->belongsTo(Team::class);
    }
}

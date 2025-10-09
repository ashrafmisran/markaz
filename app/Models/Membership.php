<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Membership extends Model
{
    protected $fillable = [
        'user_id',
        'mykad',
        'membership_no',
        'state_id',
        'division_id',
        'branch_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function state()
    {
        return $this->belongsTo(State::class);
    }

    public function division()
    {
        return $this->belongsTo(Division::class);
    }

    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }
}

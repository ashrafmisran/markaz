<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Membership extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'mykad',
        'membership_no',
        'state_id',
        'division_id',
        'branch_id',
        'status',
        'fee_type',
        'joined_since',
        'address',
        'phone_1',
        'phone_2',
        'email',
        'old_ic',
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

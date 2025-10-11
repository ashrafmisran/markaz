<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    protected $fillable = [
        'team_id',
        'name',
        'ic_no',
        'email',
        'phone',
        'address',
        'city',
        'state',
        'postal_code',
        'country',
        'description',
    ];

    public function team()
    {
        return $this->belongsTo(Team::class);
    }

    public function cula() : hasMany
    {
        return $this->hasMany(Cula::class, 'mykad', 'mykad');
    }

    public function contacts() : hasMany
    {
        return $this->hasMany(Contact::class, 'mykad', 'mykad');
    }

    public function attendances() : hasMany
    {
        return $this->hasMany(Attendance::class, 'mykad', 'mykad');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'mykad', 'mykad');
    }

    public function memberships() : belongsTo
    {
        return $this->belongsTo(Membership::class, 'mykad', 'mykad');
    }

    public function voting_record() : belongsTo
    {
        return $this->belongsTo(Voter::class, 'mykad', 'mykad');
    }

    public function residing_address() : hasMany
    {
        return $this->hasMany(Contact::class, 'mykad', 'mykad');
    }
}

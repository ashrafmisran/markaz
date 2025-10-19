<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\hasOne;

class Person extends Model
{
    protected $fillable = [
        'name',
        'mykad',
        'old_ic',
        'gender',
        'birthdate',
        'birthplace',
        'race',
        'religion',
        'marital_status',
        'occupation',
        'education_level',
        'education_course',
        'current_employer',
        'photo_path',
    ];

    public function cula() : hasMany
    {
        return $this->hasMany(Cula::class, 'mykad', 'mykad');
    }

    public function birthplace_state()
    {
        return $this->belongsTo(State::class, 'birthplace_state_id');
    }

    public function contacts() : hasMany
    {
        return $this->hasMany(Contact::class, 'mykad', 'mykad');
    }

    public function attendances() : hasMany
    {
        return $this->hasMany(Attendance::class, 'mykad', 'mykad');
    }

    public function father()
    {
        return $this->belongsTo(Person::class, 'father_id');
    }

    public function mother()
    {
        return $this->belongsTo(Person::class, 'mother_id');
    }

    public function dependants()
    {
        return $this->hasMany(Person::class, 'father_id')
            ->orWhere('mother_id', $this->id);
    }

    public function emails() : hasMany
    {
        return $this->hasMany(Contact::class, 'mykad', 'mykad')
            ->where('type', 'email');
    }

    public function phones() : hasMany
    {
        return $this->hasMany(Contact::class, 'mykad', 'mykad')
            ->where('type', 'phone');
    }

    public function addresses() : hasMany
    {
        return $this->hasMany(Contact::class, 'mykad', 'mykad')
            ->where('type', 'address');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'mykad', 'mykad');
    }

    public function memberships() : belongsTo
    {
        return $this->belongsTo(Membership::class, 'mykad', 'mykad');
    }

    public function voting_record() : hasOne
    {
        return $this->hasOne(Voter::class, 'mykad', 'mykad');
    }

    public function residing_address() : hasMany
    {
        return $this->hasMany(Contact::class, 'mykad', 'mykad');
    }
}

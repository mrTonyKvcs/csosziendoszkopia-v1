<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Consultation extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id', 'day','open', 'close', 'is_digital', 'office_id'
    ];

    public function appointments()
    {
        return $this->hasMany(Appointment::class)
            ->with('applicant');
    }

    public function office()
    {
        return $this->belongsTo(Office::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //Scopes
    public function scopeActive($query)
    {
        return $query->where('day', '>', now());
    }
}

<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'contact',
        'avatar',
        'bio',
        'key_skills',
        'city',
        'country',
        'resume',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function educations()
    {
        return $this->hasMany(Educations::class);
    }

    public function certifications()
    {
        return $this->hasMany(Certifications::class);
    }

    public function experiences()
    {
        return $this->hasMany(Experiences::class);
    }

    public function jobs()
    {
        return $this->hasMany(Job::class);
    }

    // User applied on which jobs pivot table
    public function applied_on_jobs()
    {
        return $this->hasMany(AppliedJobs::class);
    }

    // User saved jobs pivot table
    public function saved_jobs()
    {
        return $this->hasMany(SavedJobs::class);
    }

}

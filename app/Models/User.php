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
        'slug',
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

    /**
     * Boot the model.
     */
    protected static function booted()
    {
        static::creating(function ($model) {
            if (empty($model->slug)) {
                $model->slug = static::generateSlug($model->name);
            }
        });

        static::updating(function ($model) {
            if ($model->isDirty('name') && !$model->isDirty('slug')) {
                $model->slug = static::generateSlug($model->name);
            }
        });
    }

    /**
     * Generate a unique slug.
     */
    private static function generateSlug($name)
    {
        $slug = \Illuminate\Support\Str::slug($name);
        $originalSlug = $slug;
        $count = 1;

        while (static::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $count;
            $count++;
        }

        return $slug;
    }

    /**
     * Get the route key for the model.
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }


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

    public function posts()
    {
        return $this->hasMany(Post::class);
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

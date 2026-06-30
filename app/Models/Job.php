<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected $fillable = [
        'role',
        'company',
        'company_website',
        'location',
        'job_type',
        'category',
        'description',
        'salary',
        'skills',
        'qualification',
        'user_id',
        'slug'
    ];

    /**
     * Boot the model.
     */
    protected static function booted()
    {
        static::creating(function ($model) {
            if (empty($model->slug)) {
                $model->slug = static::generateSlug($model->role, $model->company);
            }
        });

        static::updating(function ($model) {
            if (($model->isDirty('role') || $model->isDirty('company')) && !$model->isDirty('slug')) {
                $model->slug = static::generateSlug($model->role, $model->company);
            }
        });
    }

    /**
     * Generate a unique slug.
     */
    private static function generateSlug($role, $company)
    {
        $slug = \Illuminate\Support\Str::slug($role . '-' . $company);
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

    /**
     * Get the user that owns the education.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function appliedusers()
    {
        return $this->belongsToMany(User::class, 'applied_jobs', 'job_id', 'user_id')
                    ->withTimestamps();
    }

    public function userappliedjobs(){
        return $this->belongsToMany(Job::class, 'applied_jobs', 'user_id', 'job_id')
                    ->withTimestamps();
    }

    
    public function savedusers()
    {
        return $this->belongsToMany(User::class, 'saved_jobs', 'job_id', 'user_id')
                    ->withTimestamps();
    }

    public function savedjobs()
    {
        return $this->belongsToMany(Job::class, 'saved_jobs', 'job_id', 'user_id')
                    ->withTimestamps();
    }
    
}

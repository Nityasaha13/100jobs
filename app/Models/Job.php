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
        'user_id'
    ];

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
    
}

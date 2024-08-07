<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certifications extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'institution',
        'grade',
        'year',
        'duration',
        'user_id',
    ];

    /**
     * Get the user that owns the cer.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

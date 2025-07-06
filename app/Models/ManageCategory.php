<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ManageCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'cat_id',
        'post_id', 
        'post_type'
    ];

}

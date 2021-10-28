<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    const Pending = 'pending';
    const Verified = 'verified';

    protected $fillable = [
        'name', 
        'logo', 
        'user_id', 
        'intro', 
        'verification',
        'about', 
        'email', 
        'location', 
        'address',
        'telephone',
        'mobile'
    ];

}

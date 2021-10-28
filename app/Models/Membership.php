<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Membership extends Model
{
    use HasFactory;
    const Standard = 'Standard';
    const Professional = 'Professional';
    const Pending = 'pending';
    const Accepted = 'accepted';
    const Revoked = 'revoked';

    protected $fillable = [
        'code',
        'company_id',
        'type',
        'billing',
        'status',
        'expiration'
    ];

    

}

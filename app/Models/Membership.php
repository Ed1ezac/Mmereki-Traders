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
    const Expired = 'expired';
    const Revoked = 'revoked';

    protected $fillable = [
        'code',
        'company_id',
        'type',
        'billing',
        'status',
        'expiration'
    ];

    public function scopeForCompany($query, $company){
        return $query->where('company_id', $company->id)->first();
    }

    public function updateStatus($newStatus){
        return $this->update([
            'status' => $newStatus
        ]);
    }

}

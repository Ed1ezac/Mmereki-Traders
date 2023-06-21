<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;
    //status
    const Active = 'active';
    const Expired = 'expired';
    //plans
    const Trial = 'Trial';
    const Standard = 'Standard';
    const Professional = 'Professional';

    protected $fillable = [
        'company_id',
        'membership_id',
        'type',
        'amount',
        'status',
        'expiry',
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

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Membership extends Model
{
    use HasFactory;

    const Trial = 'Trial';
    const Standard = 'Standard';
    const Professional = 'Professional';
    const Active = 'active';
    const Expired = 'expired';
    const Elevated = 'elevated';
    const Disabled = 'disabled';

    protected $fillable = [
        'code',
        'company_id',
        'type',
        'billing',
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

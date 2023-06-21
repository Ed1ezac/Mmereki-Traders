<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Membership extends Model
{
    use HasFactory;

    const Active = 'active';
    const Elevated = 'elevated';
    const Disabled = 'disabled';

    protected $fillable = [
        'code',
        'company_id',
        'status',
    ];

    public function scopeForCompany($query, $company){
        return $query->where('company_id', $company->id)->first();
    }

    public function updateStatus($newStatus){
        return $this->update([
            'status' => $newStatus
        ]);
    }

    public function subscriptions(){
        return $this->hasMany(Subscription::class);
    }

}

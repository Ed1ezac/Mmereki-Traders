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

    public function scopeForUser($query, $user){
        return $query->where('user_id', $user->id);
    }

    public function scopeWithName($query, $name)
    {
        return $query->where('name', 'LIKE', '%'.$name.'%');
    }

    public function scopeWithExactName($query, $name)
    {
        return $query->where('name', $name);
    }

    public function scopeWithTrade($query, $trade)
    {
        return $query->whereHas('trades', function ($inner) use ($trade) {
                $inner->where('trade_id', '=', $trade->id);
        });
    }

    public function scopeAtLocation($query, $loc)
    {
        return $query->where('location', 'LIKE', '%'.$loc.'%');
    }

    public function scopeAtExactLocation($query, $loc)
    {
        return $query->where('location', $loc);
    }

    public function trades()
    {
        return $this->hasMany(CompanyTrades::class);//, 'company_has_trade');
    }
}

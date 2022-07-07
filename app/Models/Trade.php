<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trade extends Model
{
    use HasFactory;

    protected $fillable = ['name'];


    public function scopeWithName($query, $name)
    {
        return $query->where('name', 'LIKE', '%'.$name.'%');
    }

    public function scopeWithExactName($query, $name)
    {
        return $query->where('name', $name);
    }

    public function companies(){
        
        return $this->belongsToMany(Company::class, 'company_has_trade');
    }
}

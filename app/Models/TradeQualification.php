<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TradeQualification extends Model
{
    protected $fillable = ['path', 'user_id', 'company_id'];

    public function scopeForUser($query, $user){
        return $query->where('user_id', $user->id)
                ->take(4)->latest()->get();
    }

    public function scopeForCompany($query, $company){

    }

    public static function updateRecord(array $data){
        return TradeQualification::create([
            'path' => $data['path'],
            'user_id' => $data['user_id'],
            'comapny_id' => $data['company_id'],
        ]);
    }

    public function deleteRecord(){
        return $this->delete();
    }

}

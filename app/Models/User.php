<?php

namespace App\Models;

use Illuminate\Support\Facades\Hash;
use Illuminate\Contracts\Auth\MustVerifyEmail;
//use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable, HasRoles;//HasFactory,

    const Trader = 'Trader';
    const Moderator = 'Moderator';
    const Administrator = 'Administrator';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function company(){
        return $this->hasOne(Company::class);
    }

    public function updateRecord(array $values){
        return $this->update([
            'name' => trim($values['first-name']).' '.trim($values['last-name']),
            'email' => $values['email'],
            'password' => Hash::make($values['password']),
        ]);
    }

    public function getInitialsAttribute(){
        //call with usr->initials
        $names = explode(' ', $this->name);
        return $names[0][0].$names[count($names)-1][0];
    }

}

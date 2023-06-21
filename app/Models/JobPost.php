<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobPost extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'timing',
            'location', 'reply_count', 'status' ];

    //Trades for this job
    public function tags(){

    }

    //replies
    public function bids(){

    }
}

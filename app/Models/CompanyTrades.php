<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompanyTrades extends Model
{
    protected $table = 'company_has_trade';

    protected $fillable = ['company_id', 'trade_id'];
}

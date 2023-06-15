<?php

namespace App\Models;

//use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class CompanyTrades extends Pivot
{
    protected $table = 'company_has_trade';

    protected $fillable = ['company_id', 'trade_id'];
}

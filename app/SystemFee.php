<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SystemFee extends Model
{
    protected $fillable = ['establishment_id', 'fee', 'fee_date', 'paid'];
}

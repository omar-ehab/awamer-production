<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(array $all)
 * @method static count()
 */
class Bank extends Model
{
    protected $fillable = ['name', 'amount_col', 'donation_date_col', 'bank_account_number_col'];
}

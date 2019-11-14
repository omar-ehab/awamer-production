<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use \App\Establishment;
use \App\Donor;
use \App\Interval;
use \App\BankAccount;
use \App\Excel_sheet;


class Operation extends Model
{
    protected $fillable = [
        'establishment_id',
        'donor_id',
        'interval_id',
        'bank_account_id',
        'state',
        'type',
        'amount',
        'excel_sheet_id',
        'success',
        'operation_date',
        'summary',
    ];





    public function establishment()
    {
        return $this->belongsTo(Establishment::class);
    }

    public function donor()
    {
        return $this->belongsTo(Donor::class);
    }
    public function interval()
    {
        return $this->belongsTo(Interval::class);
    }

    public function bank_account()
    {
        return $this->belongsTo(BankAccount::class);
    }
    public function excel_sheet()
    {
        return $this->belongsTo(Excel_sheet::class);
    }



}

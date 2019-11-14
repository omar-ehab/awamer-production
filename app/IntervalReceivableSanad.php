<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IntervalReceivableSanad extends Model
{
    protected $fillable = ['establishment_id', 'interval_id', 'bank_account_id', 'sanad_date', 'sanad_number', 'total_amount', 'process_number', 'user_id'];

    public function establishment()
    {
        return $this->belongsTo(Establishment::class);
    }

    public function employee()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function interval()
    {
        return $this->belongsTo(Interval::class);
    }
    public function bank_account()
    {
        return $this->belongsTo(BankAccount::class);
    }
}

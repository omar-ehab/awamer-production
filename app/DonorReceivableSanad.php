<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DonorReceivableSanad extends Model
{
    protected $fillable = ['establishment_id', 'sanad_number', 'sanad_date', 'donor_id', 'branch_id', 'interval_id', 'bank_account_id', 'user_id', 'amount'];

    public function establishment()
    {
        return $this->belongsTo(Establishment::class);
    }

    public function donor()
    {
        return $this->belongsTo(Donor::class);
    }

    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }

    public function interval()
    {
        return $this->belongsTo(Interval::class);
    }

    public function employee()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function bank_account()
    {
        return $this->belongsTo(BankAccount::class);
    }
}

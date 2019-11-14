<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CreateDonorSanad extends Model
{
    protected $fillable = ['establishment_id', 'sanad_date', 'sanad_number', 'donor_id', 'amount', 'branch_id', 'registration_date', 'withdrawal_start_date', 'withdrawal_end_date'];

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
}

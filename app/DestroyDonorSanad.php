<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DestroyDonorSanad extends Model
{
    protected $fillable = ['establishment_id', 'sanad_date', 'sanad_number', 'donor_id', 'branch_id', 'donor_destroy_date', 'notes'];

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

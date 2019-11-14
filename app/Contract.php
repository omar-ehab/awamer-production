<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Contract extends Model
{
    protected $fillable = ['establishment_id', 'percentage', 'value'];

    /**
     * @return BelongsTo
     */
    public function establishment()
    {
        return $this->belongsTo(Establishment::class);
    }

    public function terms()
    {
        return $this->belongsToMany(ContractTerm::class, 'contract_contract_term', 'contract_id');
    }
}

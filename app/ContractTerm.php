<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @method static where(string $string, $establishmentId)
 */
class ContractTerm extends Model
{
    protected $fillable = ['term'];

    /**
     * @return BelongsToMany
     */
    public function contracts()
    {
        return $this->belongsToMany(Contract::class, 'contract_contract_term', 'contract_term_id');
    }
}

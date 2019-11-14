<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @method static create(array $all)
 */
class BankAccount extends Model
{
    protected $fillable = ['establishment_id', 'bank_id', 'account_number', 'iban', 'description'];


    /**
     * @return BelongsTo
     */
    public function establishment()
    {
        return $this->belongsTo('App/Establishment');
    }

    /**
     * @return BelongsTo
     */
    public function bank()
    {
        return $this->belongsTo('App\Bank');
    }

    public function operation()
    {
        return $this->hasMany(Operation::class);
    }
    
}

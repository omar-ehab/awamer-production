<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;


/**
 * @method static count()
 */
class Establishment extends Model
{
    protected $fillable = [
        'establishment_type_id',
        'administrative_area_id',
        'name',
        'representative_name',
        'mobile',
        'phone',
        'address',
        'logo',
        'kalesha',
        'approved',
        'send_sms'
    ];

    /**
     * @return BelongsTo
     */
    public function establishmentType()
    {
        return $this->belongsTo(EstablishmentType::class);
    }

    public function administrativeArea()
    {
        return $this->belongsTo(AdministrativeArea::class);
    }

    /**
     * @return HasMany
     */
    public function donors()
    {
        return $this->hasMany(Donor::class);
    }

    /**
     * @return HasOne
     */
    public function contract()
    {
        return $this->hasOne(Contract::class);
    }

    /**
     * @return HasMany
     */
    public function branches()
    {
        return $this->hasMany(Branch::class);
    }

    /**
     * @return HasMany
     */
    public function bankAccounts()
    {
        return $this->hasMany(BankAccount::class);
    }

    public function user()
    {
        return $this->hasOne(User::class);
    }

    public function operation()
    {
        return $this->hasMany(Operation::class);
    }

    public function fees()
    {
        return $this->hasMany(SystemFee::class);
    }



}

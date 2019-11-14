<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @method static count()
 */
class EstablishmentType extends Model
{
    protected $fillable = ['name'];


    /**
     * @return HasMany
     */
    public function establishments()
    {
        return $this->hasMany('App/Establishment');
    }
}

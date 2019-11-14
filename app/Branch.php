<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Branch extends Model
{
    protected $fillable = ['establishment_id', 'name', 'address'];

    /**
     * @return BelongsTo
     */
    public function establishment()
    {
        return $this->belongsTo(Establishment::class);
    }

    public function donors()
    {
        return $this->hasMany(Donor::class);
    }
}

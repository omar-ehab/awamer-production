<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @method static where(string $string, $establishmentId)
 */
class Interval extends Model
{
    protected $fillable = ['name', 'start', 'end'];


    public function operations()
    {
        return $this->hasMany(Operation::class);
    }
}

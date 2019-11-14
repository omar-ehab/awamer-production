<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Excel_sheet extends Model
{
     protected $fillable = ['path'];

     public function operation()
    {
        return $this->hasMany(Excel_sheet::class);
    }

}

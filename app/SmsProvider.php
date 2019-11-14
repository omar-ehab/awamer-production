<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class SmsProvider extends Model
{
    protected $fillable = ['provider_name', 'username', 'password', 'token', 'active'];
}

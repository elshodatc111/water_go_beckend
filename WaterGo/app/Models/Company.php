<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model{
    protected $fillable = [
        'company_name',
        'drektor',
        'phone',
        'addres',
        'balans',
        'paymart',
        'message_status',
        'company_status',
    ];
}
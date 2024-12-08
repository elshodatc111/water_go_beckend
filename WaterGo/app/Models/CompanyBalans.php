<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompanyBalans extends Model{
    protected $fillable = [
        'company_id',
        'summa',
        'about',
    ];
}
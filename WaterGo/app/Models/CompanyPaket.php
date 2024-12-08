<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompanyPaket extends Model
{
    protected $fillable = [
        'company_id',
        'count',
        'about',
    ];
}
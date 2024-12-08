<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompanySmsText extends Model
{
    protected $fillable = [
        'company_id',
        'text',
    ];
}

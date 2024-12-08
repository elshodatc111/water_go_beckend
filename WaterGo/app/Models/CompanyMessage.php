<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompanyMessage extends Model
{
    protected $fillable = [
        'company_id',
        'send_message',
        'paymart_messaga',
    ];
}

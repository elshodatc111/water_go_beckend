<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title',
        'discriotion',
        'count',
        'user',
    ];
    public function getDescriptionAttribute($value){
        $text = strip_tags($value);
        return strlen($text) > 150 ? substr($text, 0, 3) . '...' : $text;
    }
}
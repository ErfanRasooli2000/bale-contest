<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LinkShorter extends Model
{
    use HasFactory;

    protected $fillable = [
        'link',
        'uniqueId'
    ];
}

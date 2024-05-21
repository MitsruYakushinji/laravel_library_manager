<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Library extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'name',
    ];
}

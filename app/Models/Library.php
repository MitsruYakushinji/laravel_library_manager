<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Library extends Model
{
    public $timestamps = false;

    public function logs(): HasMany
    {
        return $this->hasMany(Log::class);
    }
}

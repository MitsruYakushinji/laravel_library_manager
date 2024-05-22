<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Log extends Model
{
    public $timestamps = false;

    public function library(): BelongsTo
    {
        return $this->belongsTo(Library::class);
    }
}

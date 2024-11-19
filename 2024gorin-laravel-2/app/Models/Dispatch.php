<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Dispatch extends Model
{
    /** @use HasFactory<\Database\Factories\DispatchFactory> */
    use HasFactory;

    public function event()
    {
        return $this->belongsTo(Event::class);
    }
    public function worker()
    {
        return $this->belongsTo(Worker::class);
    }
}

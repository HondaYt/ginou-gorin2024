<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Worker extends Model
{
    /** @use HasFactory<\Database\Factories\WorkerFactory> */
    use HasFactory;

    public function events()
    {
        return $this->belongsToMany(Event::class, 'dispatches')->withPivot('approval');
    }
}

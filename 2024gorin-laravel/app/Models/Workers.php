<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Workers extends Model
{
    /** @use HasFactory<\Database\Factories\WorkersFactory> */
    use HasFactory;

    protected $table = 'workers';
}
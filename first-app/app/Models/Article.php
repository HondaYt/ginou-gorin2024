<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'articles';

    public function thumbnails()
    {
        // return $this->hasMany(Thumbnail::class);
        return $this->hasOne(Thumbnail::class, 'article_id');
    }
}

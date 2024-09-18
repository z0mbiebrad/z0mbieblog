<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
    use HasFactory;
    
    protected $guarded = [];

    public function getHtmlAttribute() {
        $markdown = $this->attributes['markdown'];

        return Str::markdown($markdown);
    }
}

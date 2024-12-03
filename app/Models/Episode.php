<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Episode extends Model
{
    use HasFactory;

    protected $fillable = ['story_id', 'title', 'content', 'created_by'];

    public function story()
    {
        return $this->belongsTo(\Wink\WinkPost::class, 'story_id');
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}

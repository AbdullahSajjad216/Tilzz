<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Story extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'author_id', 'visibility'];

    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function episodes()
    {
        return $this->hasMany(Episode::class, 'story_id', 'id');
    }
}

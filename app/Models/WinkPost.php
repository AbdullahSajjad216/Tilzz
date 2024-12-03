<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class WinkPost extends Model
{
    use HasFactory;


    public function episodes()
    {
        return $this->hasMany(\App\Models\Episode::class, 'story_id');
    }
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'wink_posts';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'title', 'excerpt', 'body', 'slug', 'author_id', 'visibility', 'published_at', 'meta', 'featured_image', 'featured_image_caption',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'meta' => 'array',
        'published_at' => 'datetime',
    ];

    /**
     * Get the author of the post.
     */
    public function author()
    {
        return $this->belongsTo(WinkUser::class, 'author_id');
    }

    /**
     * Get the tags for the post.
     */
    public function tags()
    {
        return $this->belongsToMany(WinkTag::class, 'wink_post_tags', 'post_id', 'tag_id');
    }
}

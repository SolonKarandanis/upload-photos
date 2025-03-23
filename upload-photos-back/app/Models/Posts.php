<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Posts extends Model
{
    use HasFactory;
    protected $fillable = [
        'title', 'post_content', 'image','slug'
    ];

    public function categories():BelongsToMany
    {
        return $this->belongsToMany(
            Categories::class,
            'categories_posts',
            'post_id',
            'category_id'
        );
    }

    public function createdBy(): BelongsTo
    {
        return $this->belongsTo(User::class,'created_by');
    }
}

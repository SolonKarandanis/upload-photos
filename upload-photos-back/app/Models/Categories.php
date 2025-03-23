<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Categories extends Model
{
    protected $fillable = [
        'name'
    ];

    public function posts(): BelongsToMany
    {
        return $this->belongsToMany(
            Posts::class,
            'categories_posts',
            'category_id',
            'post_id'
        );
    }
}

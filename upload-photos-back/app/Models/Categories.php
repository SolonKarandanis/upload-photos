<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Posts> $posts
 * @property-read int|null $posts_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Categories newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Categories newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Categories query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Categories whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Categories whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Categories whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Categories whereUpdatedAt($value)
 * @mixin \Eloquent
 */
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

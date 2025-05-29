<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;

/**
 *
 *
 * @property int $id
 * @property string $title
 * @property string $post_content
 * @property string|null $image
 * @property string $slug
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property int|null $created_by
 * @property-read Collection<int, Categories> $categories
 * @property-read int|null $categories_count
 * @property-read User|null $createdBy
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Posts newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Posts newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Posts query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Posts whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Posts whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Posts whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Posts whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Posts wherePostContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Posts whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Posts whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Posts whereUpdatedAt($value)
 * @mixin Eloquent
 */
class Posts extends Model
{
    use HasFactory;
    protected $fillable = [
        'title', 'post_content', 'image','slug','created_by'
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

    public function deleteImage():void
    {
        Storage::delete($this->image);
    }
}

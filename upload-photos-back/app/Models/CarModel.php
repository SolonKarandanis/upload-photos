<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model as EloquentModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * 
 *
 * @property int $id
 * @property int $maker_id
 * @property string $name
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Car> $cars
 * @property-read int|null $cars_count
 * @property-read \App\Models\Maker $maker
 * @method static \Database\Factories\CarModelFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CarModel newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CarModel newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CarModel query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CarModel whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CarModel whereMakerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CarModel whereName($value)
 * @mixin \Eloquent
 */
class CarModel extends EloquentModel
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable =[
        'maker_id',
        'name',
    ];

    public function maker():BelongsTo
    {
        return $this->belongsTo(Maker::class);
    }

    public function cars(): HasMany
    {
        return $this->hasMany(Car::class);
    }
}

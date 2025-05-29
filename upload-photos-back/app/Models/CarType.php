<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 *
 *
 * @property int $id
 * @property string $name
 * @property-read Collection<int, Car> $cars
 * @property-read int|null $cars_count
 * @method static \Database\Factories\CarTypeFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CarType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CarType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CarType query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CarType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CarType whereName($value)
 * @mixin \Eloquent
 */
class CarType extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable =[
        'name',
    ];

    public function cars(): HasMany
    {
        return $this->hasMany(Car::class);
    }
}

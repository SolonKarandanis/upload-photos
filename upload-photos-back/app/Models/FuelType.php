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
 * @method static \Database\Factories\FuelTypeFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FuelType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FuelType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FuelType query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FuelType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FuelType whereName($value)
 * @mixin \Eloquent
 */
class FuelType extends Model
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

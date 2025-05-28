<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Car> $cars
 * @property-read int|null $cars_count
 * @property-read Maker|null $maker
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\CarModel> $models
 * @property-read int|null $models_count
 * @method static \Database\Factories\MakerFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Maker newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Maker newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Maker query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Maker whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Maker whereName($value)
 * @mixin \Eloquent
 */
class Maker extends CarModel
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

    public function models(): HasMany
    {
        return $this->hasMany(CarModel::class);
    }
}

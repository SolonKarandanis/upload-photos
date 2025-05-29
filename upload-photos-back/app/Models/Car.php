<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model as EloquentModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 *
 *
 * @property int $id
 * @property int $maker_id
 * @property int $model_id
 * @property int $year
 * @property int $price
 * @property int $mileage
 * @property string $vin
 * @property int $car_type_id
 * @property int $fuel_type_id
 * @property int $user_id
 * @property int $city_id
 * @property string|null $phone
 * @property string|null $address
 * @property string|null $description
 * @property string|null $published_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read CarType $carType
 * @property-read City $city
 * @property-read Collection<int, User> $favouredUsers
 * @property-read int|null $favoured_users_count
 * @property-read CarFeatures|null $features
 * @property-read FuelType $fuelType
 * @property-read Collection<int, CarImage> $images
 * @property-read int|null $images_count
 * @property-read Maker $maker
 * @property-read CarModel $model
 * @property-read User $owner
 * @property-read CarImage|null $primaryImage
 * @method static \Database\Factories\CarFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Car newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Car newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Car onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Car query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Car whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Car whereCarTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Car whereCityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Car whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Car whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Car whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Car whereFuelTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Car whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Car whereMakerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Car whereMileage($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Car whereModelId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Car wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Car wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Car wherePublishedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Car whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Car whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Car whereVin($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Car whereYear($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Car withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Car withoutTrashed()
 * @mixin \Eloquent
 */
class Car extends EloquentModel
{
    use HasFactory, SoftDeletes;

    protected $fillable =[
        'maker_id',
        'model_id',
        'year',
        'price',
        'vin',
        'mileage',
        'car_type_id',
        'fuel_type_id',
        'user_id',
        'city_id',
        'address',
        'phone',
        'description',
        'published_at'
    ];

    public function carType():BelongsTo
    {
        return $this->belongsTo(CarType::class,'car_type_id');
    }

    public function fuelType():BelongsTo
    {
        return $this->belongsTo(FuelType::class,'fuel_type_id');
    }

    public function maker():BelongsTo
    {
        return $this->belongsTo(Maker::class,'maker_id');
    }

    public function model():BelongsTo
    {
        return $this->belongsTo(CarModel::class,'model_id');
    }

    public function owner():BelongsTo
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function city():BelongsTo
    {
        return $this->belongsTo(City::class,'city_id');
    }

    public function features(): HasOne
    {
        return $this->hasOne(CarFeatures::class,'car_id');
    }

    public function primaryImage(): HasOne
    {
        return $this->hasOne(CarImage::class,'car_id')->oldestOfMany('position');
    }

    public function images(): HasMany
    {
        return $this->hasMany(CarImage::class,'car_id');
    }

    public function favouredUsers():BelongsToMany
    {
        return $this->belongsToMany(User::class,'favourite_cars','car_id','user_id');
    }

    public function getCreatedDate():string
    {
        return (new Carbon($this->created_at))->format('Y-m-d');
    }
}

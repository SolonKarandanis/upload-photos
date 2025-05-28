<?php

// @formatter:off
// phpcs:ignoreFile
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int|null $user_id
 * @property string $account_number
 * @property string $balance
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User|null $owner
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Transaction> $transactions
 * @property-read int|null $transactions_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Account newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Account newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Account onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Account query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Account whereAccountNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Account whereBalance($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Account whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Account whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Account whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Account whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Account whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Account withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Account withoutTrashed()
 */
	class Account extends \Eloquent {}
}

namespace App\Models{
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
 * @property-read \App\Models\CarType $carType
 * @property-read \App\Models\City $city
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\User> $favouredUsers
 * @property-read int|null $favoured_users_count
 * @property-read \App\Models\CarFeatures|null $features
 * @property-read \App\Models\FuelType $fuelType
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\CarImage> $images
 * @property-read int|null $images_count
 * @property-read \App\Models\Maker $maker
 * @property-read \App\Models\CarModel $model
 * @property-read \App\Models\User $owner
 * @property-read \App\Models\CarImage|null $primaryImage
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
 */
	class Car extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $car_id
 * @property int $abs
 * @property int $air_conditioning
 * @property int $power_windows
 * @property int $power_door_locks
 * @property int $cruise_control
 * @property int $bluetooth_connectivity
 * @property int $remote_start
 * @property int $gps_navigation
 * @property int $heated_seats
 * @property int $climate_control
 * @property int $rear_parking_sensors
 * @property int $leather_seats
 * @property-read \App\Models\Car|null $car
 * @method static \Database\Factories\CarFeaturesFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CarFeatures newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CarFeatures newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CarFeatures query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CarFeatures whereAbs($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CarFeatures whereAirConditioning($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CarFeatures whereBluetoothConnectivity($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CarFeatures whereCarId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CarFeatures whereClimateControl($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CarFeatures whereCruiseControl($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CarFeatures whereGpsNavigation($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CarFeatures whereHeatedSeats($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CarFeatures whereLeatherSeats($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CarFeatures wherePowerDoorLocks($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CarFeatures wherePowerWindows($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CarFeatures whereRearParkingSensors($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CarFeatures whereRemoteStart($value)
 */
	class CarFeatures extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $car_id
 * @property string $image_path
 * @property int $position
 * @property-read \App\Models\Car $car
 * @method static \Database\Factories\CarImageFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CarImage newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CarImage newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CarImage query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CarImage whereCarId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CarImage whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CarImage whereImagePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CarImage wherePosition($value)
 */
	class CarImage extends \Eloquent {}
}

namespace App\Models{
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
 */
	class CarModel extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Car> $cars
 * @property-read int|null $cars_count
 * @method static \Database\Factories\CarTypeFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CarType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CarType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CarType query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CarType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CarType whereName($value)
 */
	class CarType extends \Eloquent {}
}

namespace App\Models{
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
 */
	class Categories extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $state_id
 * @property string $name
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Car> $cars
 * @property-read int|null $cars_count
 * @property-read \App\Models\State $state
 * @method static \Database\Factories\CityFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|City newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|City newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|City query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|City whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|City whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|City whereStateId($value)
 */
	class City extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Car> $cars
 * @property-read int|null $cars_count
 * @method static \Database\Factories\FuelTypeFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FuelType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FuelType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FuelType query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FuelType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FuelType whereName($value)
 */
	class FuelType extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $path
 * @property string|null $label
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Image newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Image newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Image onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Image query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Image whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Image whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Image whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Image whereLabel($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Image wherePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Image whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Image withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Image withoutTrashed()
 */
	class Image extends \Eloquent {}
}

namespace App\Models{
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
 */
	class Maker extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $title
 * @property string $post_content
 * @property string|null $image
 * @property string $slug
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int|null $created_by
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Categories> $categories
 * @property-read int|null $categories_count
 * @property-read \App\Models\User|null $createdBy
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
 */
	class Posts extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Car> $cars
 * @property-read int|null $cars_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\City> $cities
 * @property-read int|null $cities_count
 * @method static \Database\Factories\StateFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|State newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|State newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|State query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|State whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|State whereName($value)
 */
	class State extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $reference
 * @property int $user_id
 * @property int $account_id
 * @property int|null $transfer_id
 * @property string $amount
 * @property string|null $balance
 * @property string $category
 * @property int $confirmed
 * @property string|null $description
 * @property string $date
 * @property string|null $meta
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Account $account
 * @property-read \App\Models\User $owner
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Transaction newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Transaction newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Transaction onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Transaction query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Transaction whereAccountId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Transaction whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Transaction whereBalance($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Transaction whereCategory($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Transaction whereConfirmed($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Transaction whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Transaction whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Transaction whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Transaction whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Transaction whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Transaction whereMeta($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Transaction whereReference($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Transaction whereTransferId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Transaction whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Transaction whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Transaction withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Transaction withoutTrashed()
 */
	class Transaction extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int|null $sender_id
 * @property int|null $sender_account_id
 * @property int|null $recipient_id
 * @property int|null $recipient_account_id
 * @property string $reference
 * @property string $status
 * @property string $amount
 * @property string|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User|null $recipient
 * @property-read \App\Models\Account|null $recipientAccount
 * @property-read \App\Models\User|null $sender
 * @property-read \App\Models\Account|null $senderAccount
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Transfer newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Transfer newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Transfer query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Transfer whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Transfer whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Transfer whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Transfer whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Transfer whereRecipientAccountId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Transfer whereRecipientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Transfer whereReference($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Transfer whereSenderAccountId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Transfer whereSenderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Transfer whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Transfer whereUpdatedAt($value)
 */
	class Transfer extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $phone_number
 * @property string|null $pin
 * @property-read \App\Models\Account|null $account
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Car> $cars
 * @property-read int|null $cars_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Car> $favouriteCars
 * @property-read int|null $favourite_cars_count
 * @property-read \App\Models\Posts|null $latestPost
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Posts> $posts
 * @property-read int|null $posts_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Transaction> $transactions
 * @property-read int|null $transactions_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Transaction> $transfers
 * @property-read int|null $transfers_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User wherePhoneNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User wherePin($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User withLastTransaction()
 */
	class User extends \Eloquent {}
}


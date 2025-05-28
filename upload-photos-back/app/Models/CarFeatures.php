<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
 * @mixin \Eloquent
 */
class CarFeatures extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $primaryKey='car_id';

    protected $fillable =[
        'car_id',
        'abs',
        'air_conditioning',
        'power_windows',
        'power_door_locks',
        'cruise_control',
        'bluetooth_connectivity',
        'remote_start',
        'gps_navigation',
        'heated_seats',
        'climate_control',
        'rear_parking_sensors',
        'leather_seats'
    ];

    public function car():BelongsTo
    {
        return $this->belongsTo(Car::class,'car_id');
    }
}

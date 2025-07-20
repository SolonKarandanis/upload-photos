<?php

namespace App\Repositories;

use App\Models\Car;
use App\Repositories\CarRepositoryInterface;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class CarRepository implements CarRepositoryInterface
{

    public function modelQuery(): Builder|Car
    {
       return Car::query();
    }

    /**
     * @inheritDoc
     */
    public function create(array $attributes): Car
    {
        // TODO: Implement create() method.
    }

    /**
     * @inheritDoc
     */
    public function update(array $attributes, int $id): Car
    {
        // TODO: Implement update() method.
    }

    /**
     * @inheritDoc
     */
    public function find(int $id): Car
    {
        return $this->modelQuery()->select([
            'cars.*',
            'cities.name as city_name',
            'cities.state_id as state_id',
            'car_images.image_path as  image_path',
            'makers.name as maker_name',
            'models.name as model_name',
            'car_types.name as car_type_name',
            'fuel_types.name as fuel_type_name',
            'car_features.*',
            'users.id as user_id',
            'users.name as user_name'
        ])
            ->join('cities','cities.id','cars.city_id')
            ->join('makers','makers.id','cars.maker_id')
            ->join('models','models.id','cars.model_id')
            ->join('car_types','car_types.id','cars.car_type_id')
            ->join('fuel_types','fuel_types.id','cars.fuel_type_id')
            ->join('car_images','car_images.car_id','cars.id')
            ->join('car_features','car_features.car_id','cars.id')
            ->join('users','users.id','cars.user_id')
            ->findOrFail($id);
    }

    /**
     * @inheritDoc
     */
    public function delete(int $id): void
    {
        // TODO: Implement delete() method.
    }

    /**
     * @inheritDoc
     */
    public function findPubllishedCars(bool $withRelations): Collection
    {
        return $this->modelQuery()
            ->where('published_at','<',now())
            ->when($withRelations, function (Builder $query) {
                return $query->with(['city','maker','model','carType','fuelType','primaryImage']);
            })
            ->orderBy('published_at','desc')
            -> limit(30)
            -> get();
    }

    /**
     * @inheritDoc
     */
    public function findUsersCars(int $id, int $paginate): LengthAwarePaginator
    {
        return $this->modelQuery()->where('user_id','=',$id)
            ->orderBy('created_at','desc')
            ->with(['city','maker','model','carType','fuelType','primaryImage'])
            ->paginate($paginate);
    }

    /**
     * @inheritDoc
     */
    public function findUsersFavouriteCars(int $id, int $paginate): LengthAwarePaginator
    {
//        return $this->modelQuery()->where('user_id','=',$id)
    }

    /**
     * @inheritDoc
     */
    public function countUsersCars(int $userId): int
    {
        return $this->modelQuery()->where('user_id','=',$userId)->count();
    }

    /**
     * @inheritDoc
     */
    public function findCarImages(int $carId): Collection
    {
        // TODO: Implement findCarImages() method.
    }

    /**
     * @inheritDoc
     */
    public function searchCars(int $paginate, array $params): LengthAwarePaginator
    {
        $query = $this->modelQuery()->where('published_at','<',now())
            ->with('city','maker','model','carType','fuelType','primaryImage')
            ->orderBy('published_at','desc');

        $keys = array_keys($params);

        foreach ($keys as $key) {
            $value = $params[$key];
            $query->when($key == 'maker_id' && !is_null($value), function ($query) use ($value) {
                return $query->where('cars.maker_id','=',$value);
            });
            $query->when($key == 'model_id' && !is_null($value), function ($query) use ($value) {
                return $query->where('cars.model_id','=',$value);
            });
            $query->when($key == 'state_id' && !is_null($value), function ($query) use ($value) {
                return $query->join('cities','cities.id','=','cars.city_id')
                    ->where('cities.state_id','=',$value);
            });
            $query->when($key == 'city_id' && !is_null($value), function ($query) use ($value) {
               return $query->where('cars.city_id','=',$value);
            });
            $query->when($key == 'car_type_id' && !is_null($value), function ($query) use ($value) {
                return $query->where('cars.car_type_id','=',$value);
            });
            $query->when($key == 'fuel_type_id' && !is_null($value), function ($query) use ($value) {
                return $query->where('cars.fuel_type_id','=',$value);
            });
            $query->when($key == 'year_from' && !is_null($value), function ($query) use ($value) {
//                $startDate = Carbon::createFromFormat('Y-m-d', $value);
                return $query->where('cars.year','>=',$value);
            });
            $query->when($key == 'year_to' && !is_null($value), function ($query) use ($value) {
//                $endDate = Carbon::createFromFormat('Y-m-d', $value);
                return $query->where('cars.year','<=',$value);
            });
            $query->when($key == 'price_from' && !is_null($value), function ($query) use ($value) {
                return $query->where('cars.price','>=',$value);
            });
            $query->when($key == 'price_to' && !is_null($value), function ($query) use ($value) {
                return $query->where('cars.price','<=',$value);
            });
            $query->when($key == 'mileage' && !is_null($value), function ($query) use ($value) {
                return $query->where('cars.mileage','<=',$value);
            });
            if($key == 'sort' && !is_null($value)){
                if($value=='price'){
                    $query->reorder()->orderBy('cars.price', 'asc');
                }
                elseif ($value=='-price'){
                    $query->reorder()->orderBy('cars.price', 'desc');
                }
            }
        }
        return $query->paginate($paginate);
    }
}

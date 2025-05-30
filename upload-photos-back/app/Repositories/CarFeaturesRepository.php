<?php

namespace App\Repositories;

use App\Models\CarFeatures;
use Illuminate\Database\Eloquent\Builder;

class CarFeaturesRepository implements CarFeaturesRepositoryInterface
{

    public function modelQuery(): Builder
    {
        return CarFeatures::query();
    }

    public function create(array $attributes): CarFeatures
    {
        return $this->modelQuery()->create($attributes);
    }

    public function update(array $attributes, int $id): CarFeatures
    {
        // TODO: Implement update() method.
    }

    public function find(int $id): CarFeatures
    {
        // TODO: Implement find() method.
    }

    public function delete(int $id): void
    {
        // TODO: Implement delete() method.
    }
}

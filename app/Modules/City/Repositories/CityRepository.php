<?php

declare(strict_types=1);

namespace App\Modules\City\Repositories;

use App\Modules\City\Models\City;
use App\Modules\City\Repositories\Interfaces\CityRepositoryInterface;

final class CityRepository implements CityRepositoryInterface
{
    public function all()
    {
        return City::all();
    }

    public function create(array $data)
    {
        return City::create($data);
    }

    public function update(array $data, int $id)
    {
        return City::find($id)->update($data);
    }

    public function delete(int $id)
    {
        return City::destroy($id);
    }

    public function find(int $id)
    {
        return City::find($id);
    }
}
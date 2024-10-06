<?php

declare(strict_types=1);

namespace App\Modules\City\Services;

use App\Modules\City\Repositories\Interfaces\CityRepositoryInterface;

final class CityService
{
    public function __construct(
        protected CityRepositoryInterface $cityRepository
    )
    {
        
    }

    public function all()
    {
        return $this->cityRepository->all();
    }
}
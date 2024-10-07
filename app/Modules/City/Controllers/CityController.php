<?php

declare(strict_types=1);

namespace App\Modules\City\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\City\Resources\CityResource;
use App\Modules\City\Services\CityService;

final class CityController extends Controller
{
    public function __construct(
        protected CityService $cityService
    )
    {
        
    }

    public function index()
    {
        return $this->successResponse(
            message: 'List of cities',
            data: CityResource::collection($this->cityService->all()),
            code: 200
        );
    }
}
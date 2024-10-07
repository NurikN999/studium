<?php

declare(strict_types=1);

namespace App\Modules\City\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

final class CityResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'name' => $this->name,
            'code' => $this->code,
        ];
    }
}
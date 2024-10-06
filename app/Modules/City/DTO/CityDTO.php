<?php

declare(strict_types=1);

namespace App\Modules\City\DTO;

use Illuminate\Foundation\Http\FormRequest;

final class CityDTO
{
    public ?string $name;
    public ?string $code;

    public static function fromRequest(FormRequest $request): self
    {
        $dto = new self();
        $dto->name = $request->input('name') ?? null;
        $dto->code = $request->input('code') ?? null;

        return $dto;
    }
}
<?php

declare(strict_types=1);

namespace App\Modules\Course\DTO;

use Illuminate\Http\Request;

class CourseDTO
{
    public ?string $title;
    public ?string $description;

    public static function fromRequest(Request $request)
    {
        $dto = new self();
        $dto->title = $request->input('title') ?? null;
        $dto->description = $request->input('description') ?? null;

        return $dto;
    }
}
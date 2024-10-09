<?php

declare(strict_types=1);

namespace App\Modules\Lesson\DTO;

use Illuminate\Http\Request;

class LessonDTO
{
    public ?string $title;
    public ?string $description;
    
    public static function fromRequest(Request $request): self
    {
        $dto = new self();

        $dto->title = $request->input('title');
        $dto->description = $request->input('description');

        return $dto;
    }
}
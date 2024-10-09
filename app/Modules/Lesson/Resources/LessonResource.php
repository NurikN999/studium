<?php

declare(strict_types=1);

namespace App\Modules\Lesson\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

final class LessonResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
        ];
    }
}
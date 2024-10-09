<?php

declare(strict_types=1);

namespace App\Modules\Course\Resources;

use App\Modules\Lesson\Resources\LessonResource;
use Illuminate\Http\Resources\Json\JsonResource;

final class CourseResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'lessons' => LessonResource::collection($this->whenLoaded('lessons')),
        ];
    }
}
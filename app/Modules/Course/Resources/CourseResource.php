<?php

declare(strict_types=1);

namespace App\Modules\Course\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

final class CourseResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'title' => $this->title,
            'description' => $this->description,
        ];
    }
}
<?php

declare(strict_types=1);

namespace App\Modules\Lesson\Requests;

use App\Modules\Lesson\DTO\LessonDTO;
use Illuminate\Foundation\Http\FormRequest;

final class StoreLessonRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }

    public function getDTO()
    {
        return LessonDTO::fromRequest($this);
    }
}
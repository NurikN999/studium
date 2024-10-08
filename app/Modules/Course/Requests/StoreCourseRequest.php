<?php

declare(strict_types=1);

namespace App\Modules\Course\Requests;

use App\Modules\Course\DTO\CourseDTO;
use Illuminate\Foundation\Http\FormRequest;

final class StoreCourseRequest extends FormRequest
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

    public function getDTO(): CourseDTO
    {
        return CourseDTO::fromRequest($this);
    }
}
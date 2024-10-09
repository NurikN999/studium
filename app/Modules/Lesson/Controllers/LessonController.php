<?php

declare(strict_types=1);

namespace App\Modules\Lesson\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Lesson\DTO\LessonDTO;
use App\Modules\Lesson\Models\Lesson;
use App\Modules\Lesson\Requests\StoreLessonRequest;
use App\Modules\Lesson\Requests\UpdateLessonRequest;
use App\Modules\Lesson\Resources\LessonResource;
use App\Modules\Lesson\Services\LessonService;

class LessonController extends Controller
{
    public function __construct(
        protected LessonService $lessonService
    )
    {
        
    }

    public function index()
    {
        $lessons = $this->lessonService->all();

        return $this->successResponse(
            data: LessonResource::collection($lessons),
            message: 'Lessons retrieved successfully.',
            code: 200
        );
    }

    public function create(StoreLessonRequest $request)
    {
        $lessonDTO = $request->getDTO();
        $lesson = $this->lessonService->create($lessonDTO);

        return $this->successResponse(
            data: new LessonResource($lesson),
            message: 'Lesson created successfully.',
            code: 201
        );
    }

    public function update(Lesson $lesson, UpdateLessonRequest $request)
    {
        $lessonDTO = $request->getDTO();
        $lesson = $this->lessonService->update($lesson, $lessonDTO);

        return $this->successResponse(
            data: new LessonResource($lesson),
            message: 'Lesson updated successfully.',
            code: 200
        );
    }

    public function show(Lesson $lesson)
    {
        return $this->successResponse(
            data: new LessonResource($lesson),
            message: 'Lesson retrieved successfully.',
            code: 200
        );
    }

    public function destroy(Lesson $lesson)
    {
        $this->lessonService->delete($lesson);

        return $this->successResponse(
            message: 'Lesson deleted successfully.',
            code: 200,
            data: null
        );
    }
}
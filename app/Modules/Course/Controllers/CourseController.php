<?php

declare(strict_types=1);

namespace App\Modules\Course\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Course\Models\Course;
use App\Modules\Course\Requests\StoreCourseRequest;
use App\Modules\Course\Requests\UpdateCourseRequest;
use App\Modules\Course\Resources\CourseResource;
use App\Modules\Course\Services\CourseService;

class CourseController extends Controller
{
    public function __construct(
        protected CourseService $courseService
    )
    {
        
    }

    public function index()
    {
        return $this->courseService->all();
    }

    public function store(StoreCourseRequest $request)
    {
        return $this->successResponse(
            data: new CourseResource(
                $this->courseService->create($request->getDTO())
            ),
            message: 'Course created successfully',
            code: 201
        );
    }

    public function update(UpdateCourseRequest $request, Course $course)
    {
        return $this->successResponse(
            data: new CourseResource(
                $this->courseService->update($request->getDTO(), $course)
            ),
            message: 'Course updated successfully'
        );
    }

    public function show(Course $course)
    {
        return $this->successResponse(
            message: 'Course retrieved successfully',
            data: new CourseResource($course),
            code: 200
        );
    }

    public function destroy(Course $course)
    {
        $course->delete();

        return $this->successResponse(
            message: 'Course deleted successfully',
            data: null,
            code: 204
        );
    }
}
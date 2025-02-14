<?php

declare(strict_types=1);

namespace App\Modules\Course\Services;

use App\Modules\Course\DTO\CourseDTO;
use App\Modules\Course\Models\Course;
use App\Modules\Course\Repositories\Interfaces\CourseRepositoryInterface;
use App\Modules\Lesson\DTO\LessonDTO;

class CourseService
{
    public function __construct(
        protected CourseRepositoryInterface $courseRepository
    )
    {
        
    }

    public function all()
    {
        return $this->courseRepository->all();
    }

    public function create(CourseDTO $courseDTO): Course
    {
        return $this->courseRepository->create($courseDTO);
    }

    public function update(CourseDTO $courseDTO, Course $course): Course
    {
        return $this->courseRepository->update($courseDTO, $course);
    }

    public function attachLesson(Course $course, LessonDTO $lessonDTO): Course
    {
        return $this->courseRepository->attachLesson($course, $lessonDTO);
    }
}
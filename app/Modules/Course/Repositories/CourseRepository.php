<?php

declare(strict_types=1);

namespace App\Modules\Course\Repositories;

use App\Modules\Course\DTO\CourseDTO;
use App\Modules\Course\Models\Course;
use App\Modules\Course\Repositories\Interfaces\CourseRepositoryInterface;
use App\Modules\Lesson\DTO\LessonDTO;
use App\Modules\Lesson\Repositories\LessonRepository;
use Illuminate\Support\Facades\DB;

class CourseRepository implements CourseRepositoryInterface
{
    public function all()
    {
        return Course::all();
    }

    public function create(CourseDTO $courseDTO): Course
    {
        return DB::transaction(function () use ($courseDTO) {
            return Course::create([
                'title' => $courseDTO->title,
                'description' => $courseDTO->description,
            ]);
        });
    }

    public function update(CourseDTO $courseDTO, Course $course): Course
    {
        return DB::transaction(function () use ($courseDTO, $course) {
            $course->title = $courseDTO->title ?? $course->title;
            $course->description = $courseDTO->description ?? $course->description;
            return $course;
        });
    }

    public function delete(Course $course)
    {
        return $course->delete();
    }

    public function find(int $id): Course
    {
        return Course::findOrFail($id);
    }

    public function attachLesson(Course $course, LessonDTO $lessonDTO): Course
    {
        $lesson = (new LessonRepository())->create($lessonDTO);
        $course->lessons()->sync($lesson->id);

        return $course;
    }
}
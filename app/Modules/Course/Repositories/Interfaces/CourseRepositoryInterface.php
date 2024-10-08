<?php

declare(strict_types=1);

namespace App\Modules\Course\Repositories\Interfaces;

use App\Modules\Course\DTO\CourseDTO;
use App\Modules\Course\Models\Course;

interface CourseRepositoryInterface
{
    public function all();
    public function create(CourseDTO $courseDTO);
    public function update(CourseDTO $courseDTO, Course $course);
    public function delete(Course $course);
}
<?php

declare(strict_types=1);

namespace App\Modules\Lesson\Repositories\Contracts;

use App\Modules\Lesson\DTO\LessonDTO;
use App\Modules\Lesson\Models\Lesson;

interface LessonRepositoryInterface
{
    public function all();
    public function create(LessonDTO $lessonDTO): Lesson;
    public function update(Lesson $lesson, LessonDTO $lessonDTO): Lesson;
    public function delete(Lesson $lesson): void;
    public function find(string $id): Lesson;
}
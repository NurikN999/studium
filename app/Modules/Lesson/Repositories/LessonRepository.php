<?php

declare(strict_types=1);

namespace App\Modules\Lesson\Repositories;

use App\Modules\Lesson\DTO\LessonDTO;
use App\Modules\Lesson\Models\Lesson;
use App\Modules\Lesson\Repositories\Contracts\LessonRepositoryInterface;
use Illuminate\Support\Facades\DB;

final class LessonRepository implements LessonRepositoryInterface
{
    public function all()
    {
        return Lesson::all();
    }

    public function create(LessonDTO $lessonDTO): Lesson
    {
        return DB::transaction(function () use ($lessonDTO) {
            return Lesson::create([
                'title' => $lessonDTO->title,
                'description' => $lessonDTO->description,
            ]);
        });
    }

    public function update(Lesson $lesson, LessonDTO $lessonDTO): Lesson
    {
        return DB::transaction(function () use ($lesson, $lessonDTO) {
            $lesson->update([
                'title' => $lessonDTO->title,
                'description' => $lessonDTO->description,
            ]);

            return $lesson;
        });
    }

    public function delete(Lesson $lesson): void
    {
        $lesson->delete();
    }

    public function find(string $id): Lesson
    {
        return Lesson::findOrFail($id);
    }
}
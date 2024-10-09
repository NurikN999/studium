<?php

declare(strict_types=1);

namespace App\Modules\Lesson\Services;

use App\Modules\Lesson\DTO\LessonDTO;
use App\Modules\Lesson\Models\Lesson;
use App\Modules\Lesson\Repositories\Contracts\LessonRepositoryInterface;

final class LessonService
{

    public function __construct(
        private LessonRepositoryInterface $lessonRepository
    )
    {
        $this->lessonRepository = $lessonRepository;
    }

    public function all()
    {
        return $this->lessonRepository->all();
    }

    public function create(LessonDTO $lessonDTO): Lesson
    {
        return $this->lessonRepository->create($lessonDTO);
    }

    public function update(Lesson $lesson, LessonDTO $lessonDTO): Lesson
    {
        return $this->lessonRepository->update($lesson, $lessonDTO);
    }

    public function delete(Lesson $lesson): void
    {
        $this->lessonRepository->delete($lesson);
    }

    public function find(string $id): Lesson
    {
        return $this->lessonRepository->find($id);
    }
}
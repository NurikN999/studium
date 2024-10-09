<?php

declare(strict_types=1);

namespace App\Modules\Lesson\Models;

use Database\Factories\LessonFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

final class Lesson extends Model
{
    use HasUuids;
    
    protected $fillable = [
        'title',
        'description',
    ];

    public static function newFactory()
    {
        return LessonFactory::new();
    }
}
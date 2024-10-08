<?php

declare(strict_types=1);

namespace App\Modules\Course\Models;

use Database\Factories\CourseFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
        'title',
        'description',
    ];

    public static function newFactory()
    {
        return CourseFactory::new();
    }
}
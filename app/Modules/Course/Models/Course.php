<?php

declare(strict_types=1);

namespace App\Modules\Course\Models;

use Database\Factories\CourseFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasUuids;
    
    protected $fillable = [
        'title',
        'description',
    ];

    public static function newFactory()
    {
        return CourseFactory::new();
    }
}
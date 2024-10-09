<?php

declare(strict_types=1);

namespace App\Modules\Lesson\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

final class Lesson extends Model
{
    use HasUuids;
    
    protected $fillable = [
        'title',
        'description',
    ];
}
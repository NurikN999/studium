<?php

declare(strict_types=1);

namespace App\Modules\City\Models;

use Database\Factories\CityFactory;
use Illuminate\Database\Eloquent\Model;

final class City extends Model
{
    protected $fillable = [
        'name',
        'code',
    ];

    public static function newFactory(): CityFactory
    {
        return CityFactory::new();
    }
}
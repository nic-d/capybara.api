<?php

declare(strict_types=1);

namespace App\Traits;

use App\Helpers\Str;

trait Uuid
{
    /**
     * @return void
     */
    public static function bootUuid() : void
    {
        static::creating(function ($model) {
            $model->uuid = Str::uuid();
        });
    }
}

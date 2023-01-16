<?php

namespace App\Http\Traits;

use Illuminate\Support\Str;

trait HasSlug
{
    public static function bootHasSlug()
    {
        static::saving(function ($model) {
            $model->slug = Str::slug($model->name);
            while (static::whereSlug($model->slug)->exists()) {
                $model->slug = Str::slug($model->name) . '-'. mt_rand(1, 100);
            }
        });
    }
}

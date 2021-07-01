<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Page extends Model
{
    use HasFactory; use SoftDeletes;

    protected $fillable = ['locale', 'slug', 'name', 'url'];

    public function contents()
    {
        return $this->hasMany(Content::class)
            ->with('section');
    }
}

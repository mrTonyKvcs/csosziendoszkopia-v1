<?php

namespace App\Models;

use App\Http\Traits\HasSlug;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InformationType extends Model
{
    use HasSlug;
    use SoftDeletes;

    protected $fillable = ['slug', 'name'];
}

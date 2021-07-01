<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory; use SoftDeletes;

    protected $fillable = ['slug', 'name', 'template_id'];

    public function content()
    {
        return $this->hasMany(Content::class);
    }

    public function template()
    {
        return $this->belongsTo(Template::class);
    }
}

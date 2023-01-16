<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Information extends Model
{
    use HasFactory;

    protected $fillable = ['type_id', 'content'];

    public function type()
    {
        return $this->belongsTo(InformationType::class);
    }
}

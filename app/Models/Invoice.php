<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Invoice extends Model
{
    use HasFactory; use SoftDeletes;

    protected $fillable = ['invoice_number'];

    public function ticket()
    {
        return $this->belongsTo(Ticket::class);
    }
}

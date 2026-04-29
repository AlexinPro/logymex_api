<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Evidencia extends Model
{
    protected $fillable = [
        'orden_id',
        'archivo',
        'tipo'
    ];

    public function orden()
    {
        return $this->belongsTo(OrdenServicio::class, 'orden_id');
    }
}
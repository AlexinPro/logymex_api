<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Unidad extends Model
{
    protected $table = 'unidades';
    protected $fillable = [
        'placas',
        'marca',
        'modelo',
        'tipo',
        'activo'
    ];

    public function ordenes()
    {
        return $this->hasMany(OrdenServicio::class);
    }
}
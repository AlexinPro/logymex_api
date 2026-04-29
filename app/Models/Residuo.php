<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Residuo extends Model
{
    protected $fillable = [
        'nombre',
        'clasificacion',
        'descripcion'
    ];

    public function ordenes()
    {
        return $this->belongsToMany(OrdenServicio::class, 'orden_residuo')
            ->withPivot('cantidad', 'unidad_medida')
            ->withTimestamps();
    }
}
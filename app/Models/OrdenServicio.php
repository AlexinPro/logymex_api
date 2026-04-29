<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrdenServicio extends Model
{
    protected $table = 'orden_servicio';

    protected $fillable = [
        'folio',
        'fecha',
        'tipo_servicio',
        'estado',
        'ejecutivo_id',
        'cliente_id',
        'unidad_id'
    ];

    // 🔗 Relaciones

    public function unidad()
    {
        return $this->belongsTo(Unidad::class);
    }

    public function ejecutivo()
    {
        return $this->belongsTo(User::class, 'ejecutivo_id');
    }

    public function operadores()
    {
        return $this->belongsToMany(User::class, 'orden_operador', 'orden_id', 'user_id');
    }

    public function residuos()
    {
        return $this->belongsToMany(Residuo::class, 'orden_residuo')
            ->withPivot('cantidad', 'unidad_medida')
            ->withTimestamps();
    }

    public function evidencias()
    {
        return $this->hasMany(Evidencia::class, 'orden_id');
    }
}
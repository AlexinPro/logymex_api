<?php

namespace App\Models;

use App\Models\OrdenServicio;
use App\Models\Operador;
use App\Models\Ejecutivo;   
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens;

    protected $fillable = [
        'name',
        'email',
        'telefono',
        'activo',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'activo' => 'boolean', // ✅ recomendado
        ];
    }

    // 🔗 Relaciones

    public function operador()
    {
        return $this->hasOne(Operador::class);
    }

    public function ejecutivo()
    {
        return $this->hasOne(Ejecutivo::class);
    }

    public function ordenesComoEjecutivo()
    {
        return $this->hasMany(OrdenServicio::class, 'ejecutivo_id');
    }

    public function ordenesComoOperador()
    {
        return $this->belongsToMany(
            OrdenServicio::class,
            'orden_operador',
            'user_id',
            'orden_id'
        );
    }
}
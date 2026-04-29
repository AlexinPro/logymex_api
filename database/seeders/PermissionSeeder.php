<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

class PermissionSeeder extends Seeder
{
    public function run(): void
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        $permisos = [
            // Órdenes
            'ver ordenes',
            'crear ordenes',
            'editar ordenes',
            'eliminar ordenes',

            // Usuarios
            'ver usuarios',
            'crear usuarios',
            'editar usuarios',
            'eliminar usuarios',

            // Catálogos
            'ver residuos',
            'ver unidades',
            'ver clientes',

            // Evidencias
            'subir evidencias',
            'ver evidencias'
        ];

        foreach ($permisos as $permiso) {
            Permission::firstOrCreate(['name' => $permiso]);
        }
    }
}
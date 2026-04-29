<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    public function run(): void
    {
        $superAdmin = Role::findByName('super_admin');
        $admin = Role::findByName('admin');
        $ejecutivo = Role::findByName('ejecutivo');
        $operador = Role::findByName('operador');

        // Super admin → todo
        $superAdmin->givePermissionTo(Permission::all());

        // Admin
        $admin->givePermissionTo([
            'ver ordenes',
            'crear ordenes',
            'editar ordenes',
            'ver usuarios',
            'ver residuos',
            'ver unidades',
            'ver clientes',
            'ver evidencias'
        ]);

        // Ejecutivo
        $ejecutivo->givePermissionTo([
            'ver ordenes',
            'crear ordenes',
            'editar ordenes',
            'ver clientes'
        ]);

        // Operador
        $operador->givePermissionTo([
            'ver ordenes',
            'subir evidencias',
            'ver evidencias'
        ]);
    }
}
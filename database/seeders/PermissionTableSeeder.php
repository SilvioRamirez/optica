<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::truncate();

        $permissions = [
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',
            'product-list',
            'product-create',
            'product-edit',
            'product-delete',
            'user-list',
            'user-create',
            'user-edit',
            'user-delete',
            'paciente-list',
            'paciente-create',
            'paciente-edit',
            'paciente-delete',
            'configuracion-list',
            'configuracion-create',
            'configuracion-edit',
            'configuracion-delete',
            'formulario-list',
            'formulario-create',
            'formulario-edit',
            'formulario-delete',
            'formulario-download',
            'formulario-telefono',
            'formulario-estatus',
            'refractante-list',
            'refractante-create',
            'refractante-edit',
            'refractante-delete',
            'refractante-download',
            'refractante-telefono',
            'refractante-estatus',
            'tipo-list',
            'tipo-create',
            'tipo-edit',
            'tipo-delete',
            'tipo-download'
        ];
        
        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}

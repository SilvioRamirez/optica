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
            'bioanalista-list',
            'bioanalista-create',
            'bioanalista-edit',
            'bioanalista-delete',
            'examen-list',
            'examen-create',
            'examen-edit',
            'examen-delete',
            'caracteristica-list',
            'caracteristica-create',
            'caracteristica-edit',
            'caracteristica-delete',
            'resultado-list',
            'resultado-create',
            'resultado-edit',
            'resultado-delete',
            'muestra-list',
            'muestra-create',
            'muestra-edit',
            'muestra-delete',
            'configuracion-list',
            'configuracion-create',
            'configuracion-edit',
            'configuracion-delete',
            
        ];
        
        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}

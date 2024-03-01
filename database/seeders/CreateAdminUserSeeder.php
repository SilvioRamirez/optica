<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'name' => 'SILVIO RAMÍREZ', 
            'email' => 'silvio.ramirez.m@gmail.com',
            'password' => bcrypt('secret')
        ]);
        
        $role = Role::create(['name' => 'Super Admin']);

        /* $permissions = Permission::pluck('id','id')->all();

        $role->syncPermissions($permissions);*/

        $user->assignRole([$role->id]);

        $user = User::create([
            'name' => 'JHONNY TORRES', 
            'email' => 'jhonnytorresforro@gmail.com',
            'password' => bcrypt('Jh18348340')
        ]);

        $user->assignRole([$role->id]);

        $user = User::create([
            'name' => 'DUBERLYS SANCHEZ', 
            'email' => 'sanchezduberlys@gmail.com',
            'password' => bcrypt('Duberlys2020')
        ]);

        $user->assignRole([$role->id]);

        $role = Role::create(['name' => 'Admin']);

        $user = User::create([
            'name' => 'YENNILE TORRES', 
            'email' => 'torresmontillayennile@gmail.com',
            'password' => bcrypt('Salomon2607')
        ]);

        $user->assignRole([$role->id]);
        
        $role = Role::create(['name' => 'Registrador']);

        $user = User::create([
            'name' => 'ALEJANDRO', 
            'email' => 'alejandrotelesur@gmail.com',
            'password' => bcrypt('Alle2424*')
        ]);

        $user->assignRole([$role->id]);

        $user = User::create([
            'name' => 'KATHERINE CALDERON', 
            'email' => 'katherinecalderon2301@gmail.com ',
            'password' => bcrypt('30045302')
        ]);

        $user->assignRole([$role->id]);

        $user = User::create([
            'name' => 'JOEKERLIS', 
            'email' => 'joekerlis0507@gmail.com',
            'password' => bcrypt('Jh18348340')
        ]);

        $role = Role::create(['name' => 'Analista']);
        
        $user->assignRole([$role->id]);
    }
}

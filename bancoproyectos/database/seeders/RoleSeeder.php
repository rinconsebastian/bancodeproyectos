<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       // Reset cached roles and permissions
       app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

// create roles 
       $role1 = Role::create(['name' => 'Administrador']);
       $role2 = Role::create(['name' => 'Formulador']);
       $role3 = Role::create(['name' => 'Evaluador']);
       $role4 = Role::create(['name' => 'Auditor']);


       // create permissions
       Permission::create(['name' => 'admin.users.index'])->syncRoles([$role1]);
       Permission::create(['name' => 'admin.users.create'])->syncRoles([$role1]);
       Permission::create(['name' => 'admin.users.edit'])->syncRoles([$role1]);
       Permission::create(['name' => 'admin.users.destroy'])->syncRoles([$role1]);

       Permission::create(['name' => 'admin.dependencias.index'])->syncRoles([$role1]);
       Permission::create(['name' => 'admin.dependencias.create'])->syncRoles([$role1]);
       Permission::create(['name' => 'admin.dependencias.edit'])->syncRoles([$role1]);
       Permission::create(['name' => 'admin.dependencias.destroy'])->syncRoles([$role1]);

       Permission::create(['name' => 'proyectos.index'])->syncRoles([$role2]);
       Permission::create(['name' => 'proyectos.create'])->syncRoles([$role2]);
       Permission::create(['name' => 'proyectos.edit'])->syncRoles([$role2]);
       Permission::create(['name' => 'proyectos.destroy'])->syncRoles([$role2]);

       Permission::create(['name' => 'proyectos.presentar'])->syncRoles([$role2]);
       Permission::create(['name' => 'proyectos.aprobar'])->syncRoles([$role3]);
       Permission::create(['name' => 'proyectos.devolver'])->syncRoles([$role3]);
       Permission::create(['name' => 'proyectos.corregir'])->syncRoles([$role2]);
       Permission::create(['name' => 'proyectos.rechazar'])->syncRoles([$role3]);
       Permission::create(['name' => 'proyectos.eliminar'])->syncRoles([$role2]);

       Permission::create(['name' => 'revisiones.index'])->syncRoles([$role2,$role3]);
       Permission::create(['name' => 'revisiones.create'])->syncRoles([$role3]);
       Permission::create(['name' => 'revisiones.edit'])->syncRoles([$role3]);
       Permission::create(['name' => 'revisiones.destroy'])->syncRoles([$role3]);

       

       

       
       
       
       
       
       
       
    }
}

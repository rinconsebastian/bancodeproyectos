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
       Permission::create(['name' => 'admin.users.index','description'=>'Ver listado de usuarios'])->syncRoles([$role1]);
       Permission::create(['name' => 'admin.users.create','description'=>'Crear usuarios'])->syncRoles([$role1]);
       Permission::create(['name' => 'admin.users.edit','description'=>'Editar usuarios'])->syncRoles([$role1]);
       Permission::create(['name' => 'admin.users.update','description'=>'Asignar roles'])->syncRoles([$role1]);
       Permission::create(['name' => 'admin.users.destroy','description'=>'Eliminar usuarios'])->syncRoles([$role1]);

       Permission::create(['name' => 'admin.roles.index','description'=>'Ver listado de roles'])->syncRoles([$role1]);
       Permission::create(['name' => 'admin.roles.create','description'=>'Crear roles'])->syncRoles([$role1]);
       Permission::create(['name' => 'admin.roles.edit','description'=>'Editar roles'])->syncRoles([$role1]);
       Permission::create(['name' => 'admin.roles.destroy','description'=>'Eliminar roles'])->syncRoles([$role1]);

       Permission::create(['name' => 'admin.dependencias.index','description'=>'Ver listado de dependencias'])->syncRoles([$role1]);
       Permission::create(['name' => 'admin.dependencias.create','description'=>'Crear dependencias'])->syncRoles([$role1]);
       Permission::create(['name' => 'admin.dependencias.edit','description'=>'Editar dependencias'])->syncRoles([$role1]);
       Permission::create(['name' => 'admin.dependencias.destroy','description'=>'Eliminar dependneicas'])->syncRoles([$role1]);

       Permission::create(['name' => 'proyectos.index','description'=>'Ver listado de proyectos'])->syncRoles([$role2]);
       Permission::create(['name' => 'proyectos.create','description'=>'Crear proyectos'])->syncRoles([$role2]);
       Permission::create(['name' => 'proyectos.edit','description'=>'Editar proyectos'])->syncRoles([$role2]);
       Permission::create(['name' => 'proyectos.destroy','description'=>'Eliminar proyectos'])->syncRoles([$role2]);

       Permission::create(['name' => 'proyectos.presentar','description'=>'Presentar Proyectos'])->syncRoles([$role2]);
       Permission::create(['name' => 'proyectos.aprobar','description'=>'aprobar proyectos'])->syncRoles([$role3]);
       Permission::create(['name' => 'proyectos.devolver','description'=>'Devolver proyectos'])->syncRoles([$role3]);
       Permission::create(['name' => 'proyectos.corregir','description'=>'Corregir proyectos'])->syncRoles([$role2]);
       Permission::create(['name' => 'proyectos.rechazar','description'=>'Rechazar proyectos'])->syncRoles([$role3]);
       Permission::create(['name' => 'proyectos.eliminar','description'=>'Eliminar proyectos'])->syncRoles([$role2]);
       Permission::create(['name' => 'proyectos.registrar','description'=>'Registrar proyectos'])->syncRoles([$role3]);

       Permission::create(['name' => 'revisiones.index','description'=>'Ver listado de revisiones'])->syncRoles([$role2,$role3]);
       Permission::create(['name' => 'revisiones.create','description'=>'Crear revisiones'])->syncRoles([$role3]);
       Permission::create(['name' => 'revisiones.edit','description'=>'Editar revisiones'])->syncRoles([$role3]);
       Permission::create(['name' => 'revisiones.destroy','description'=>'Eliminar revisiones'])->syncRoles([$role3]);

       

       

       
       
       
       
       
       
       
    }
}

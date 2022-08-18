<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create(['name' => 'administrador']);
        $managerRole = Role::create(['name' => 'gerente']);
        $employeeRole = Role::create(['name' => 'empleado']);

        Permission::create(['name'=>'users.index']);
        Permission::create(['name'=>'users.show']);
        Permission::create(['name'=>'users.edit']);
        Permission::create(['name'=>'users.create']);
        Permission::create(['name'=>'users.destroy']);

        Permission::create(['name'=>'medicaments.index'])->syncRoles([$managerRole,$employeeRole]);
        Permission::create(['name'=>'medicaments.show'])->syncRoles([$managerRole,$employeeRole]);
        Permission::create(['name'=>'medicaments.edit'])->syncRoles([$managerRole,$employeeRole]);
        Permission::create(['name'=>'medicaments.create'])->syncRoles([$managerRole,$employeeRole]);
        Permission::create(['name'=>'medicaments.destroy'])->syncRoles([$managerRole]);

        Permission::create(['name'=>'modules.index'])->syncRoles([$managerRole,$employeeRole]);
        Permission::create(['name'=>'modules.show'])->syncRoles([$managerRole,$employeeRole]);
        Permission::create(['name'=>'modules.edit'])->syncRoles([$managerRole]);
        Permission::create(['name'=>'modules.create'])->syncRoles([$managerRole]);
        Permission::create(['name'=>'modules.destroy'])->syncRoles([$managerRole]);

        Permission::create(['name'=>'doctors.index'])->syncRoles([$managerRole,$employeeRole]);
        Permission::create(['name'=>'doctors.show'])->syncRoles([$managerRole,$employeeRole]);
        Permission::create(['name'=>'doctors.edit'])->syncRoles([$managerRole,$employeeRole]);
        Permission::create(['name'=>'doctors.create'])->syncRoles([$managerRole,$employeeRole]);
        Permission::create(['name'=>'doctors.destroy'])->syncRoles([$managerRole]);

        Permission::create(['name'=>'pathologies.index'])->syncRoles([$managerRole,$employeeRole]);
        Permission::create(['name'=>'pathologies.show'])->syncRoles([$managerRole,$employeeRole]);
        Permission::create(['name'=>'pathologies.edit'])->syncRoles([$managerRole,$employeeRole]);
        Permission::create(['name'=>'pathologies.create'])->syncRoles([$managerRole,$employeeRole]);
        Permission::create(['name'=>'pathologies.destroy'])->syncRoles([$managerRole]);
        
        Permission::create(['name'=>'units.index'])->syncRoles([$managerRole,$employeeRole]);
        Permission::create(['name'=>'units.show'])->syncRoles([$managerRole,$employeeRole]);
        Permission::create(['name'=>'units.edit'])->syncRoles([$managerRole,$employeeRole]);
        Permission::create(['name'=>'units.create'])->syncRoles([$managerRole,$employeeRole]);
        Permission::create(['name'=>'units.destroy'])->syncRoles([$managerRole]);
        
        Permission::create(['name'=>'recipes.index'])->syncRoles([$managerRole,$employeeRole]);
        Permission::create(['name'=>'recipes.show'])->syncRoles([$managerRole,$employeeRole]);
        Permission::create(['name'=>'recipes.edit'])->syncRoles([$managerRole,$employeeRole]);
        Permission::create(['name'=>'recipes.create'])->syncRoles([$managerRole,$employeeRole]);
        Permission::create(['name'=>'recipes.destroy'])->syncRoles([$managerRole]);

        Permission::create(['name'=>'patients.index'])->syncRoles([$managerRole,$employeeRole]);
        Permission::create(['name'=>'patients.show'])->syncRoles([$managerRole,$employeeRole]);
        Permission::create(['name'=>'patients.edit'])->syncRoles([$managerRole,$employeeRole]);
        Permission::create(['name'=>'patients.create'])->syncRoles([$managerRole,$employeeRole]);
        Permission::create(['name'=>'patients.destroy'])->syncRoles([$managerRole]);
}
}

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

        Permission::create(['name' => 'user.index']);
        Permission::create(['name' => 'user.show']);
        Permission::create(['name' => 'user.update']);
        Permission::create(['name' => 'user.store']);
        Permission::create(['name' => 'user.destroy']);
        Permission::create(['name' => 'user.restore']);

        Permission::create(['name' => 'medicament.index'])->syncRoles([$managerRole, $employeeRole]);
        Permission::create(['name' => 'medicament.show'])->syncRoles([$managerRole, $employeeRole]);
        Permission::create(['name' => 'medicament.update'])->syncRoles([$managerRole, $employeeRole]);
        Permission::create(['name' => 'medicament.store'])->syncRoles([$managerRole, $employeeRole]);
        Permission::create(['name' => 'medicament.destroy'])->syncRoles([$managerRole]);
        Permission::create(['name' => 'medicament.restore'])->syncRoles([$managerRole]);

        Permission::create(['name' => 'module.index'])->syncRoles([$managerRole, $employeeRole]);
        Permission::create(['name' => 'module.show'])->syncRoles([$managerRole, $employeeRole]);
        Permission::create(['name' => 'module.update'])->syncRoles([$managerRole]);
        Permission::create(['name' => 'module.store'])->syncRoles([$managerRole]);
        Permission::create(['name' => 'module.destroy'])->syncRoles([$managerRole]);
        Permission::create(['name' => 'module.restore'])->syncRoles([$managerRole]);

        Permission::create(['name' => 'buy.index'])->syncRoles([$managerRole, $employeeRole]);
        Permission::create(['name' => 'buy.show'])->syncRoles([$managerRole, $employeeRole]);
        Permission::create(['name' => 'buy.update'])->syncRoles([$managerRole]);
        Permission::create(['name' => 'buy.store'])->syncRoles([$managerRole, $employeeRole]);
        Permission::create(['name' => 'buy.destroy'])->syncRoles([$managerRole]);
        Permission::create(['name' => 'buy.restore'])->syncRoles([$managerRole]);

        Permission::create(['name' => 'transfer.index'])->syncRoles([$managerRole, $employeeRole]);
        Permission::create(['name' => 'transfer.show'])->syncRoles([$managerRole, $employeeRole]);
        Permission::create(['name' => 'transfer.update'])->syncRoles([$managerRole]);
        Permission::create(['name' => 'transfer.store'])->syncRoles([$managerRole, $employeeRole]);
        Permission::create(['name' => 'transfer.destroy'])->syncRoles([$managerRole]);
        Permission::create(['name' => 'transfer.restore'])->syncRoles([$managerRole]);

        Permission::create(['name' => 'service.index'])->syncRoles([$managerRole, $employeeRole]);
        Permission::create(['name' => 'service.show'])->syncRoles([$managerRole, $employeeRole]);
        Permission::create(['name' => 'service.update'])->syncRoles([$managerRole]);
        Permission::create(['name' => 'service.store'])->syncRoles([$managerRole]);
        Permission::create(['name' => 'service.destroy'])->syncRoles([$managerRole]);
        Permission::create(['name' => 'service.restore'])->syncRoles([$managerRole]);

        Permission::create(['name' => 'doctor.index'])->syncRoles([$managerRole, $employeeRole]);
        Permission::create(['name' => 'doctor.show'])->syncRoles([$managerRole, $employeeRole]);
        Permission::create(['name' => 'doctor.update'])->syncRoles([$managerRole]);
        Permission::create(['name' => 'doctor.store'])->syncRoles([$managerRole]);
        Permission::create(['name' => 'doctor.destroy'])->syncRoles([$managerRole]);
        Permission::create(['name' => 'doctor.restore'])->syncRoles([$managerRole]);

        Permission::create(['name' => 'pathology.index'])->syncRoles([$managerRole, $employeeRole]);
        Permission::create(['name' => 'pathology.show'])->syncRoles([$managerRole, $employeeRole]);
        Permission::create(['name' => 'pathology.update'])->syncRoles([$managerRole, $employeeRole]);
        Permission::create(['name' => 'pathology.store'])->syncRoles([$managerRole, $employeeRole]);
        Permission::create(['name' => 'pathology.destroy'])->syncRoles([$managerRole]);
        Permission::create(['name' => 'pathology.restore'])->syncRoles([$managerRole]);

        Permission::create(['name' => 'unit.index'])->syncRoles([$managerRole, $employeeRole]);
        Permission::create(['name' => 'unit.show'])->syncRoles([$managerRole, $employeeRole]);
        Permission::create(['name' => 'unit.update'])->syncRoles([$managerRole, $employeeRole]);
        Permission::create(['name' => 'unit.store'])->syncRoles([$managerRole, $employeeRole]);
        Permission::create(['name' => 'unit.destroy'])->syncRoles([$managerRole]);
        Permission::create(['name' => 'unit.restore'])->syncRoles([$managerRole]);

        Permission::create(['name' => 'recipe.index'])->syncRoles([$managerRole, $employeeRole]);
        Permission::create(['name' => 'recipe.show'])->syncRoles([$managerRole, $employeeRole]);
        Permission::create(['name' => 'recipe.update'])->syncRoles([$managerRole, $employeeRole]);
        Permission::create(['name' => 'recipe.store'])->syncRoles([$managerRole, $employeeRole]);
        Permission::create(['name' => 'recipe.destroy'])->syncRoles([$managerRole]);
        Permission::create(['name' => 'recipe.restore'])->syncRoles([$managerRole]);

        Permission::create(['name' => 'patient.index'])->syncRoles([$managerRole, $employeeRole]);
        Permission::create(['name' => 'patient.show'])->syncRoles([$managerRole, $employeeRole]);
        Permission::create(['name' => 'patient.update'])->syncRoles([$managerRole, $employeeRole]);
        Permission::create(['name' => 'patient.store'])->syncRoles([$managerRole, $employeeRole]);
        Permission::create(['name' => 'patient.destroy'])->syncRoles([$managerRole]);
        Permission::create(['name' => 'patient.restore'])->syncRoles([$managerRole]);
    }
}

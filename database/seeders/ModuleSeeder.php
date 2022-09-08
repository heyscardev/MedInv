<?php

namespace Database\Seeders;

use App\Models\Module;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $module1 = new Module([
            'code'=>"seg123",
            'name'=> "alto costo",
            'user_id'=>1
        ]);
        $module1->save();
        $module2 = new Module([
            'code'=>"seg124",
            'name'=> "almacen",
            'user_id'=>1
        ]);
        $module2->save();
    }
}

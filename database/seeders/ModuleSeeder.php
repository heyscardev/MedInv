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
            'code'=>"alt1",
            'name'=> "alto costo",
            'user_id'=>2
        ]);
        $module1->save();
        $module2 = new Module([
            'code'=>"alm1",
            'name'=> "almacen",
            'user_id'=>2
        ]);
        $module2->save();
        $module1 = new Module([
            'code'=>"quir1",
            'name'=> "quirodano",
            'user_id'=>4
        ]);
        $module1->save();
        $module2 = new Module([
            'code'=>"escave",
            'name'=> "farmacia",
            'user_id'=>5
        ]);
        $module2->save();
        $module1 = new Module([
            'code'=>"emrg1",
            'name'=> "emergencias",
            'user_id'=>6
        ]);
        $module1->save();
        $module2 = new Module([
            'code'=>"rep1",
            'name'=> "recepcion",
            'user_id'=>6
        ]);
        $module2->save();
    }
}

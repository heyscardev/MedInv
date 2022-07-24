<?php

namespace Database\Seeders;

use App\Models\Unit;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    $data = [
       [ 'name' => 'AMPOLLAS'],
       [ 'name' => 'CAPSULAS'],
       [ 'name' => 'COMPRIMIDO'],
       [ 'name' => 'CREMA'],
       [ 'name' => 'EMULSION'],
       [ 'name' => 'FRICCION'],
       [ 'name' => 'GEL'],
       [ 'name' => 'GOTAS'],
       [ 'name' => 'JALEA'],
       [ 'name' => 'JARABE'],
       [ 'name' => 'INHALADOR'],
       [ 'name' => 'LOCION'],
       [ 'name' => 'OVULOS'],
       [ 'name' => 'PARCHES'],
       [ 'name' => 'POLVO'],
       [ 'name' => 'SOLUCION'],
       [ 'name' => 'SOBRE'],
       [ 'name' => 'SPRAY'],
       [ 'name' => 'SUSPENSION'],
       [ 'name' => 'SUPOSITORIO'],
       [ 'name' => 'TABLETAS'],
       [ 'name' => 'UNGUENTO']
    ];
    Unit::insert($data);
    }
}

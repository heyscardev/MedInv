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
            [ 'name' => 'AMPOLLAS', 'created_at' => now(), 'updated_at' => now() ],
            [ 'name' => 'CAPSULAS', 'created_at' => now(), 'updated_at' => now() ],
            [ 'name' => 'COMPRIMIDO', 'created_at' => now(), 'updated_at' => now() ],
            [ 'name' => 'CREMA', 'created_at' => now(), 'updated_at' => now() ],
            [ 'name' => 'EMULSION', 'created_at' => now(), 'updated_at' => now() ],
            [ 'name' => 'FRICCION', 'created_at' => now(), 'updated_at' => now() ],
            [ 'name' => 'GEL', 'created_at' => now(), 'updated_at' => now() ],
            [ 'name' => 'GOTAS', 'created_at' => now(), 'updated_at' => now() ],
            [ 'name' => 'JALEA', 'created_at' => now(), 'updated_at' => now() ],
            [ 'name' => 'JARABE', 'created_at' => now(), 'updated_at' => now() ],
            [ 'name' => 'INHALADOR', 'created_at' => now(), 'updated_at' => now() ],
            [ 'name' => 'LOCION', 'created_at' => now(), 'updated_at' => now() ],
            [ 'name' => 'OVULOS', 'created_at' => now(), 'updated_at' => now() ],
            [ 'name' => 'PARCHES', 'created_at' => now(), 'updated_at' => now() ],
            [ 'name' => 'POLVO', 'created_at' => now(), 'updated_at' => now() ],
            [ 'name' => 'SOLUCION', 'created_at' => now(), 'updated_at' => now() ],
            [ 'name' => 'SOBRE', 'created_at' => now(), 'updated_at' => now() ],
            [ 'name' => 'SPRAY', 'created_at' => now(), 'updated_at' => now() ],
            [ 'name' => 'SUSPENSION', 'created_at' => now(), 'updated_at' => now() ],
            [ 'name' => 'SUPOSITORIO', 'created_at' => now(), 'updated_at' => now() ],
            [ 'name' => 'TABLETAS', 'created_at' => now(), 'updated_at' => now() ],
            [ 'name' => 'UNGUENTO', 'created_at' => now(), 'updated_at' => now() ]
        ];
        Unit::insert($data);
    }
}

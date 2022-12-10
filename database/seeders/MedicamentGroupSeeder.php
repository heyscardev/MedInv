<?php

namespace Database\Seeders;

use App\Models\MedicamentGroup;
use Illuminate\Database\Seeder;

class MedicamentGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $data = [
            [
                'name' => 'PSICOTRÓPICOS',
                'description' => 'Cualquier sustancia natural o sintética, capaz de influenciar las funciones psíquicas por su acción sobre el Sistema Nervioso Central (SNC).',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'ONCOLÓGICOS',
                'description' => 'Se usan en ciertos tipos de cáncer para ayudar a que el sistema inmunitario del paciente reconozca y ataque las células cancerosas.',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'ANTIBIÓTICOS',
                'description' => 'Se utilizan para tratar las infecciones causadas por bacterias.',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'ANALGÉSICOS',
                'description' => 'Los fármacos analgésicos actúan de diversas formas sobre los sistemas nerviosos central y periférico.',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ];
        MedicamentGroup::insert($data);
    }
}

<?php

namespace Database\Seeders;

use App\Models\Medicament;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MedicamentSeeder extends Seeder
{
    const PSICOTROPICO = 1;
    const ONCOLOGICO   = 2;
    const ANTIBIOTICO  = 3;
    const ANALGESICO   = 4;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'code' => 'P-007-000',
                'name' => 'TIOPENTAL SODICO AMPOLLA 0,5 GR',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(), 'updated_at' => now()
            ],
            [
                'code' => 'P-008-000',
                'name' => 'KETAMINA FRASCO DE 50 MG/ML',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-010-001',
                'name' => 'LIDOCAINA  . 1 % FCOS    AMPOLLAS',
                'medicament_group_id' => null,
                'unit_id' => 16,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-010-002',
                'name' => 'LIDOCAINA AL 2%  FRASCO  AMP.  DE 100 ML',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-010-002-1',
                'name' => 'LIDOCAINA 2% AMPOLLAS X10 ML',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-010-005',
                'name' => 'LIDOCAINA  AMPOLLA AL 5% 100 MG / 2ML',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-015-000',
                'name' => 'SUCCINIL CHOLINE AMPOLLA 200MG / 10 ML',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-021-000',
                'name' => 'DIFENIL HIDANTOINATO AMPOLLA 100 MGX 2 ML',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-026-000',
                'name' => 'TIOCOLCHICOSIDO AMPOLLAS 4MG / 2 ML',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-026-A-000',
                'name' => 'VECURONIO BROMURO AMP. X 4 MG/1ML',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-027-000',
                'name' => 'BIPERIDONOCLORHIDRATO AMPOLLA  5MG',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-030-000',
                'name' => 'AMPOLLAS 2 MG/ML PANCUONIO BROMURO',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-041-000',
                'name' => 'METAMIZOL SODICO AMPOLLA DE 2 ML AL 50%',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-041-001',
                'name' => 'METAMIZOL SODICO 1GR AMPOLLA DE 2ML',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-046-000',
                'name' => 'BROMURO DE HIOSCINA AMP X 2 ML',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-050-000',
                'name' => 'KETOPROFENO  AMPS 100 MG/ 2ML  IM',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-050-001',
                'name' => 'KETOPROFENO AMPS 100  MG  IV X5 ML',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-051-000',
                'name' => 'DICLOFENAC SODICO AMPS.  75 MG / 3 ML',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-052-A-000',
                'name' => 'KETOROLAC AMP.  IV IM',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-058-000',
                'name' => 'TEOFILINA AMPOLLAS 250 MG X 10 ML',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-059-000',
                'name' => 'DOBUTAMINA AMP 250 MG/10 ML',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-061-000',
                'name' => 'NALOXONA AMPOLLAS 0.4MG / ML',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-076-A-002',
                'name' => 'MIDAZOLAN 10 MG X 2 ML AMPOLLAS',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-079-000',
                'name' => 'NEOSTIGMINA AMPOLLAS 0.5 MG/ ML',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-082-000',
                'name' => 'ADRENALINA SOLUCION ACUOSA AL1/100X1ML',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-082-001',
                'name' => 'NORADRENALINA 4 MG/4ML',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-082-002',
                'name' => 'NOREPINEFRINA 1MG/ML AMP',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-085-000',
                'name' => 'CLORHIDRATO DE EFEDRINA 25 MG/ML AMP',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-093-000',
                'name' => 'DOPAMINA AMPOLLAS 50MG (50MG/ML)',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-097-000',
                'name' => 'ATROPINA AMPS.  0.5 MG/ ML',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-098-A-000',
                'name' => 'AMP. 2,25 MG/2ML PRAMIVERINA',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-109-000',
                'name' => 'NIMODIPINA . 50ML AMP',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-114-000',
                'name' => 'AMIODARONA AMP 150 MG X 3 ML',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-116-000',
                'name' => 'DIGOXINA AMPS.  0.5MG/ 2 ML',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-124-000',
                'name' => 'VERAPAMYL AMPS. 5 MG/ ML',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-126-000',
                'name' => 'PENTOXIFILINA AMPS. 300 MG / 15 ML',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-133-000',
                'name' => 'ATENOLOL AMPOLLA DE 5 MG X 10 ML',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-135-000',
                'name' => 'CLONIDINA AMPS.  0.150 MG/ ML',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-137-001',
                'name' => 'CLORURO DE POTASIO AMPS. 2 MEQ/MLX100 ML',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-139-001',
                'name' => 'GLUCONATO DE CALCIO  VIALES X 100 ML',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-156-001',
                'name' => 'SOL FISIOLOGICA  100 ML AL 0,09%',
                'medicament_group_id' => null,
                'unit_id' => 16,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-156-002',
                'name' => 'SOL FISIOLOGICA  500ML  AL 0,09%',
                'medicament_group_id' => null,
                'unit_id' => 16,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-156-003',
                'name' => 'SOL FISIOLOGICA 0.9 % X 250 ML',
                'medicament_group_id' => null,
                'unit_id' => 16,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-156-004',
                'name' => 'CLORURO DE SODIO 0.9% X 5 ML SOLUCION INYECTABLE',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-157-001',
                'name' => 'FCO X 100 ML AL 20%  HIPERTONICA CLORURO DE SODIO',
                'medicament_group_id' => null,
                'unit_id' => 16,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-162-001',
                'name' => 'RINGER SOLUCION CON DEXTROSA X 500 ML',
                'medicament_group_id' => null,
                'unit_id' => 16,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-164-001',
                'name' => 'FRASCO DE 500 ML  30  MEQ ELECTROLITOS FRASCO ORAL',
                'medicament_group_id' => null,
                'unit_id' => 16,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-165-001',
                'name' => 'SOL AL 5% X 500 ML  DEXTROSA',
                'medicament_group_id' => null,
                'unit_id' => 16,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-165-002',
                'name' => 'SOL AL 10% DE 500 ML DEXTROSA',
                'medicament_group_id' => null,
                'unit_id' => 16,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-166-001',
                'name' => 'SOL DEXTROSA 5% EN NACLO 0,9% X500 ML',
                'medicament_group_id' => null,
                'unit_id' => 16,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-167-000',
                'name' => 'SULFATO DE MAGNESIO SOL. AL 0.45% X 500ML',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-169-001',
                'name' => 'SOL.  AL 30% X 500 ML DEXTROSAL',
                'medicament_group_id' => null,
                'unit_id' => 16,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-169-002',
                'name' => 'SOL.  AL 0.45%  SIN DEXTROSA X 500 ML',
                'medicament_group_id' => null,
                'unit_id' => 16,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-169-003',
                'name' => 'DEXTROSAL SOL. AL 0.45% X 500ML',
                'medicament_group_id' => null,
                'unit_id' => 16,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-170-001',
                'name' => 'MANITOL SOL.  AL 18% X 500 ML',
                'medicament_group_id' => null,
                'unit_id' => 16,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-171-000',
                'name' => 'LIPIDOS AMPS. AL 20%X500ML',
                'medicament_group_id' => null,
                'unit_id' => 16,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-172-000',
                'name' => 'BICARBONATO DE NA FCO.  AMPS.  X 100 ML',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-173-000',
                'name' => 'AMINOACIDOS Y DEXTROSA FCO. AMPOLLAS 500 ML',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-177-000',
                'name' => 'POLIPECTIDOS SOL .  I.V . AL 3.5 % X 500 ML',
                'medicament_group_id' => null,
                'unit_id' => 16,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-184-000',
                'name' => 'FUROSEMIDA AMPS.  20 MG X 1ML',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-191-000',
                'name' => 'CLORFENAMINA  MELEATO AMPS.  5 MG X 1 MG',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-192-000',
                'name' => 'DIFENHIDRAMINA AMP 20 MG',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-199-A-000',
                'name' => 'OMEPRAZOL AMP. 40 MG I.V.',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-199-A-002',
                'name' => 'ESOMEPRAZOL  40 MG/  AMP',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-204-000',
                'name' => 'RANITIDINA AMPS.  50 MG',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-220-000',
                'name' => 'BROMEXINA AMPS.  4 MG/ 2 ML',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-221-000',
                'name' => 'METOCLOPRAMIDA AMPS.  10 MG / 2 ML',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-231-000',
                'name' => 'HIERRO DEXTRANO IM AMPS.  /100MG/2 ML AL 5% X 10',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-231-001',
                'name' => 'HIERRO DEXTRANO AMPS. 100MG  I.V.',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-233-000',
                'name' => 'VITAMINA B12 AMPS.  1 MG X 1 ML',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-234-000',
                'name' => 'ACIDO FOLICO AMPS.  10 MG /ML',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-249-000',
                'name' => 'HEPARINA SODICA AMPS.  1000 UI/ ML X10',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-257-000',
                'name' => 'ACIDO TRANEXAMICO 500MG/ 5 ML AMPS.   I. V',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-258-000',
                'name' => 'ETAMSILATO AMPS.  250 MG / 2 ML',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-266-000',
                'name' => 'VITAMINA B6 AMPS.  300MG/ 2 ML',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-269-000',
                'name' => 'COMPLEJO B IM AMPS.  3 ML',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-269-001',
                'name' => 'COMPLEJO B IV AMPS.  5 ML',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-274-000',
                'name' => 'VITAMINA C AMPS.  500 MG / 5 ML',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-278-000',
                'name' => 'VITAMINA K1 AMPS.  10 MG/ 1 ML',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-281-001',
                'name' => 'COMPLEJO VITAMINICO A-D-E, Y K ,AMPOLLA 2ML I.V',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-328-001',
                'name' => 'CRISTALINA AMPS. 100 UI./ML X 10 ML',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-328-002',
                'name' => 'INSULINA ASPARTO 3.5 MG POR 100U.I.',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-329-000',
                'name' => 'HUMANA 70-30 FCO.AMPOLLA ISULINA',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-330-001',
                'name' => 'NPH  HUMANA AMP. 100 UD X 10 ML',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-330-002',
                'name' => 'GLARGINA 100 ML FCO. INSULINA',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-330-004',
                'name' => 'INSULINA LISPRO 100 UDS-HUMALOG CARTUCHOS',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-330-006',
                'name' => 'INSULINA DETEMIR 14.2 MG POR 100 U.I.',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-347-000',
                'name' => 'HIDROCORTISONA AMPS.  100 MG / 2 ML',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-347-001',
                'name' => 'HIDROCORTISONA AMPS. 500MG/5ML',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-350-000',
                'name' => 'METILPRDNISOLONA AMPS 125 MG',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-350-001',
                'name' => 'METILPREDNISOLONA AMPS 500 MG / 5 ML',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-350-003',
                'name' => 'METILPREDNISOLONA  40 MG AMPOLLAS',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-353-000',
                'name' => 'TRIAMCINOLONA AMPOLLAS 10MG / 5ML',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-353-001',
                'name' => 'TRIAMCINOLA  I.A. (KENACORT) AMPOLLA ACETTONIDA',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-354-000',
                'name' => 'BETAMETASONA AMPS.  4 MG',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-355-000',
                'name' => 'DEXAMETASONA AMPS.  4 MG',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-355-001',
                'name' => 'DEXAMETASONA  8 MG AMPOLLAS',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-375-000',
                'name' => 'AMPS.  100 MG / 100ML CIPROFLOXACINA',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-375-001',
                'name' => 'CIPROFLOXACINA AMPS 200 ML / 100 MG',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-375-002',
                'name' => 'CIPROFLOXACINA 400 MG APOLLAS',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-376-A-000',
                'name' => 'LEVOFLOXACINA  500 MG AMPOLLAS',
                'medicament_group_id' => null,
                'unit_id' => 21,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-391-000',
                'name' => 'TRIMETROPIN+SULFAMETOXAZOL AMP',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-393-001',
                'name' => 'PENICILINA CRISTALINAFCO. AMPS 1.000.000 U I',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-394-000',
                'name' => 'PENICILINA G. PROCAINA 400.000UI FCO.  AMPS',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-394-001',
                'name' => 'PENICILINA G PROCAINA 800.000UI  AMP',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-395-001',
                'name' => 'BENZETAZIL FCO. AMPOS 6-3-3 UDS',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-395-002',
                'name' => 'PENICILINA G BENZATINICA 2.400.000 UDS',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-398-001',
                'name' => 'AMPICILINA SULBACTAN AMPS 1.5 G',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-399-000',
                'name' => 'AMPICILINA AMP 1 GRAMO',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-402-002',
                'name' => 'OXACILINA SODICA 1G FCO. AMPS.',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-405-A-000',
                'name' => 'CLARITROMICINA AMP 500 MG',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-410-000',
                'name' => 'CLINDAMICINA  600MG/ 4 ML AMPS',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-410-001',
                'name' => 'CLINDAMICINA 900 MG',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-412-000',
                'name' => 'VANCOMICINA FCO. AMPS. 500 MG',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-413-000',
                'name' => 'CEFRADINA AMP 1 GRAMO',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-414-000',
                'name' => 'CEFAZOLINA AMPS. 1 G I.V',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-416-000',
                'name' => 'AMIKACINA AMP. DE 100Mg.',
                'medicament_group_id' => self::ANTIBIOTICO,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-416-001',
                'name' => 'AMIKACINA AMPS.  500 MG',
                'medicament_group_id' => self::ANTIBIOTICO,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-417-000',
                'name' => 'ACICLOVIR AMPS . 250 MG',
                'medicament_group_id' => self::ANTIBIOTICO,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-421-001',
                'name' => 'GENTAMICINA AMPS 40 MG / ML X2 ML 80 MG',
                'medicament_group_id' => self::ANTIBIOTICO,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-421-002',
                'name' => 'GENTAMICINAAMPS 160 MG/2ML   240 MG',
                'medicament_group_id' => self::ANTIBIOTICO,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-422-000',
                'name' => 'IMIPENEN AMPS 500 MG',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-428-000',
                'name' => 'CEFALOTINA AMPS 1 G',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-431-000',
                'name' => 'CEFOTAXIMA AMPS 1 G',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-432-000',
                'name' => 'CEFOPERAZONA AMPS  0,5G/1G',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-433-001',
                'name' => 'CEFTRIAZONA AMPS 1 G I.V',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-434-000',
                'name' => 'CEFTAZIDINE AMPS 1 G',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-434-A-000',
                'name' => 'CEFEPIME AMPOLLAS 1 G',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-458-000',
                'name' => 'FLUOCONAZOL 50 MG AMP',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-473-000',
                'name' => 'METRONIDAZOL AMPS 500 MG / 100ML',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-495-000',
                'name' => 'TOXOIDE TETANICO AMPS 0.5 ML',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-9-00-1',
                'name' => 'BUPIVACAINA FRASCO DE AMP. X 10 ML  0.50%',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'PS-020',
                'name' => 'AMPOLLA DE 10 MG PROPOFOL',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'PS-022',
                'name' => 'AMP X 15 ML X 50 MG  ROCURONIO-ESMERON',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'PS-049-000',
                'name' => 'AMOXICILINA + AC. CLAVULAMICO AMP',
                'medicament_group_id' => self::ANTIBIOTICO,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'PS-067-000',
                'name' => 'TRIMEBUTINA AMP. 5 ML.',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'PS-165-A',
                'name' => 'FCOS AMP MEROPENEN 1 GR',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'PS-166',
                'name' => 'FCO. 100 ML ISOFLURANO',
                'medicament_group_id' => null,
                'unit_id' => 16,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'PS-203',
                'name' => 'ETOFENAMATO AMP I.M.  1 G EN 2 ML',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'A-21',
                'name' => ' ISOTMOL ACIDO CIS-9 OCTADECENOICO',
                'medicament_group_id' => null,
                'unit_id' => 8,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'C-23',
                'name' => 'CLOROQUINA 250 MG TAB',
                'medicament_group_id' => null,
                'unit_id' => 3,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'C-31',
                'name' => 'RIVAROXABAN 10 MG TAB - XARELTO',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'C-31-1',
                'name' => 'RIVAROXABAN TAB 15 MG  X  14',
                'medicament_group_id' => null,
                'unit_id' => 21,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'C-31-2',
                'name' => 'RIVAROXABAN TAB 20 MG X 14',
                'medicament_group_id' => null,
                'unit_id' => 21,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-010-003',
                'name' => 'CLORHIDRATO DE LIDOCAINA 4 % AMPOLLAS',
                'medicament_group_id' => null,
                'unit_id' => 16,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-010-016',
                'name' => 'FRASCO SPRAY LIDOCAINA 10GR ATOMIZADOR',
                'medicament_group_id' => null,
                'unit_id' => 18,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-010-041',
                'name' => 'LIDOCAINA VISCOSA  FCO X 100 ML',
                'medicament_group_id' => null,
                'unit_id' => 19,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-010-100',
                'name' => 'TUBO  JALEA   30ML  LIDOCAINA',
                'medicament_group_id' => null,
                'unit_id' => 9,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-020-010',
                'name' => 'FCOS TAB TOPIRAMATE 25 MG X 60',
                'medicament_group_id' => null,
                'unit_id' => 21,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-020-011',
                'name' => 'TOPIRAMATE 100 MG',
                'medicament_group_id' => null,
                'unit_id' => 21,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-021-010',
                'name' => 'FRASCO TABLETAS  100 MG DIFENIL HIDANT.',
                'medicament_group_id' => null,
                'unit_id' => 21,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-021-011',
                'name' => 'LAMOTRIGINA 50 MG TABLETAS',
                'medicament_group_id' => null,
                'unit_id' => 3,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-021-012',
                'name' => 'LAMOTRIGINA 100 MG TAB',
                'medicament_group_id' => null,
                'unit_id' => 3,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-021-013',
                'name' => 'LAMOTRIGINA TAB 25 MG X 20',
                'medicament_group_id' => null,
                'unit_id' => 21,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-021-050',
                'name' => 'FRASCO SUSP 125 MG/5ML .DIFENIL HIDANT.',
                'medicament_group_id' => null,
                'unit_id' => 19,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-022-010',
                'name' => 'TABLETAS  X 30 TABL. 25 MG  CARBIDOPA',
                'medicament_group_id' => null,
                'unit_id' => 21,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-022-011',
                'name' => 'CARBIDOPA 50 MG TABLETAS',
                'medicament_group_id' => null,
                'unit_id' => 2,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-022-013',
                'name' => 'CARBIDOPA-LEVODOPA 200/50 MG RETARDADA TABETAS',
                'medicament_group_id' => null,
                'unit_id' => 3,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-023-010',
                'name' => 'TAB.260MG  X 50 TABL ACIDO VALPROICO',
                'medicament_group_id' => null,
                'unit_id' => 21,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-023-011',
                'name' => 'TAB. 500MG X 30 TABL ACIDO VALPROICO',
                'medicament_group_id' => null,
                'unit_id' => 21,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-023-030',
                'name' => ' JBE.250 MG/5 ML  ACIDO VALPROICO',
                'medicament_group_id' => null,
                'unit_id' => 10,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-023-A-010',
                'name' => 'CAPS. 300 MGX30  GABAPENTIN',
                'medicament_group_id' => null,
                'unit_id' => 21,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-023-A-011',
                'name' => 'GABAPENTIN TAB 400 MG X 20',
                'medicament_group_id' => null,
                'unit_id' => 21,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-023-A-012',
                'name' => 'GABAPENTIN TAB 600 MG X 20',
                'medicament_group_id' => null,
                'unit_id' => 21,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-023-A-013',
                'name' => 'GABAPENTINA 800 MG X30',
                'medicament_group_id' => null,
                'unit_id' => 3,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-023-B-010',
                'name' => 'PREGABALINA  CAPSULA 300  MG X  14',
                'medicament_group_id' => null,
                'unit_id' => 2,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-023-B-011',
                'name' => 'PREGABALINA TAB X75 MG X 14',
                'medicament_group_id' => null,
                'unit_id' => 2,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-024-010',
                'name' => 'OXCARBAMAZEPINA 300 MG TAB',
                'medicament_group_id' => null,
                'unit_id' => 3,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-024-011',
                'name' => 'OXCARBAMAZEPINA TAB 600 MG X 30',
                'medicament_group_id' => null,
                'unit_id' => 21,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-025-010',
                'name' => 'COMP. 200MG  X 20  CARBAMAZEPINA',
                'medicament_group_id' => null,
                'unit_id' => 21,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-026-010',
                'name' => 'TABLETAS 4MGX12  TIOCOLCHICOSIDO',
                'medicament_group_id' => null,
                'unit_id' => 21,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-027-010',
                'name' => 'TAB. 2 MGX 80 BIPERIDONOCLORHIDRATO',
                'medicament_group_id' => null,
                'unit_id' => 21,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-028-010',
                'name' => 'LEVETIRACETAM TAB 1000 MG X 30',
                'medicament_group_id' => null,
                'unit_id' => 21,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-038-010',
                'name' => 'TAB.100MG X 20 ACIDO ACETILSALICILICO',
                'medicament_group_id' => null,
                'unit_id' => 21,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-038-A-010',
                'name' => 'TAB.81 MG. LP  X 24 ACIDO ACETILSALICILICO',
                'medicament_group_id' => null,
                'unit_id' => 21,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-042-010',
                'name' => 'ACETAMINOFEN TAB 500 MG',
                'medicament_group_id' => self::ANALGESICO,
                'unit_id' => 21,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-042-020',
                'name' => 'GOTAS   100MG/ML X 15 ML  PARACETAMOL',
                'medicament_group_id' => self::ANALGESICO,
                'unit_id' => 21,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-042-030',
                'name' => 'JARABE 120MG/5ML PARACETAMOL',
                'medicament_group_id' => self::ANALGESICO,
                'unit_id' => 10,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-042-150',
                'name' => 'ACETAMINOFEN 125 MG X 6 SUPOSITORIO',
                'medicament_group_id' => self::ANALGESICO,
                'unit_id' => 20,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-043-010',
                'name' => 'ACETAMINOFEN+CLORFENIRAMIDA TABLETAS',
                'medicament_group_id' => self::ANALGESICO,
                'unit_id' => 21,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-043-030',
                'name' => 'JBE. ACETAMINOFEN+CLORFERINAMINA',
                'medicament_group_id' => self::ANALGESICO,
                'unit_id' => 10,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-046-010',
                'name' => 'GRAGEAS ASOC. X 20 BROMURO DE HIOSCINA',
                'medicament_group_id' => null,
                'unit_id' => 21,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-047-011',
                'name' => 'IBUPROFENO 400 MG',
                'medicament_group_id' => self::ANALGESICO,
                'unit_id' => 21,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-047-050',
                'name' => 'SUSPENCION 100MG/5ML IBUPROFENO',
                'medicament_group_id' => self::ANALGESICO,
                'unit_id' => 19,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-050-010',
                'name' => 'TABLETAS 50MG X 10 KETOPROFENO',
                'medicament_group_id' => null,
                'unit_id' => 21,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-050-011',
                'name' => 'KETOPROFENO TAB 100 MG X 20',
                'medicament_group_id' => null,
                'unit_id' => 21,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-050-050',
                'name' => 'KETOPROFENO JBE PED 1MG/ML',
                'medicament_group_id' => null,
                'unit_id' => 10,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-051-010',
                'name' => 'TAB. 50MG X 20 DICLOFENAC SODICO',
                'medicament_group_id' => null,
                'unit_id' => 21,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-051-011',
                'name' => 'DICLOFENAC SODICO 100MG',
                'medicament_group_id' => null,
                'unit_id' => 21,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-051-070',
                'name' => 'SOL. OFT. 5 ML. DICLOFENAC SODICO',
                'medicament_group_id' => null,
                'unit_id' => 16,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-051-071',
                'name' => 'KETOROLACO TROMETAMINA GOTAS OFTAL',
                'medicament_group_id' => null,
                'unit_id' => 8,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-051-130',
                'name' => 'DICLOFENAC SODICO 5% GEL',
                'medicament_group_id' => null,
                'unit_id' => 7,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-051-150',
                'name' => 'SUPOSITORIO PED. 12,5 MG. DICLOFENAC POTASICO',
                'medicament_group_id' => null,
                'unit_id' => 20,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-051-151',
                'name' => 'SUPOSITORIO ADULTO. 50 MG. DICLOFENAC SODICO',
                'medicament_group_id' => null,
                'unit_id' => 20,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-051-A-010',
                'name' => 'FCOS  50 MG DICLOFENAC POTASICO X20',
                'medicament_group_id' => null,
                'unit_id' => 21,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-051-A-020',
                'name' => 'DICLOFENAC POTASICO GTAS',
                'medicament_group_id' => null,
                'unit_id' => 8,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-051-A-050',
                'name' => 'FCOS 1,5% SUSP X 20 ML DICLOFENAC POTASICO',
                'medicament_group_id' => null,
                'unit_id' => 10,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-052-A-010',
                'name' => 'KETOROLAC TAB 10 MG X 20',
                'medicament_group_id' => null,
                'unit_id' => 21,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-053-010',
                'name' => 'TABLETAS  100MG   X 30 ALOPURINOL',
                'medicament_group_id' => null,
                'unit_id' => 21,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-065-A-011',
                'name' => 'SERTRALINA 100 MG X10',
                'medicament_group_id' => null,
                'unit_id' => 3,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-074-011',
                'name' => 'TABLETAS 5 MG  X30HALOPERIDOL',
                'medicament_group_id' => null,
                'unit_id' => 21,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-074-A-010',
                'name' => 'DULOXETINA 30 MG X 14 CAPSULAS',
                'medicament_group_id' => null,
                'unit_id' => 2,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-084-020',
                'name' => 'SALBUTAMOL GOTAS P/NEBULIZAR',
                'medicament_group_id' => null,
                'unit_id' => 8,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-084-060',
                'name' => 'AEROSOL X 200 DOSIS  SALBUTAMOL',
                'medicament_group_id' => null,
                'unit_id' => 18,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-087-060',
                'name' => 'BROMURO DE IPRATROPIO 0.25MG/ML',
                'medicament_group_id' => null,
                'unit_id' => 16,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-087-061',
                'name' => 'SOL. GOT. NEBUL. BROMURO DE  FENOTEROL NEB X 0,25',
                'medicament_group_id' => null,
                'unit_id' => 8,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-088-210',
                'name' => 'GOTAS NASALES  PED. OXIMETAZOLINA  0,05%',
                'medicament_group_id' => null,
                'unit_id' => 8,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-088-211',
                'name' => 'GOTAS NASALES  ADULTO OXIMETAZOLINA 0,05%',
                'medicament_group_id' => null,
                'unit_id' => 8,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-089-210',
                'name' => 'SULFATO DE KANAMICINA , MALEATO DE CLORFENIRAMINA, CLORHIDRA',
                'medicament_group_id' => self::ANTIBIOTICO,
                'unit_id' => 8,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-098-A-010',
                'name' => 'TAB. 2 MG. X 20 PRAMIVERINA',
                'medicament_group_id' => null,
                'unit_id' => 21,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-109-010',
                'name' => 'TABLETAS 30MG X 40 NIMODIPINA',
                'medicament_group_id' => null,
                'unit_id' => 21,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-114-010',
                'name' => 'TABLETAS  200MG  X 30 AMIODARONA',
                'medicament_group_id' => null,
                'unit_id' => 21,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-116-010',
                'name' => 'TABLETAS  0,25MGX 25 DIGOXINA',
                'medicament_group_id' => null,
                'unit_id' => 21,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-120-010',
                'name' => 'TABLETAS X 5 MG  SUBLIGUALES ISORBITINA',
                'medicament_group_id' => null,
                'unit_id' => 21,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-120-011',
                'name' => 'TABLETAS  10MG  ISOSORBITINA',
                'medicament_group_id' => null,
                'unit_id' => 21,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-120-013',
                'name' => 'MONONITRATO DE ISOSORBIDE TAB 20 MG X 20',
                'medicament_group_id' => null,
                'unit_id' => 3,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-121-010',
                'name' => 'CAPSULAS CRISTAL X 10 MG NIFEDIPINA',
                'medicament_group_id' => null,
                'unit_id' => 21,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-121-011',
                'name' => 'CAPSULAS LIQUI 10MG SUBLINGUAL NIFEDIPINA',
                'medicament_group_id' => null,
                'unit_id' => 21,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-121-012',
                'name' => 'TABLETAS X 20 MG NIFEDIPINA',
                'medicament_group_id' => null,
                'unit_id' => 21,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-121-013',
                'name' => 'TABLETAS A.P X 30 MG NIFEDIPINA',
                'medicament_group_id' => null,
                'unit_id' => 21,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-121-020',
                'name' => 'NIFEDIPINA   GTAS',
                'medicament_group_id' => null,
                'unit_id' => 8,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-121-A-010',
                'name' => 'TABLETAS X 5 MG X30 AMLODIPINA',
                'medicament_group_id' => null,
                'unit_id' => 21,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-121-A-011',
                'name' => 'COMPRIMIDOS X 10MG X10 AMLODIPINA',
                'medicament_group_id' => null,
                'unit_id' => 21,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-121-A-012',
                'name' => 'LECARDIPINA 20 MG X 14',
                'medicament_group_id' => null,
                'unit_id' => 3,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-122-010',
                'name' => 'TABLETAS ENALAPRIL TAB. 5 MG. X 20',
                'medicament_group_id' => null,
                'unit_id' => 21,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-122-011',
                'name' => 'TABLETAS  10MGX 20 ENALAPRIL',
                'medicament_group_id' => null,
                'unit_id' => 21,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-122-012',
                'name' => 'TABLETAS  20MGX 20 ENALAPRIL',
                'medicament_group_id' => null,
                'unit_id' => 21,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-124-011',
                'name' => 'GRAGEAS  80MG X20 VERAPAMIL',
                'medicament_group_id' => null,
                'unit_id' => 21,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-126-010',
                'name' => 'TABLETAS 400MG X20 PENTOXIFILINAX20',
                'medicament_group_id' => null,
                'unit_id' => 21,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-127-010',
                'name' => 'COMPRIMIOS 60MG X 20 DILTIAZEN',
                'medicament_group_id' => null,
                'unit_id' => 21,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-130-010',
                'name' => 'TABLETAS 10MG X 20 TABL PROPANOLOL',
                'medicament_group_id' => null,
                'unit_id' => 21,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-130-011',
                'name' => 'TABLETAS  40MGX 20  TABL PROPANOLOL',
                'medicament_group_id' => null,
                'unit_id' => 21,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-131-B-010',
                'name' => 'FRASCO TAB X 10 X 2,5  RAMIPRIL',
                'medicament_group_id' => null,
                'unit_id' => 21,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-131-B-011',
                'name' => 'FRASCO TAB X 10 X 5 MG RAMIPRIL',
                'medicament_group_id' => null,
                'unit_id' => 21,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-131-B-013',
                'name' => 'RAMIPRIL/FELODIPINA  5MG/5MG TAB 15',
                'medicament_group_id' => null,
                'unit_id' => 21,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-132-010',
                'name' => 'TABLETAS  250MG  X 30 ALFAMETILDOPA',
                'medicament_group_id' => null,
                'unit_id' => 21,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-132-A-010',
                'name' => 'LOSARTAN POTASICO 50 MG',
                'medicament_group_id' => null,
                'unit_id' => 21,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-132-A-011',
                'name' => 'LOSARTAN POTASICO  50 MG/ 12.5 MG TAB',
                'medicament_group_id' => null,
                'unit_id' => 2,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-132-A-012',
                'name' => 'LOSARTAN POTASICO 100 MG',
                'medicament_group_id' => null,
                'unit_id' => 2,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-133-010',
                'name' => 'COMPRIMIDOS  50MG  X 30  ATENOLOL',
                'medicament_group_id' => null,
                'unit_id' => 21,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-133-011',
                'name' => 'COMPRIMIDOS  100MGX 30  ATENOLOL',
                'medicament_group_id' => null,
                'unit_id' => 21,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-133-A-010',
                'name' => 'CAPS. 80 MG X  14  VALSARTAN',
                'medicament_group_id' => null,
                'unit_id' => 2,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-133-A-011',
                'name' => 'CAPS.80/12,5 MG  VALSARTAN HCT',
                'medicament_group_id' => null,
                'unit_id' => 2,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-133-A-012',
                'name' => 'VALSARTAN 320MG X 14  DIOVAN',
                'medicament_group_id' => null,
                'unit_id' => 3,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-133-A-013',
                'name' => 'VALSARTAN HCT COMP 160 MG/12.5 MG X 14',
                'medicament_group_id' => null,
                'unit_id' => 21,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-133-A-014',
                'name' => 'VALSARTAN 160MG/AMLODIPINA 5 MG',
                'medicament_group_id' => null,
                'unit_id' => 21,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-134-010',
                'name' => 'TABLETAS  25MGX 20  CAPTOPRIL',
                'medicament_group_id' => null,
                'unit_id' => 21,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-134-011',
                'name' => 'TABLETAS 50MGX 20  CAPTOPRIL',
                'medicament_group_id' => null,
                'unit_id' => 21,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-135-010',
                'name' => 'TABLETAS 0,150MG CLONIDINA',
                'medicament_group_id' => null,
                'unit_id' => 21,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-140-010',
                'name' => 'FRASCO  TAB 200 MG X60CALCIO+VIT D',
                'medicament_group_id' => null,
                'unit_id' => 21,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-142-011',
                'name' => 'FCOS  ALENDRONATO  70 MG X4',
                'medicament_group_id' => null,
                'unit_id' => 21,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-142-012',
                'name' => 'ACIDO IBANDRONICO TAB 150 MG X 1-SIMPLA',
                'medicament_group_id' => null,
                'unit_id' => 21,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-143-110',
                'name' => 'POLVO SUSP. SULFATO DE BARIO AL 100%',
                'medicament_group_id' => null,
                'unit_id' => 19,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-152-050',
                'name' => 'FLEET FOSFOSODA SOL ORAL',
                'medicament_group_id' => null,
                'unit_id' => 16,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-152-220',
                'name' => 'ENEMA   135ML BIFOSFATO DE SODIO',
                'medicament_group_id' => null,
                'unit_id' => 16,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-152-221',
                'name' => 'ENEMA FLEET PEDIATRICO 67,5 ML',
                'medicament_group_id' => null,
                'unit_id' => 16,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-164-130',
                'name' => 'SALES REHIDRAT SOBRES',
                'medicament_group_id' => null,
                'unit_id' => 17,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-182-010',
                'name' => 'TABLETAS 25MGX 20  SPIRINOLACTONA',
                'medicament_group_id' => null,
                'unit_id' => 21,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-183-010',
                'name' => 'ACETAZOLAMIDA TAB 250 MG X 20',
                'medicament_group_id' => null,
                'unit_id' => 21,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-184-010',
                'name' => 'TABLETAS  40MGX 12  FUROSEMIDA',
                'medicament_group_id' => null,
                'unit_id' => 21,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-186-010',
                'name' => 'TABLETAS 25MGX 20 HIDROCLOROTIAZIDA',
                'medicament_group_id' => null,
                'unit_id' => 21,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-187-011',
                'name' => 'TABLETAS  1,5 LP X 30 INDAPAMIDA',
                'medicament_group_id' => null,
                'unit_id' => 21,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-192-010',
                'name' => 'DIFENHIDRAMINA CLORHIDRATO 25 MG TAB',
                'medicament_group_id' => null,
                'unit_id' => 21,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-193-010',
                'name' => 'TABLETAS 10MG.10  LORATADINA',
                'medicament_group_id' => null,
                'unit_id' => 21,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-193-011',
                'name' => 'DESLORATDAINA 10 MG TAB',
                'medicament_group_id' => null,
                'unit_id' => 2,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-193-030',
                'name' => 'JARABE 5MG/5ML LORATADINA',
                'medicament_group_id' => null,
                'unit_id' => 10,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-194-010',
                'name' => 'CETIRIZINA TAB 10 MG X 10',
                'medicament_group_id' => null,
                'unit_id' => 21,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-194-020',
                'name' => 'CETIRIZINA 10 MG/ ML GTAS PED',
                'medicament_group_id' => null,
                'unit_id' => 2,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-194-030',
                'name' => 'CETIRIZINA SUSP. 5 MG/5ML.',
                'medicament_group_id' => null,
                'unit_id' => 19,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-195-030',
                'name' => 'EBASTINA 100 MG SOLUCIÓN ORAL',
                'medicament_group_id' => null,
                'unit_id' => 16,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-199-010',
                'name' => 'TABLETAS 30 MGX20   LANZOPRAZOL',
                'medicament_group_id' => null,
                'unit_id' => 21,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-199-A-010',
                'name' => 'CAPSULAS 20MGX 14  OMEPRAZOL',
                'medicament_group_id' => null,
                'unit_id' => 21,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-199-A-012',
                'name' => 'ESOMEPRAZOL 40 MG TAB X 14',
                'medicament_group_id' => null,
                'unit_id' => 2,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-200-011',
                'name' => 'MAGALDRATO - DIMETICONA TAB MASTICABLES X 24',
                'medicament_group_id' => null,
                'unit_id' => 21,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-200-050',
                'name' => 'SUSPENSION  HIDROXIDO MG+ AL X 280 ML',
                'medicament_group_id' => null,
                'unit_id' => 19,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-200-051',
                'name' => 'MAGALDRATO 800 MG/DIMETICONA 100 MG X 10 ML',
                'medicament_group_id' => null,
                'unit_id' => 7,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-200-052',
                'name' => 'MAGALDRATO-DIMETICONA GEL FRASCO',
                'medicament_group_id' => null,
                'unit_id' => 7,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-201-050',
                'name' => 'ALGINATO DE SODIO+BICARBONATO DE SODIO+CARBONATO DE CALCIO',
                'medicament_group_id' => null,
                'unit_id' => 19,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-201-051',
                'name' => 'BICARBONATO DE SODIO AL 5% SUSP/ ALGINATO DE SODIO/CARBONATO',
                'medicament_group_id' => null,
                'unit_id' => 19,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-203-010',
                'name' => 'GRAGEAS DE LA COMBINACION  ENZIMAS P.',
                'medicament_group_id' => null,
                'unit_id' => 21,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-204-011',
                'name' => 'TABLETAS  300MG.10 RANITIDINA',
                'medicament_group_id' => null,
                'unit_id' => 21,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-207-050',
                'name' => 'SUSPENSION   1G/5ML .120 MLSUCRALFATO',
                'medicament_group_id' => null,
                'unit_id' => 19,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-210-A-010',
                'name' => 'TABLETAS DE 8,6 MG X6   SENOSIDOS A Y B',
                'medicament_group_id' => null,
                'unit_id' => 21,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-214-010',
                'name' => 'CAPSULAS  0.226G X 10  LACTOBASILOS',
                'medicament_group_id' => null,
                'unit_id' => 21,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-214-011',
                'name' => 'LACTOBACILOS SOBRES',
                'medicament_group_id' => null,
                'unit_id' => 17,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-214-050',
                'name' => 'ESPORAS DE BACILLUS CLAUSII SUSP ORAL',
                'medicament_group_id' => null,
                'unit_id' => 19,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-216-020',
                'name' => 'CLENBUTEROL GOTAS PEDIATRICOS',
                'medicament_group_id' => null,
                'unit_id' => 8,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-216-030',
                'name' => 'JARABE 0,005MG/5ML PED.  CLEMBUTEROL',
                'medicament_group_id' => null,
                'unit_id' => 10,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-218-030',
                'name' => 'JARABE X 120 ML  AL 1%OXOLAMINA PED.',
                'medicament_group_id' => null,
                'unit_id' => 10,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-218-031',
                'name' => 'JARABE X 120 ML  AL 1,4% OXOLAMINA ADULTO',
                'medicament_group_id' => null,
                'unit_id' => 10,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-220-030',
                'name' => 'JARABE 4MG/5ML120 ML BROMEXINA',
                'medicament_group_id' => null,
                'unit_id' => 10,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-220-031',
                'name' => 'CARBOCISTEINA 250 MG/5ML',
                'medicament_group_id' => null,
                'unit_id' => 10,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-220-A-030',
                'name' => 'FRASCO JARABE X 15 MG  AMBROSOL',
                'medicament_group_id' => null,
                'unit_id' => 10,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-221-010',
                'name' => 'TABLETAS 10MG X 20  METOCLOPRAMIDA',
                'medicament_group_id' => null,
                'unit_id' => 21,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-221-020',
                'name' => 'GOTAS  0.02%PEDIATRICAS METOCLOPRAMIDA',
                'medicament_group_id' => null,
                'unit_id' => 8,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-222-010',
                'name' => 'TABLETAS 25MGX 50   CINNARIZINA',
                'medicament_group_id' => null,
                'unit_id' => 21,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-222-011',
                'name' => 'TABLETAS 75MG X 20  CINNARIZINA',
                'medicament_group_id' => null,
                'unit_id' => 21,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-225-010',
                'name' => 'TABLETAS 2MG X 20  LOPERAMIDA',
                'medicament_group_id' => null,
                'unit_id' => 21,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-228-010',
                'name' => 'TAB. 50MGHIERRO ELEMENTAL  SULF FERROSO',
                'medicament_group_id' => null,
                'unit_id' => 21,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-228-020',
                'name' => 'GOTAS 30 ML / 5 ML SUL FERROSO',
                'medicament_group_id' => null,
                'unit_id' => 8,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-228-030',
                'name' => 'JARABE 30 ML / 5 ML SULF FERROSO',
                'medicament_group_id' => null,
                'unit_id' => 10,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-230-010',
                'name' => 'TABLETAS 300MGX 50 FUMARATO FERROSO',
                'medicament_group_id' => null,
                'unit_id' => 21,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-234-010',
                'name' => 'TABLETAS 5MGX 20 ACIDO FOLICO',
                'medicament_group_id' => null,
                'unit_id' => 21,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-234-011',
                'name' => 'ACIDO FOLICO TAB 10MG X 20',
                'medicament_group_id' => null,
                'unit_id' => 21,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-234-020',
                'name' => 'ACIDO FOLICO 10MG/ML',
                'medicament_group_id' => null,
                'unit_id' => 8,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-235-110',
                'name' => 'POLVO PARA PREPARAR 1 LITRO COLAYTE',
                'medicament_group_id' => null,
                'unit_id' => 17,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-247-010',
                'name' => 'COMPRIMIDOS 5MG X 24 WARFARINA',
                'medicament_group_id' => null,
                'unit_id' => 21,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-247-011',
                'name' => 'WARFARINA 1 MG*30 TAB',
                'medicament_group_id' => null,
                'unit_id' => 2,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-250-090',
                'name' => 'HEPARINOIDE CREMA AL 1 % X 14 G',
                'medicament_group_id' => null,
                'unit_id' => 4,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-260-010',
                'name' => 'GRAGEAS  500 MG DIOSMINA + HISPERIDINA',
                'medicament_group_id' => null,
                'unit_id' => 21,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-260-011',
                'name' => 'DIOSMINA 600 MG  TAB -DIOVENOR',
                'medicament_group_id' => null,
                'unit_id' => 2,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-260-013',
                'name' => 'TRIOXIETILRUTINA CAP 300 MG',
                'medicament_group_id' => null,
                'unit_id' => 2,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-260-014',
                'name' => 'DOBESILATO CAP 500 MG X 30  DOXIUM',
                'medicament_group_id' => null,
                'unit_id' => 2,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-269-010',
                'name' => 'TABLETAS X 20  COMPLEJO B',
                'medicament_group_id' => null,
                'unit_id' => 21,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-269-020',
                'name' => 'GOTAS X 20 ML  COMPLEJO B',
                'medicament_group_id' => null,
                'unit_id' => 8,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-269-030',
                'name' => 'JARABE  X 120 ML      COMPLEJO B',
                'medicament_group_id' => null,
                'unit_id' => 10,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-274-010',
                'name' => 'TABLETAS  500 MGX10  VITAMINA C',
                'medicament_group_id' => null,
                'unit_id' => 21,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-274-020',
                'name' => 'FCOS GOTAS 100MG VITAMINA C',
                'medicament_group_id' => null,
                'unit_id' => 8,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-276-011',
                'name' => 'ACEITE DE PESCADO 1000 MG X 60',
                'medicament_group_id' => null,
                'unit_id' => 2,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-281-010',
                'name' => 'TABLETAS X 20 VITAMINAS + MINERALES',
                'medicament_group_id' => null,
                'unit_id' => 21,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-281-011',
                'name' => 'SELENIO, VITAMINA C, E, BETACAROTENO, ZINC',
                'medicament_group_id' => null,
                'unit_id' => 2,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-281-030',
                'name' => 'JARABE  VITAMINAS + MINERALES',
                'medicament_group_id' => null,
                'unit_id' => 10,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-284-011',
                'name' => 'CAPSULAS  400 UDS  VITAMINA E',
                'medicament_group_id' => null,
                'unit_id' => 21,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-285-020',
                'name' => 'VITAMINA D3 X 15 ML',
                'medicament_group_id' => null,
                'unit_id' => 8,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-290-011',
                'name' => 'SIMBASTATINA COMPR. 20MG',
                'medicament_group_id' => null,
                'unit_id' => 21,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-290-012',
                'name' => 'SIMVASTATINA TAB 40 MG X 10',
                'medicament_group_id' => null,
                'unit_id' => 21,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-291-010',
                'name' => 'COMPRIMIDOS   10 MG  ATORVASTATINA',
                'medicament_group_id' => null,
                'unit_id' => 21,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-291-011',
                'name' => 'COMPRIMIDOS  20 MG  ATORVASTATINA',
                'medicament_group_id' => null,
                'unit_id' => 21,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-291-012',
                'name' => 'ATORVASTATINA TAB 40 MG X 14',
                'medicament_group_id' => null,
                'unit_id' => 21,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-293-010',
                'name' => 'COMPRIMIDO X  GEMFIBROZIL TABL X 300 MG',
                'medicament_group_id' => null,
                'unit_id' => 21,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-308-010',
                'name' => 'DIENOGEST/ETINILESTRADIOL TAB X 21',
                'medicament_group_id' => null,
                'unit_id' => 21,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-317-010',
                'name' => 'PROGESTERONA TAB 200 MG X 15',
                'medicament_group_id' => null,
                'unit_id' => 21,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-326-010',
                'name' => 'TABLETAS  0,5MGX 50   LEVOTIROXINA SODICA',
                'medicament_group_id' => null,
                'unit_id' => 21,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-326-011',
                'name' => 'FCOS  LEVOTIROXINA 0,1 MG TAB',
                'medicament_group_id' => null,
                'unit_id' => 21,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-326-012',
                'name' => 'LEVOTIROXINA TAB 25 MG',
                'medicament_group_id' => null,
                'unit_id' => 21,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-330-005',
                'name' => 'INSULIN A  APIDRA',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-338-010',
                'name' => 'COMPRIMIDOS 5MGX 28  GLIBENCLAMIDA',
                'medicament_group_id' => null,
                'unit_id' => 21,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-340-010',
                'name' => 'TABLETAS  30MGX20 GLICLAZIDA MR',
                'medicament_group_id' => null,
                'unit_id' => 21,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-340-011',
                'name' => 'GLICAZIDA TAB 60MG X 15',
                'medicament_group_id' => null,
                'unit_id' => 21,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-340-012',
                'name' => 'GLICLAZIDA   60 MG MR TAB  DIAMICRON',
                'medicament_group_id' => null,
                'unit_id' => 3,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-340-013',
                'name' => 'SITAGLIPTINA 50 MG-JANUVIA',
                'medicament_group_id' => null,
                'unit_id' => 2,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-340-014',
                'name' => 'GLICLAZIDA 80 MG TABLETAS',
                'medicament_group_id' => null,
                'unit_id' => 3,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-341-010',
                'name' => 'TABLETAS  2 MGX15  GLIMEPIRIDA',
                'medicament_group_id' => null,
                'unit_id' => 21,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-341-011',
                'name' => 'TABLETAS4 MGX15 GLIMEPIRIDA',
                'medicament_group_id' => null,
                'unit_id' => 21,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-342-010',
                'name' => 'TABLETAS 500 MGX30  METFORMIN',
                'medicament_group_id' => null,
                'unit_id' => 21,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-342-011',
                'name' => 'METFORMIN  XR 500 MG X 30',
                'medicament_group_id' => null,
                'unit_id' => 2,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-342-012',
                'name' => 'METFORMINA TAB 850 MG X 30',
                'medicament_group_id' => null,
                'unit_id' => 21,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-342-013',
                'name' => 'METFORMINA  500 MG + GLIBENCLAMIDA TAB X 30',
                'medicament_group_id' => null,
                'unit_id' => 21,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-342-014',
                'name' => 'SITAGLIPTINA/METFORMINA 50/850 MG TBA X28',
                'medicament_group_id' => null,
                'unit_id' => 3,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-342-015',
                'name' => 'METFORMINA TAB 1 GRAMO',
                'medicament_group_id' => null,
                'unit_id' => 2,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-342-016',
                'name' => 'METFORMINA LP 750 MG * 30 TAB',
                'medicament_group_id' => null,
                'unit_id' => 2,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-350-010',
                'name' => 'TABLETAS DEFLAZACORT COMP 6 MG',
                'medicament_group_id' => null,
                'unit_id' => 3,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-350-021',
                'name' => 'PREDNISOLONA DE ESTEAROILGLICOLATO GOTAS ORALES',
                'medicament_group_id' => null,
                'unit_id' => 8,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-350-090',
                'name' => 'METILPREDNISOLONA CREMA 0.1% X 15 G',
                'medicament_group_id' => null,
                'unit_id' => 4,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-352-A-060',
                'name' => 'FUORATO DE MOMETASONA 50 MCG/DOSIS  SPRAY',
                'medicament_group_id' => null,
                'unit_id' => 18,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-354-010',
                'name' => 'TABLETAS  500MGX 12 BETAMETASONA',
                'medicament_group_id' => null,
                'unit_id' => 21,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-354-030',
                'name' => 'BETAMETAONA 0.6MG/5ML FCO JBE',
                'medicament_group_id' => null,
                'unit_id' => 10,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-354-090',
                'name' => 'CREMA  0.01%BETAMETASONA',
                'medicament_group_id' => null,
                'unit_id' => 4,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-354-091',
                'name' => 'BETAMETASONA+GENTAMICINA+CLOTRIMAZOL CREMA',
                'medicament_group_id' => null,
                'unit_id' => 4,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-355-010',
                'name' => 'DEXAMETASONA 0.75 MG TAB',
                'medicament_group_id' => null,
                'unit_id' => 21,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-355-070',
                'name' => 'SOL. OFTALMICA  DEXAMETASONA 0.1%AL',
                'medicament_group_id' => null,
                'unit_id' => 8,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-356-090',
                'name' => 'TERBINAFINA CREMA AL 1%',
                'medicament_group_id' => null,
                'unit_id' => 4,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-356-130',
                'name' => 'TERBINAFINA LOCIÓN AL 1%',
                'medicament_group_id' => null,
                'unit_id' => 12,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-358-080',
                'name' => 'UNGUENTO X 10 G ASOCIACION',
                'medicament_group_id' => null,
                'unit_id' => 22,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-358-150',
                'name' => 'SUPOSITORIO X 6 ASOCIACION',
                'medicament_group_id' => null,
                'unit_id' => 20,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-364-133',
                'name' => 'GALONES . 4  DE AGUA OXIGENADA',
                'medicament_group_id' => null,
                'unit_id' => 16,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-372-130',
                'name' => 'SOLUCION ACUOSA AL 1% YODOPOVIDONA',
                'medicament_group_id' => null,
                'unit_id' => 16,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-372-131',
                'name' => 'SOLUCION  GALONES . 4 LTS BETADINE',
                'medicament_group_id' => null,
                'unit_id' => 16,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-372-140',
                'name' => 'SOL. JABONOSA  . 120 ML YODOPOVIDONA',
                'medicament_group_id' => null,
                'unit_id' => 16,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-375-011',
                'name' => 'TABLETAS  500MGX 10  CIPROFLOXACINA',
                'medicament_group_id' => null,
                'unit_id' => 21,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-375-070',
                'name' => 'CIPROFLOXACINA SOL. 0.3% 5 ML',
                'medicament_group_id' => null,
                'unit_id' => 16,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-375-071',
                'name' => 'CIPROFLOXACINA  0.3%-DEXAMETASONA 0.1%',
                'medicament_group_id' => null,
                'unit_id' => 8,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-376-A-010',
                'name' => 'TABLETAS   500 MG X 5 LEVOFLOXACINA',
                'medicament_group_id' => null,
                'unit_id' => 21,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-377-080',
                'name' => 'POMADA DERM. 30G  APOSITO SOLUB.NITROFURAZONA',
                'medicament_group_id' => null,
                'unit_id' => 22,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-377-081',
                'name' => 'POM.  DERO    454G APOSITO SOLUB NITROFURAZONA.',
                'medicament_group_id' => null,
                'unit_id' => 22,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-391-010',
                'name' => 'TAB.  80/400MG SULFAMETOXAZOL+TRIMETR',
                'medicament_group_id' => null,
                'unit_id' => 21,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-391-050',
                'name' => 'SULFAMETOXAZOL+TRIMETROP SUSP. 200MG',
                'medicament_group_id' => null,
                'unit_id' => 19,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-398-010',
                'name' => 'AMPICILINA SULBACTAN 375MG TABLETAS  X 10',
                'medicament_group_id' => null,
                'unit_id' => 21,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-398-011',
                'name' => 'AMPICILINA + SULBACTAN 750 MG',
                'medicament_group_id' => null,
                'unit_id' => 21,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-398-050',
                'name' => 'AMPICILINA SULBACTAN SUSP 250 MG/60 ML',
                'medicament_group_id' => null,
                'unit_id' => 19,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-399-011',
                'name' => 'AMPICILINA 500MG CAPSULAS  X 8',
                'medicament_group_id' => null,
                'unit_id' => 21,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-399-050',
                'name' => 'SUSPENCION 250MG  AMPICILINA',
                'medicament_group_id' => null,
                'unit_id' => 19,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-399-051',
                'name' => 'AMPICILINA SUSP 125 MG',
                'medicament_group_id' => null,
                'unit_id' => 19,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-402-010',
                'name' => 'CAPSULAS 250X 12 OXACILINA  SODICA',
                'medicament_group_id' => null,
                'unit_id' => 21,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-404-011',
                'name' => 'AMOXICILINA 500MG CAPSULA',
                'medicament_group_id' => self::ANTIBIOTICO,
                'unit_id' => 21,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-404-050',
                'name' => 'AMOXICILINA 250MG/5ML SUSPENCION',
                'medicament_group_id' => self::ANTIBIOTICO,
                'unit_id' => 19,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-404-051',
                'name' => 'AMOXICILINA SUSP 400MG/5ML',
                'medicament_group_id' => self::ANTIBIOTICO,
                'unit_id' => 19,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-404-052',
                'name' => 'AMOXICILINA AMP 125 MG',
                'medicament_group_id' => self::ANTIBIOTICO,
                'unit_id' => 19,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-404-053',
                'name' => 'AMOXICILINA POLVO GRANILADO 0.25 G',
                'medicament_group_id' => self::ANTIBIOTICO,
                'unit_id' => 15,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-404-A-000',
                'name' => 'AZITROMICINA AMP 500 MG',
                'medicament_group_id' => self::ANTIBIOTICO,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-404-A-010',
                'name' => 'AZITROMICINA 500 MG TABLETAS',
                'medicament_group_id' => self::ANTIBIOTICO,
                'unit_id' => 21,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-404-A-050',
                'name' => 'AZITROMICINA 200MG SUSPENSION',
                'medicament_group_id' => self::ANTIBIOTICO,
                'unit_id' => 19,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-405-A-011',
                'name' => 'CLARITROMICINA 500 MG TABLETAS X 10',
                'medicament_group_id' => null,
                'unit_id' => 21,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-405-A-051',
                'name' => 'CLARITROMICINA  SUSP 250MG/5 ML',
                'medicament_group_id' => null,
                'unit_id' => 19,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-406-050',
                'name' => 'CEFTIBUTEN 180MG/5ML',
                'medicament_group_id' => null,
                'unit_id' => 19,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-406-090',
                'name' => 'CLORANFENICOL AL 3 % POMADA',
                'medicament_group_id' => null,
                'unit_id' => 4,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-407-070',
                'name' => 'GOTAS OFTALMICAS TOBRAMICINA+DEXAMETA',
                'medicament_group_id' => self::ANTIBIOTICO,
                'unit_id' => 8,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-407-071',
                'name' => 'FCOS TOBRAMICINA  GTAS OT',
                'medicament_group_id' => self::ANTIBIOTICO,
                'unit_id' => 8,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-407-100',
                'name' => 'TOBRAMICINA -GEL OFTALMICO',
                'medicament_group_id' => self::ANTIBIOTICO,
                'unit_id' => 9,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-407-190',
                'name' => 'UNG OFTALMICO TOBRAMICINA/ DEXAMETASONA',
                'medicament_group_id' => self::ANTIBIOTICO,
                'unit_id' => 22,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-407-191',
                'name' => ' TOBRAMICINA UNG / GEL',
                'medicament_group_id' => self::ANTIBIOTICO,
                'unit_id' => 22,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-409-050',
                'name' => 'CEFIXIMA 100MG/5ML',
                'medicament_group_id' => self::ANTIBIOTICO,
                'unit_id' => 19,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-410-010',
                'name' => 'CAPSULAS   150MGX 12 CLINDAMICINA',
                'medicament_group_id' => self::ANTIBIOTICO,
                'unit_id' => 21,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-415-050',
                'name' => 'SUSPENCION 125MG /5 ML ERITROMICINA',
                'medicament_group_id' => self::ANTIBIOTICO,
                'unit_id' => 19,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-417-010',
                'name' => 'TABLETAS 200MGX 25  ACICLOVIR',
                'medicament_group_id' => self::ANTIBIOTICO,
                'unit_id' => 21,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-417-011',
                'name' => 'ACICLOVIR COMP 400 MG',
                'medicament_group_id' => self::ANTIBIOTICO,
                'unit_id' => 3,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-417-090',
                'name' => 'CREMA 5% DE 15 GR ACICLOVIR',
                'medicament_group_id' => self::ANTIBIOTICO,
                'unit_id' => 4,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-418-080',
                'name' => 'UNGUENTO DERMICO BACITRACINA 500UI',
                'medicament_group_id' => null,
                'unit_id' => 22,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-418-081',
                'name' => 'MUPIROCIN 2% CREMA',
                'medicament_group_id' => null,
                'unit_id' => 4,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-421-070',
                'name' => 'GENTAMICINA SOLUCIÓN OFTALMICA 3MG/5ML',
                'medicament_group_id' => null,
                'unit_id' => 16,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-421-090',
                'name' => 'CREMA AL 1% X 15G GENTAMICINA',
                'medicament_group_id' => self::ANTIBIOTICO,
                'unit_id' => 4,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-427-011',
                'name' => 'CAPSULAS  500MGX12CEFALEXINA',
                'medicament_group_id' => self::ANTIBIOTICO,
                'unit_id' => 21,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-427-050',
                'name' => 'SUSPENCION  250MG CEFALEXINA',
                'medicament_group_id' => self::ANTIBIOTICO,
                'unit_id' => 19,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-429-010',
                'name' => 'TABLETAS X 500 MG X 12  CEFADROXILO',
                'medicament_group_id' => null,
                'unit_id' => 21,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-429-050',
                'name' => 'SUSPENCION 250MG X 60 ML  CEFADROXILO',
                'medicament_group_id' => null,
                'unit_id' => 19,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-435-070',
                'name' => 'GOTAS X 5ML AL 2% CLORANF+PREDNISOL',
                'medicament_group_id' => null,
                'unit_id' => 8,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-444-210',
                'name' => 'SOLUCION OTICA ASOCIACION',
                'medicament_group_id' => null,
                'unit_id' => 16,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-444-211',
                'name' => 'TIROTRICINA+ANTIPIRINA 0.10/4MG X 7,5 ML',
                'medicament_group_id' => null,
                'unit_id' => 8,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-456-090',
                'name' => 'CREMA AL 1% CLOTRIMAZOL',
                'medicament_group_id' => null,
                'unit_id' => 4,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-456-091',
                'name' => 'CLOTRIMAZOL CREMA VAGINAL 2%',
                'medicament_group_id' => null,
                'unit_id' => 4,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-456-170',
                'name' => 'TABLETAS VAGINAL 100MG X 6 CLOTRIMAZOL',
                'medicament_group_id' => null,
                'unit_id' => 21,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-456-171',
                'name' => 'CLOTRIMAZOL COMP VAGINAL500 MG CREMA VAGINAL 2%',
                'medicament_group_id' => null,
                'unit_id' => 21,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-456-172',
                'name' => 'CLOTRIMAZOL 3 COMP. VAGINAL 200 MG',
                'medicament_group_id' => null,
                'unit_id' => 3,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-457-010',
                'name' => 'TABLETAS 250MGX 10 KETOCONAZOL',
                'medicament_group_id' => null,
                'unit_id' => 21,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-457-090',
                'name' => 'CREMA  X15 GR KETOCONAZOL',
                'medicament_group_id' => null,
                'unit_id' => 4,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-457-170',
                'name' => 'OVULOS X 3  KETOCONAZOL',
                'medicament_group_id' => null,
                'unit_id' => 13,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-458-011',
                'name' => 'TABLETAS 150MG FLUOCONAZOL',
                'medicament_group_id' => null,
                'unit_id' => 21,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-459-090',
                'name' => 'DESONIDA 0.1%+ CLIOQUINOL 3%',
                'medicament_group_id' => null,
                'unit_id' => 4,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-473-010',
                'name' => 'TABLETAS 500MG X 10 METRONIDAZOL',
                'medicament_group_id' => null,
                'unit_id' => 21,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-473-051',
                'name' => 'SUSPENCION 250 MG / 5 ML METRONIDAZOL',
                'medicament_group_id' => null,
                'unit_id' => 19,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-473-170',
                'name' => 'TABLETAS VAGINAL 500MGX 10 METRONIDAZOL',
                'medicament_group_id' => null,
                'unit_id' => 21,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-474-010',
                'name' => 'TAB. DE 500 MG.4 TABL. DE SEGNIDAZOL',
                'medicament_group_id' => null,
                'unit_id' => 21,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-475-050',
                'name' => 'SUSPENCION 200MG X 15 ML TINIDAZOL',
                'medicament_group_id' => null,
                'unit_id' => 16,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-481-010',
                'name' => 'COMPRIMIDO 100MG X 6 MEBENDAZOL',
                'medicament_group_id' => null,
                'unit_id' => 21,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-483-010',
                'name' => 'TABLETAS 200MG X 2  ALBENDAZOL',
                'medicament_group_id' => null,
                'unit_id' => 21,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-483-050',
                'name' => 'SUSPENSION  400MG /20MLALBENDAZOL',
                'medicament_group_id' => null,
                'unit_id' => 19,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-508-070',
                'name' => 'COLIRIO  OFT.AL 2% PILOCARPINA',
                'medicament_group_id' => null,
                'unit_id' => 8,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-509-070',
                'name' => 'TIMOFTOL GOTAS OFTAL 0.25%',
                'medicament_group_id' => null,
                'unit_id' => 8,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-509-071',
                'name' => 'COLIRIO  OFT.AL 0.50% TIMOFTOL',
                'medicament_group_id' => null,
                'unit_id' => 8,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-513-070',
                'name' => 'TROPICAMIDA AL 1% GTAS OFATLMICA',
                'medicament_group_id' => null,
                'unit_id' => 8,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-513-071',
                'name' => 'TROPICAMIDA 0.50%+FENILEFRINA 5% GTAS OFATL',
                'medicament_group_id' => null,
                'unit_id' => 8,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-515-070',
                'name' => 'COLIRIO OFT.0.1% TETRACAINA',
                'medicament_group_id' => null,
                'unit_id' => 8,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-515-071',
                'name' => 'PROPARACAINA  5 MG GTAS OFTALMICAS',
                'medicament_group_id' => null,
                'unit_id' => 8,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-516-070',
                'name' => 'CLORHIDRATO DE CICLOPENTOLATO 10MG/ML',
                'medicament_group_id' => null,
                'unit_id' => 8,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-517-070',
                'name' => 'HIDROXIPROPILMETILCELULOSA  AL 0.3% SOL OFTAL',
                'medicament_group_id' => null,
                'unit_id' => 8,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-517-190',
                'name' => 'HIDROXIPROPILMETILCELULOSA  GEL OFTALMICO',
                'medicament_group_id' => null,
                'unit_id' => 19,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-520-070',
                'name' => ' GOTAS OFT.LAGRIMAS ARTIFICIALES FCOS X5 ML',
                'medicament_group_id' => null,
                'unit_id' => 8,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-521-070',
                'name' => 'FUMARATO KETOTIFENO 0.25MG/ML  ZADITEN',
                'medicament_group_id' => null,
                'unit_id' => 16,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-525-090',
                'name' => 'CREMA DERM.X 30 G SULFADIAZINA DE PLATA',
                'medicament_group_id' => null,
                'unit_id' => 12,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-525-091',
                'name' => 'CREMA TARRO DE 175 GR SULFADIAZINA PLATA',
                'medicament_group_id' => null,
                'unit_id' => 9,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-527-130',
                'name' => 'FCO. FRICCION X 120 ML',
                'medicament_group_id' => null,
                'unit_id' => 6,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-528-010',
                'name' => ' CENTELLA ASIATICA TAB 300 MG X 90',
                'medicament_group_id' => null,
                'unit_id' => 21,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'PS-032',
                'name' => 'SEVOFLURANO FRASCO PEN  X 250 ML',
                'medicament_group_id' => null,
                'unit_id' => 11,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'PS-133-014',
                'name' => 'CARVEDILOL  TAB 25 MG',
                'medicament_group_id' => null,
                'unit_id' => 21,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'PS-193-A-010',
                'name' => 'DESLORATADINA TAB 5 MG X 10',
                'medicament_group_id' => null,
                'unit_id' => 3,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'PS-194-A-020',
                'name' => 'LEVOCETIRIZINA 5MG/ML GOTAS 15ML',
                'medicament_group_id' => null,
                'unit_id' => 8,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'PS-200-1',
                'name' => 'COLCHICINA 0.5 MG TAB',
                'medicament_group_id' => null,
                'unit_id' => 3,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'PS-205-060',
                'name' => 'BUDESONIDA  50 MCG  PED SOL INH',
                'medicament_group_id' => null,
                'unit_id' => 11,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'PS-205-061',
                'name' => 'BUDESONIDA 200 MCG  ADULTO SOL INH',
                'medicament_group_id' => null,
                'unit_id' => 11,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'PS-223',
                'name' => 'DUCHA  VAGINAL',
                'medicament_group_id' => null,
                'unit_id' => 12,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'PS-291-010',
                'name' => 'ROSUVASTATINA 10MG TAB',
                'medicament_group_id' => null,
                'unit_id' => 3,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-018-001',
                'name' => 'AMPOLLA 200mg/1ML FENOBARBITAL',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-018-012',
                'name' => 'COMPRIMIDOS 100MGX30 FENOBARBITAL',
                'medicament_group_id' => null,
                'unit_id' => 21,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-025-A-010',
                'name' => 'TAB. DE 0,5MGX30  CLONAZEPAN',
                'medicament_group_id' => self::PSICOTROPICO,
                'unit_id' => 21,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-025-A-011',
                'name' => 'TAB. DE 2MGX30  CLONAZEPAN',
                'medicament_group_id' => self::PSICOTROPICO,
                'unit_id' => 21,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-038-000',
                'name' => 'TRAMADOL AMP 100MG/2 ML IV',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-062-010',
                'name' => 'TABLETAS 3 MG X30 BROMAZEPAN',
                'medicament_group_id' => self::PSICOTROPICO,
                'unit_id' => 21,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-062-011',
                'name' => 'TABLETAS BROMAZEPAN TAB. 6 MG.',
                'medicament_group_id' => self::PSICOTROPICO,
                'unit_id' => 21,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-064-A-010',
                'name' => 'TABLETAS X 10 X 75 MG VENLAFLAXINA',
                'medicament_group_id' => null,
                'unit_id' => 21,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-065-A-010',
                'name' => 'TABLETAS  X 50 MG X 10 SERTRALINA',
                'medicament_group_id' => self::PSICOTROPICO,
                'unit_id' => 21,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-066-A-010',
                'name' => 'COMPRIMIDOS 20MG X 10 FLOUXETINA',
                'medicament_group_id' => null,
                'unit_id' => 21,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-069-010',
                'name' => 'TABLETAS 25 MG X20 LEVOPROMAZINA',
                'medicament_group_id' => null,
                'unit_id' => 21,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-073-A-010',
                'name' => 'OLANZAPINA  TAB 5 MG. X 14',
                'medicament_group_id' => null,
                'unit_id' => 21,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-073-A-011',
                'name' => 'OLANZAPINA 10MG X 14',
                'medicament_group_id' => null,
                'unit_id' => 21,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-074-000',
                'name' => 'HALOPERIDOL AMPOLLAS 5MG/ML',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-076-000',
                'name' => 'DIAZEPAN AMPOLLAS DE 10 MG/2ML',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-076-010',
                'name' => 'TABLETAS 5 MGX30 DIAZEPAN',
                'medicament_group_id' => self::PSICOTROPICO,
                'unit_id' => 21,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-076-A-000',
                'name' => 'MIDAZOLAN AMPOLLA DE 5MG/3 ML',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-076-A-001',
                'name' => 'MIDAZOLAN  15 MG AMPOLLAS',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-076-A-010',
                'name' => 'TABLETAS 7,5 MG MIDAZOLAN',
                'medicament_group_id' => null,
                'unit_id' => 21,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-078-A-010',
                'name' => 'ALPRAZOLAN TAB 0.5 MG X 30',
                'medicament_group_id' => null,
                'unit_id' => 21,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-078-A-011',
                'name' => 'TABLETAS 1 MGX30 ALPRAZOLAN',
                'medicament_group_id' => null,
                'unit_id' => 21,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'PS-169',
                'name' => 'QUETIAPINA  TAB 25 MG',
                'medicament_group_id' => null,
                'unit_id' => 3,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-033-000',
                'name' => 'FENTANYL AMPOLLAS 50 MG X2 ML',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-033-001',
                'name' => 'FENTANYL AMPOLLAS 50 MG X10 ML',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-033-002',
                'name' => 'FENTANILO CITRATO 250 MCG/5ML',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-034-000',
                'name' => 'REMIFENTANIL 2 MG AMP.',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-034-001',
                'name' => 'REMIFENTANIL AMP 5 MG',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-035-000',
                'name' => 'CLORHIDRATO MORFINA AMPOLLAS 10 MG/ML',
                'medicament_group_id' => self::PSICOTROPICO,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-037-000',
                'name' => 'AMP. 100 MG/2ML MEPERIDINA CLORHIDRATO',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'A-10',
                'name' => 'APREPITANT CAPS. 125 MG,  80 MG-EMEND',
                'medicament_group_id' => null,
                'unit_id' => 2,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'A-11',
                'name' => 'ADALIMUMAB 40MG/0.8 ML (HUMIRA',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'A-12',
                'name' => 'ANAGRELIDE 0,5 MG X 100',
                'medicament_group_id' => null,
                'unit_id' => 21,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'A-13',
                'name' => 'ACIDO IBANDRONICO(BONDRONAT)',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'A-14',
                'name' => 'AZACITIDINA  100 MG AMP',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'A-15',
                'name' => 'ABATACEPT AMP 250 MG/VIAL',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'A-16-1',
                'name' => 'ACIDO URSODESOXICOLICO 300 MG TAB -URSOBILANE',
                'medicament_group_id' => null,
                'unit_id' => 2,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'A-3',
                'name' => 'ACIDO TRANSRETINOICO AMP 10 MG-VESANOID',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'A-4',
                'name' => ' ACIDO ZOLEDRONICO AMP  4 MG-ZOMETA',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'A-5',
                'name' => 'ACIDO ZOLEDRONICO AMP 5 MG',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'A-6',
                'name' => 'AMIFOSTINA X 500 MG AMP-ETHYOL',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'A-7',
                'name' => 'ACTINOMICINA D 0.5 MG AMP',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'A-8',
                'name' => 'ANASTROZOL  TAB 1 MG-TROZOLET-ARIMIDEX',
                'medicament_group_id' => null,
                'unit_id' => 21,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'A-9',
                'name' => 'ASPIRAGINASA  10.000  UDI  AMPOLLAS',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'A-9-1',
                'name' => 'ASPARGINASA PEGILADA 3,750 U.I. AMP',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'A-9-2',
                'name' => 'ASPARGINASA 10000 M.U.I ERWINASE',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'B-2',
                'name' => ' BICALUTAMIDA  TAB 50 MG X 14-CALUTOL',
                'medicament_group_id' => null,
                'unit_id' => 21,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'B-2-1',
                'name' => ' BICALUTAMIDA TAB. 150 MG-CALUTOL',
                'medicament_group_id' => null,
                'unit_id' => 21,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'B-3',
                'name' => 'BLEOMICINA 15MG',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'B-4',
                'name' => 'BORTEZOMIB AMP 3.5 MG-VELCADE',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'B-6',
                'name' => 'BEVACIZUMAV 400 MG/16ML  AMP-AVASTIN',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'B-7',
                'name' => 'BEXAROTENO 60 MG GEL',
                'medicament_group_id' => null,
                'unit_id' => 7,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'B-7-1',
                'name' => 'BEXAROTENO  75 MG CAPSULA',
                'medicament_group_id' => null,
                'unit_id' => 3,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'C-12',
                'name' => ' CICLOSPORINA CAP 25 MG-SANDIMUN',
                'medicament_group_id' => null,
                'unit_id' => 21,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'C-13',
                'name' => 'CICLOSPORINA CAPS DE 50 MG X 50-SANDIMUN',
                'medicament_group_id' => null,
                'unit_id' => 21,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'C-14',
                'name' => 'CICLOSPORINA CAP DE 100 MG X 50-SANDIMUN',
                'medicament_group_id' => null,
                'unit_id' => 21,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'C-14-1',
                'name' => 'CICLOSPORINA SOL BEBIBLE 100 MG/ML',
                'medicament_group_id' => null,
                'unit_id' => 16,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'C-14-2',
                'name' => 'CICLOSPORINA AMPOLLAS X50 MG',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'C-16',
                'name' => 'CIS-PLATINO 10MG AMP-PLATINOL',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'C-18',
                'name' => 'CISPLATINO AMP 50MG-PLATINOL',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'C-19',
                'name' => 'CARMUSTINE AMP 100 MG',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'C-2',
                'name' => ' CAPECITABINE 500 MG X 120 TAB(XELODA)',
                'medicament_group_id' => null,
                'unit_id' => 21,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'C-20',
                'name' => 'CITOSINA ARABINOSA AMP 100 MG',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'C-21',
                'name' => 'CITOSINA ARABINOSA 500 MG X VIAL-ARAC',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'C-22',
                'name' => 'CITOSINA ARABINOSA 1G AMP-ARAC',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'C-3',
                'name' => 'CARBOPLATINO AMP 50 MG',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'C-4',
                'name' => 'CARBOPLATINO AMP 150 MG',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'C-5',
                'name' => 'CARBOPLATINO 450 MG',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'C-51',
                'name' => 'CETUXIMAB 100 MG AMP-ERBITUX',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'C-7',
                'name' => 'CICLOFOSFAMIDA 200MG-ENDOXAN',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'C-8',
                'name' => 'CYCLOPHOSPHAMIDE  FCO. 500 MG HALOXAN',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'C-9',
                'name' => 'CICLOSFOSMAMIDA 1 G AMP-ENDOXAN',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'D-1',
                'name' => 'DACARBAZINA 100 MG AMP-DETICENE',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'D-11',
                'name' => 'DASATINIB  20 MG X 60 COMP',
                'medicament_group_id' => null,
                'unit_id' => 3,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'D-11-1',
                'name' => 'DASATINIB TAB 50 MG X 60',
                'medicament_group_id' => null,
                'unit_id' => 3,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'D-12',
                'name' => 'DASATINIB CAP 70 MG X 60',
                'medicament_group_id' => null,
                'unit_id' => 2,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'D-14',
                'name' => 'DEXRAZOXANE AMP. 500 MG-CARDIOXANE',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'D-16',
                'name' => 'DOCETAXEL 20MG AMP-TAXOTERE',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'D-17',
                'name' => 'DOCETAXEL 80 MG AMP',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'D-2',
                'name' => 'DACARBAZINA 200 MG AMP-DETICENE',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'D-20',
                'name' => 'DOXORUBICINA  AMP 10 MG-ADRIAMICINA',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'D-21',
                'name' => 'DOXORUBICINA LIPOSOMAL 20 MG AMP-KAELY',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'D-22',
                'name' => 'DOXORRUBICINA AMP 50 MG-ADRIAMICINA',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'D-3',
                'name' => 'DECITABINA  50 MFG AMP',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'D-5',
                'name' => 'DEFERASIROX TAB 500 MG X 28 (EXJADE)',
                'medicament_group_id' => null,
                'unit_id' => 21,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'D-6',
                'name' => 'DANAZOL CÁPSULAS 200 MG 100',
                'medicament_group_id' => null,
                'unit_id' => 2,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'D-7',
                'name' => 'DAUNORUBICINA 20 MG AMP',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'E-10',
                'name' => 'EVEROLIMUS 0.75 MG CERTICAN',
                'medicament_group_id' => null,
                'unit_id' => 21,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'E-10-1',
                'name' => 'EVEROLUMUS TAB. 0,5 MG  X 60-CERTICAN',
                'medicament_group_id' => null,
                'unit_id' => 21,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'E-10-2',
                'name' => 'EVEROLIMUS TAB 10 MG',
                'medicament_group_id' => null,
                'unit_id' => 3,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'E-11',
                'name' => 'ERLOTINIB  TAB 150 MG-TARCEVA',
                'medicament_group_id' => null,
                'unit_id' => 21,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'E-12',
                'name' => 'EXEMESTANO TAB 25 MG X 15-AROMASIN',
                'medicament_group_id' => null,
                'unit_id' => 21,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'E-13',
                'name' => 'ETONOGESTREL  AMP 68 MG',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'E-13-1',
                'name' => 'LEVONORGESTREL  52 MG',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'E-2',
                'name' => 'EPIRUBICINA  AMP 50 MG',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'E-4',
                'name' => 'ERITROPOYECTINA  AMP. 4000 UDS',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'E-5',
                'name' => 'ERITROPOYECTINA 10.00 U.I.',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'E-6',
                'name' => 'ERITROPROYECTINA 30.000 UND',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'E-7',
                'name' => 'ERITROPOYECTINA  40.000 U.I-EPREX',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'E-9',
                'name' => 'ETOPOSIDO 100 MG  AMP',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'F-2',
                'name' => 'FLUDARABINA  50 MG  AMPOLLAS',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'F-4',
                'name' => '5 FLUORACILO AMP. 500 MG.',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'F-4-1',
                'name' => '5-FLUORACILO AMP 250 MG',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'F-5',
                'name' => 'FLUTAMIDA TAB 250 MG-ETACONIL',
                'medicament_group_id' => null,
                'unit_id' => 21,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'F-6',
                'name' => 'FOLINATO  DE CALCIO  50 MG AMP-LEUCOVORINA',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'F-7',
                'name' => 'FOLINATO DE CALCIO 100 MG  AMP',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'F-8',
                'name' => 'FOLINATO DE CALCIO TAB 15 MG X 10',
                'medicament_group_id' => null,
                'unit_id' => 21,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'F-9',
                'name' => 'FULVESTRANT AMP 250 MG/5ML-FASLODEX',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'G-1',
                'name' => 'GANCICLOVIR AMP 500 MG-CYMEVENE',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'G-14',
                'name' => 'ACETATO DE GOSERELINA 3,6 MG AMP',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'G-15',
                'name' => 'ACETATO DE GOSERELINA 10,8 MG AMP',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'G-2',
                'name' => 'GEFITINIB COMP 250 MG',
                'medicament_group_id' => null,
                'unit_id' => 3,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'G-3',
                'name' => 'GENCITABINA 200MG',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'G-4',
                'name' => 'GENCITABINA 1GR AMP',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'G-5',
                'name' => ' FILGRASTIM  PFS  300 MU-NEUPOGEN',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'G-5-1',
                'name' => 'FILGASTRIM AMP 480 MCG',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'H-1',
                'name' => 'HIDROXICLOROQUINA 200MG-PLAQUINOL',
                'medicament_group_id' => null,
                'unit_id' => 21,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'H-2',
                'name' => 'HIDROXIUREA CAP X 500 MG-HYDREA',
                'medicament_group_id' => null,
                'unit_id' => 2,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'I-1',
                'name' => 'IDURSULFATASA 6.00 MG AMP-ELAPRASE',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'I-10',
                'name' => 'IMATINIB TAB 400 MG X 30-  GLIVEC',
                'medicament_group_id' => null,
                'unit_id' => 21,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'I-14-1',
                'name' => 'INTERFERON ALFA-2B 10 M.U.I. AMP',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'I-15',
                'name' => 'INTERFERON ALFA-2B 18 M.U.I.  PEN',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'I-15-1',
                'name' => 'INTERFERON ALFA-2B 30 M.U.I. AMP',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'I-16',
                'name' => 'PEG-INTERFERON ALFA 2 A 180MCG-PEGASYS',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'I-18',
                'name' => 'INTERFERON ALFA 2 B 100 MCG/ VIAL-PEGINTRON',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'I-19',
                'name' => ' INTERFERON BETA 1- A 30 MCG   AMPAVONEX',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'I-2',
                'name' => 'ILOPROST  10MCG/ML  AMP ( VENTAVIS)',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'I-21',
                'name' => 'INTERFERON BETA 1-A 44 MCG-REBIF',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'I-22',
                'name' => ' BETAFERON BETA 1-B 0,25 MG AMP-BETAFERON',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'I-27',
                'name' => 'IRINOTECANO AMP 100 MG-IRINOTECANO',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'I-27-1',
                'name' => 'IRINOTECANO AMP 40 MG/2ML-CAMPTOSAR',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'I-3',
                'name' => 'IFOSFAMIDA 1G AMP-HALOXAN.',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'I-4',
                'name' => 'IDARUBICINA   5  MG  POLVO LIOFILIZADO AMP',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'I-4-1',
                'name' => 'IDARUBICINA  10  MG  AMPOLLAS-ZAVEDOS',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'I-5',
                'name' => 'INFLIXIMAB AMP. 100MG-REMICADE',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'I-6',
                'name' => 'IXABEPILONA AMP 15 MG',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'I-6-1',
                'name' => 'IXABEPILONA AMP 45 MG',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'I-8',
                'name' => 'IPILIMUMAB 200 MG AMP',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'L-1-1',
                'name' => 'LENALIDOMIDA COMP 15 MG X 21',
                'medicament_group_id' => null,
                'unit_id' => 3,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'L-1-2',
                'name' => 'LENALIDOMIDA COMP 10 MG X 21',
                'medicament_group_id' => null,
                'unit_id' => 3,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'L-1-3',
                'name' => 'LENALIDOMIDA  5 MG TABLETAS',
                'medicament_group_id' => null,
                'unit_id' => 3,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'L-2',
                'name' => 'LENOGRASTIN (GRANOCYTE )34 MG (.263MCG)',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'L-3',
                'name' => 'LETROZOL  2.5 MG  X  30-FEMARA',
                'medicament_group_id' => null,
                'unit_id' => 21,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'L-5',
                'name' => 'ACETATO DE LEUPROLIDE 3,75 -LUPRON',
                'medicament_group_id' => null,
                'unit_id' => 15,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'L-5-1',
                'name' => 'ACETATO DE LEUPROLIDE 7.5 MG  SIST. ATRIGEL',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'L-6',
                'name' => 'ACETATO DE LEUPROLIDA AMP. 11,25 MG.',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'L-7',
                'name' => 'LAPATINIB TAB 250 MG X 70(TYKERB)',
                'medicament_group_id' => null,
                'unit_id' => 3,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'M-10',
                'name' => 'MESNA 400 MG AMP-UROMITEXAN',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'M-11',
                'name' => 'MESNA TAB 400 MG X 10',
                'medicament_group_id' => null,
                'unit_id' => 21,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'M-12',
                'name' => 'METHOTREXATE 5 MG AMP.',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'M-13',
                'name' => 'METHOTREXATE 50 MG AMP.',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'M-14',
                'name' => 'METHOTREXATE 500 MG  AMPOLLAS',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'M-18',
                'name' => 'METHOTREXATE  2.5 MG TAB',
                'medicament_group_id' => null,
                'unit_id' => 21,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'M-19',
                'name' => ' MICOFENOLATO MOFETILO  250 MG TAB',
                'medicament_group_id' => null,
                'unit_id' => 21,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'M-20',
                'name' => ' MICOFENOLATO MOFETILO  500 MG TAB',
                'medicament_group_id' => null,
                'unit_id' => 21,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'M-20-1',
                'name' => 'MICOFENOLATO SODICO 360 MG-MYFORTIC',
                'medicament_group_id' => null,
                'unit_id' => 21,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'M-21',
                'name' => 'MESALAZINA COMP 500 MG X 50',
                'medicament_group_id' => null,
                'unit_id' => 21,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'M-25',
                'name' => 'MITOXANTRONA SOL INY. 20 MG',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'M-3-1',
                'name' => 'MEGESTROL SUSP 40 MG FCO',
                'medicament_group_id' => null,
                'unit_id' => 19,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'M-6-1',
                'name' => 'MEFALAN 50 MG AMP',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'M-8',
                'name' => 'MERCAPTOPURINA TAB 50 MG-PURYNETOL',
                'medicament_group_id' => null,
                'unit_id' => 21,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'N-1',
                'name' => 'NILOTINIB CAP 200 MG X 112',
                'medicament_group_id' => null,
                'unit_id' => 2,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'N-2',
                'name' => 'NATALIZUMAB 300 MG AMP',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'O-10',
                'name' => 'OXALIPLATINO 50MG AMP-ELOXATIN',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'O-11',
                'name' => 'OXALIPLATINO 100 MG AMP-ELOXATIN',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'O-3',
                'name' => 'OCTREOTIDE 20 MG LAR AMP-SANDOSTATIN',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'O-3-1',
                'name' => 'OCTREOTIDE 0.2 MG/ML AMP',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'O-3-2',
                'name' => 'OCTREOTIDA 50 MG AMP',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'O-4',
                'name' => 'ONCOTICE B.C.G 12,5 MG  AMP.',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'O-5',
                'name' => 'OMALIZUMAB AMP 150 MG-XOLAIR',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'O-6',
                'name' => 'ONDANSETRON 2 MG /2ML  AMPOLLA',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'O-6-1',
                'name' => 'ONDASETRON  TAB  4 MG 10',
                'medicament_group_id' => null,
                'unit_id' => 3,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'O-6-2',
                'name' => 'ONDASETRON AMP 8 MG',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'O-6-3',
                'name' => 'ONDASETRON TAB 8 MG X 10',
                'medicament_group_id' => null,
                'unit_id' => 21,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'O-7',
                'name' => 'OPREVELKIN AMP 5 MG',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-056-010',
                'name' => 'TABLETAS  20 MGX30  LEFLUNOMIDA',
                'medicament_group_id' => null,
                'unit_id' => 21,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-1',
                'name' => 'PACLITAXEL  AMP. 30  MG/5ML',
                'medicament_group_id' => null,
                'unit_id' => 21,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-16',
                'name' => 'PALONOCETRON 0.25MG-ONICIT',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-174-000',
                'name' => ' ALBUMINA HUMANA FCO.SOL AL 20% Y 50 ML DE',
                'medicament_group_id' => null,
                'unit_id' => 16,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-2',
                'name' => 'PACLITAXEL  . 100MG. AMP',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-2-1',
                'name' => 'PACLITAXEL AMP 150MG/25ML',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-20',
                'name' => 'PEMETREXED 500 MG AMP.-ALINTA',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-348-010',
                'name' => 'TABLETAS  5 MG .10  PREDNISONA',
                'medicament_group_id' => null,
                'unit_id' => 21,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-348-011',
                'name' => 'PREDNISONA TAB 20 MG',
                'medicament_group_id' => null,
                'unit_id' => 21,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-348-012',
                'name' => 'TABLETAS 50 MG .10 PREDNISONA',
                'medicament_group_id' => null,
                'unit_id' => 21,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-4',
                'name' => 'PACLITAXEL  . 300 MG/50ML  AMP-TAZOL',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-5',
                'name' => 'PROCARBAZINA TAB 50 MG X 50',
                'medicament_group_id' => null,
                'unit_id' => 21,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-6',
                'name' => 'PEGVISOMANT AMP 20 MG',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'PS-001',
                'name' => 'AZATIOPRINA TAB 50 MG X 100',
                'medicament_group_id' => null,
                'unit_id' => 21,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'PS-025',
                'name' => ' HIALURONATO SODICO25  MG AMP X 2,5  ML',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'PS-025-070',
                'name' => 'HIALURONATO SODICO OFTALMICO 0.85 ML',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'PS-169-1',
                'name' => 'QUETIAPINA TAB 3OO MG',
                'medicament_group_id' => null,
                'unit_id' => 21,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'PS-175',
                'name' => 'VALGACICLOVIR 450 MG X 60 COMP',
                'medicament_group_id' => null,
                'unit_id' => 3,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'PS-197',
                'name' => ' ACETATO DE GLATIRAMER 20MG/ML-CAPOXONE',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'PS-199',
                'name' => 'ETANERCEPT AMP. 25 MG  X 4-EMBREL',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'PS-199-1',
                'name' => 'ETANERCEPT AMP 50MG',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'PS-201-A',
                'name' => 'SULFATO DE GLUCOSAMINA SOBRES 1.5 G',
                'medicament_group_id' => null,
                'unit_id' => 17,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'PS-202',
                'name' => 'RISEDRONATO SODICO TAB 35 MG X 4',
                'medicament_group_id' => null,
                'unit_id' => 21,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'PS-300',
                'name' => 'TERIPARATIDA 250 MG  FORTEO',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'PS-408-000',
                'name' => 'MITOMICINA 2 MG AMPOLLAS',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'PS-408-2',
                'name' => 'MITOMYCINA AMP 20 MG',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'R-2',
                'name' => 'SIROLIMUS 1 MG X 100 GRAGEAS-RAPAMICINA',
                'medicament_group_id' => null,
                'unit_id' => 2,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'R-3',
                'name' => 'RIBAVIRINA 200MG CAPSULA',
                'medicament_group_id' => null,
                'unit_id' => 2,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'R-4',
                'name' => 'RILUZOL  CAP 50 MG X 56 (RILUTEK)',
                'medicament_group_id' => null,
                'unit_id' => 2,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'R-5',
                'name' => 'RITUXIMAB 100 MG/10ML AMPOLLAS-MABTERA',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'R-6',
                'name' => ' RITUXIMAB 500 MG/50ML-MABTHERA AMP',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'R-7',
                'name' => 'RANIBIZUMAB 10 MG/ML-LUCENTIS',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'R-8',
                'name' => 'RALOXIFENO TAB 60 MG',
                'medicament_group_id' => null,
                'unit_id' => 21,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'S-1',
                'name' => 'SOMATOTROPINA  (HORMONA DE CRECIMIENTO) GENOTROPIN16UI',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'S-2',
                'name' => 'SORAFENIB TAB 200 MG X 60 (NEXAVAR)',
                'medicament_group_id' => null,
                'unit_id' => 21,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'S-3',
                'name' => 'SUNITINIB TAB 50 MG X 28 (SUTENT)',
                'medicament_group_id' => null,
                'unit_id' => 21,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'S-3-1',
                'name' => 'SUNITINIB  CÁPSULA 25 MG',
                'medicament_group_id' => null,
                'unit_id' => 2,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'S-3-2',
                'name' => 'SUNITINIB CÁPSULA 12.5 MG X 28',
                'medicament_group_id' => null,
                'unit_id' => 2,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'S-4',
                'name' => 'SULFASALAZINA TAB 500 MG X 60',
                'medicament_group_id' => null,
                'unit_id' => 21,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'T-1',
                'name' => 'TACROLIMUS  1 MG CAPSULA-PROGRAF',
                'medicament_group_id' => null,
                'unit_id' => 21,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'T-1-1',
                'name' => 'TACROLIMUS CAP 1 MG XL',
                'medicament_group_id' => null,
                'unit_id' => 2,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'T-10',
                'name' => 'TOPOTECAN AMP 4 MG',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'T-12',
                'name' => ' TRASTUZUMAB 440 MG AMP-HERCEPTIN',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'T-13',
                'name' => 'TRIPTORELINA AMP 3.75 MG- DECAPECTYL',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'T-13-1',
                'name' => 'TRIPTORELINA AMP 11.25 MG-DECAPEPTYL',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'T-16',
                'name' => 'TELVIBUDINE  COMP 600 MG X 28-SEBIVO',
                'medicament_group_id' => null,
                'unit_id' => 3,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'T-17',
                'name' => 'TETRABENAZINA  TAB 25 MG X 112',
                'medicament_group_id' => null,
                'unit_id' => 21,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'T-2',
                'name' => 'TAMOXIFEN TAB. 20 MG',
                'medicament_group_id' => null,
                'unit_id' => 21,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'T-3',
                'name' => 'TEMSIROLIMUS AMP 2.5 MG (TORYCEL)',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'T-4',
                'name' => 'TEMOZOLAMIDA  20 MG  X 20 CAP-TEMODAL',
                'medicament_group_id' => null,
                'unit_id' => 2,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'T-5',
                'name' => 'TEMOZOLOMIDA 100 MG X CAPS.(TEMODAL)',
                'medicament_group_id' => null,
                'unit_id' => 2,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'T-6',
                'name' => 'TOXINA  BOTULINICA   100  UDS  AMP',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'T-8',
                'name' => 'TALIDOMIDA  TAB 100 MG X 100',
                'medicament_group_id' => null,
                'unit_id' => 21,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'V-1-1',
                'name' => 'TELCOPLANINA 400 MG X 1 AMP',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'V-2',
                'name' => 'VINBLASTINA SULFATO 10 MG/10ML-VELVE',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'V-3',
                'name' => 'VINCRISTINA AMP. 1GRS',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'V-4',
                'name' => 'VINCRISTINA 2 GRS',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'V-6',
                'name' => 'ENTECAVIR 0.5MG TABL.-BARACLUDE',
                'medicament_group_id' => null,
                'unit_id' => 21,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'V-6-1',
                'name' => 'ENTECAVIR  1  MG TAB-BARACLUDE',
                'medicament_group_id' => null,
                'unit_id' => 3,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'V-7',
                'name' => 'VINORELBINE 50MG/ML AMP',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'V-8',
                'name' => 'VORINOSTAT CAP 100 MG',
                'medicament_group_id' => null,
                'unit_id' => 2,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'Y-1',
                'name' => 'TRABECTEDINA 1 MG AMPOLLAS-YONDELIS',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'C-27',
                'name' => 'AMPOLLA DE 20 MG ENOXAPARINA DE SODIO',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'C-28',
                'name' => 'AMPOLLA DE 40 MG ENOXAPARINA',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'C-29',
                'name' => 'ENOXAPARINA 60 MG AMP',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'C-30',
                'name' => 'ENOXAPARINA  AMP 80 MG',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'C-33',
                'name' => 'DABIGATRAN  ETEXILATO 110 MG  PRADAXA',
                'medicament_group_id' => null,
                'unit_id' => 2,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'F-13',
                'name' => 'FAVIPIRAVIR 200 MG',
                'medicament_group_id' => null,
                'unit_id' => 21,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'I-23',
                'name' => 'INTERFERON 3000 U.I.',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'I-50',
                'name' => 'IOPAMIDOL  300 MG/ ML X 50 ML',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'I-51',
                'name' => 'OMNIPAQUE 300 MG X 50 ML',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'L-8',
                'name' => 'LOPINAVIR 100 MG / RITONAVIR 25MG TAB X 60',
                'medicament_group_id' => null,
                'unit_id' => 3,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-010-004',
                'name' => 'XILOCAINE AL 4% AMPOLLAS',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-023-B-012',
                'name' => 'PREGABALINA CAP 150 MG X 14',
                'medicament_group_id' => null,
                'unit_id' => 2,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-061-1',
                'name' => 'SUGAMMADEX AMP 200 MG',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-376-130',
                'name' => 'AZUL DE METILENO  SOLUCION',
                'medicament_group_id' => null,
                'unit_id' => 16,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-457-140',
                'name' => 'KETOCONAZOL  AL 2%  CHAMPU',
                'medicament_group_id' => null,
                'unit_id' => 7,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'PS-013',
                'name' => 'FRASC X 1000 ML SOL FISIOLOGICA 0,9%  IRRIG',
                'medicament_group_id' => null,
                'unit_id' => 16,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'PS-013-1',
                'name' => 'AGUA  ESTERIL PARA INYECCIÓN 500 ML',
                'medicament_group_id' => null,
                'unit_id' => 16,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'PS-013-4',
                'name' => 'AGUA ESTERIL IRRIGACION X1000ML',
                'medicament_group_id' => null,
                'unit_id' => 16,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'PS-013-5',
                'name' => 'SOLUCION FISIOLOGICA X3000 ML',
                'medicament_group_id' => null,
                'unit_id' => 16,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'PS-013-6',
                'name' => 'AGUA DESTILADA GALON',
                'medicament_group_id' => null,
                'unit_id' => 16,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'PS-016',
                'name' => 'BUPIVACAINA 0.75% X 10 ML',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'PS-019',
                'name' => 'AMPOLLA BETAMETASONA+BETAMETASONA ( DIPROSPAN)',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'PS-024',
                'name' => 'LEVETIRACETAM 500 MG-KEPPRA',
                'medicament_group_id' => null,
                'unit_id' => 2,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'PS-025-071',
                'name' => 'METILCELULOSA 2%',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'PS-025-072',
                'name' => 'HYALURONIDASA 1500 U.I. AMP',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'PS-027',
                'name' => 'AMPOLLAS 0.5MG FLUMAZENILO',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'PS-027-011',
                'name' => 'PRAMIPEXOLE 0,25 MG X 30 MIRAPEX',
                'medicament_group_id' => null,
                'unit_id' => 3,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'PS-027-012',
                'name' => 'PRAMIPEXOLE 1 MG TABLETAS-MIRAPEX',
                'medicament_group_id' => null,
                'unit_id' => 3,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'PS-027-013',
                'name' => 'PRAMIPEXOLE ER 1,5 MG X 30',
                'medicament_group_id' => null,
                'unit_id' => 21,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'PS-027-014',
                'name' => 'PRAMIPEXOLE ER TAB 3 MG X 30',
                'medicament_group_id' => null,
                'unit_id' => 21,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'PS-032-1',
                'name' => 'SEVOFLURANO 250 ML FRASCO TAPA ROSCA',
                'medicament_group_id' => null,
                'unit_id' => 11,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'PS-040-A-2',
                'name' => 'ALCOHOL ISOPROPILICO 70% 250 ML',
                'medicament_group_id' => null,
                'unit_id' => 16,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'PS-040-A-3',
                'name' => 'ALCOHOL ISOPROPILICO 70% 120 ML',
                'medicament_group_id' => null,
                'unit_id' => 16,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'PS-047-1',
                'name' => 'FORMOL SOLUCIÓN X 900 ML',
                'medicament_group_id' => null,
                'unit_id' => 16,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'PS-049',
                'name' => 'FRASCO DE TABLETAS X 500 MG CLAV+AMOX',
                'medicament_group_id' => null,
                'unit_id' => 21,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'PS-049-1',
                'name' => 'AMOXICILINA 875 MG+ ACIDO CLAVULANICO 57 MG SUSP',
                'medicament_group_id' => self::ANTIBIOTICO,
                'unit_id' => 2,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'PS-050',
                'name' => 'AMOXICILINA / CLAVULANICO 250 MG   SUSPENCION',
                'medicament_group_id' => self::ANTIBIOTICO,
                'unit_id' => 19,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'PS-050-A',
                'name' => 'FRASCO DE SUSP.X 400 MGX 50 ML CLAV+AMOX',
                'medicament_group_id' => null,
                'unit_id' => 21,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'PS-066',
                'name' => 'LEVOSULPIRIDE COMP 25 MG',
                'medicament_group_id' => null,
                'unit_id' => 3,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'PS-067',
                'name' => 'TABLETAS X 20 X 200 MG TRIMEBUTINA',
                'medicament_group_id' => null,
                'unit_id' => 21,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'PS-067-012',
                'name' => 'DICETEL 100 MG TAB',
                'medicament_group_id' => null,
                'unit_id' => 2,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'PS-071',
                'name' => 'TABLETAS X 30 X 100 MG ACARBOSE',
                'medicament_group_id' => null,
                'unit_id' => 21,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'PS-073-A-010',
                'name' => 'AGOMELATINA 25 MG VALDOXAN  X 28',
                'medicament_group_id' => null,
                'unit_id' => 2,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'PS-078',
                'name' => 'CLOPIDROGEL 75 MG  TABLETAS X 14 X',
                'medicament_group_id' => null,
                'unit_id' => 21,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'PS-095',
                'name' => 'TABLETAS X  30 X 10 MG DOMPERIDONE',
                'medicament_group_id' => null,
                'unit_id' => 21,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'PS-096',
                'name' => 'SOLUCION OFTALMICA X 5 CCDORZOLAMIDA',
                'medicament_group_id' => null,
                'unit_id' => 8,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'PS-098',
                'name' => 'INHALADOR SALBUTAMOL+ BECLOMETASONA',
                'medicament_group_id' => null,
                'unit_id' => 11,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'PS-098-1',
                'name' => 'MONTELUKAST 4 MG X30 AIRON  TABLETAS MASTICABLES',
                'medicament_group_id' => null,
                'unit_id' => 3,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'PS-098-2',
                'name' => 'MONTELUKAST 10 MG TABLETAS MASTICABLES SINGULAIR',
                'medicament_group_id' => null,
                'unit_id' => 3,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'PS-100',
                'name' => 'TABLETAS X 30 X 2,5 MG BISOPROLOL+HIDROC',
                'medicament_group_id' => null,
                'unit_id' => 21,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'PS-100-1',
                'name' => 'BISOPROLOL 5MG/ HIDROCLORTIAZIDA 6.25 MG',
                'medicament_group_id' => null,
                'unit_id' => 2,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'PS-109',
                'name' => 'TABLETAS X  30 MATERNA',
                'medicament_group_id' => null,
                'unit_id' => 21,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'PS-109-000',
                'name' => 'CITICOLINA  1000MG/4ML AMP',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'PS-109-1',
                'name' => 'CITICOLINA 500 MG  TABLETAS SOMAZINA',
                'medicament_group_id' => null,
                'unit_id' => 3,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'PS-110',
                'name' => 'SOL OFTALMICA 2% DORZOL+ TIMOFTOL',
                'medicament_group_id' => null,
                'unit_id' => 8,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'PS-110-071',
                'name' => 'BRIMONIDINA 2 MG/ ML GTAS OFT ALPHAGAN',
                'medicament_group_id' => null,
                'unit_id' => 8,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'PS-110-1',
                'name' => 'BRIMONIDINA GOTAS OFT + TIMOLOL AL 0.5 %',
                'medicament_group_id' => null,
                'unit_id' => 8,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'PS-120',
                'name' => 'FCO. SOL OFTALMICA 2,5 ML LATANOPLOST',
                'medicament_group_id' => null,
                'unit_id' => 8,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'PS-120-010',
                'name' => 'EPLERENONA TAB 25 MG X 20',
                'medicament_group_id' => null,
                'unit_id' => 2,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'PS-121-A',
                'name' => 'MINOXIDIL 10 MG * 20 COMP',
                'medicament_group_id' => null,
                'unit_id' => 3,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'PS-122-010',
                'name' => 'LISINOPRIL TAB 10 MG',
                'medicament_group_id' => null,
                'unit_id' => 3,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'PS-127',
                'name' => 'TRAVAPROST  0,004% SOL OFT GTAS',
                'medicament_group_id' => null,
                'unit_id' => 8,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'PS-133-010',
                'name' => 'SUCCINATO DE METOPROLOL 95 MG X 14',
                'medicament_group_id' => null,
                'unit_id' => 3,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'PS-133-011',
                'name' => 'CARVEDILOL 6,25 MG TAB',
                'medicament_group_id' => null,
                'unit_id' => 2,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'PS-133-012',
                'name' => 'CARVEDILOL  12.5 MG X 14 TAB',
                'medicament_group_id' => null,
                'unit_id' => 3,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'PS-133-013',
                'name' => 'BETALOC  ZOK 47,5 MG',
                'medicament_group_id' => null,
                'unit_id' => 2,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'PS-165',
                'name' => 'FCOS AMP MEROPENEM AMP 500 MG',
                'medicament_group_id' => null,
                'unit_id' => 22,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'PS-170-1',
                'name' => 'ACIDO ACETICO AL 5% X LT',
                'medicament_group_id' => null,
                'unit_id' => 16,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'PS-184',
                'name' => 'LUGOL SOLUCIÓN FUERTE X LT',
                'medicament_group_id' => null,
                'unit_id' => 21,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'PS-185',
                'name' => 'LATA FORM. POLIMERICA ESTANDAR POLVO',
                'medicament_group_id' => null,
                'unit_id' => 15,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'PS-185-2',
                'name' => 'PEDIASURE POLVO VAINILLA',
                'medicament_group_id' => null,
                'unit_id' => 15,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'PS-185-3',
                'name' => 'CARBOHIDRATOS-GRASAS Y PROTEÍNAS LATA',
                'medicament_group_id' => null,
                'unit_id' => 16,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'PS-188',
                'name' => 'LATA MODULO PROTEICO ENTERAL',
                'medicament_group_id' => null,
                'unit_id' => 15,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'PS-190',
                'name' => 'MOXIFLOXACINO COMP.  400 MG.',
                'medicament_group_id' => null,
                'unit_id' => 3,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'PS-190-000',
                'name' => 'MOXIFLOXACINO AMP 400 MG/250 ML-AVELOX',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'PS-190-070',
                'name' => 'MOXIFLOXACINA  SOL OFT X 5 ML GTAS',
                'medicament_group_id' => null,
                'unit_id' => 8,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'PS-190-071',
                'name' => 'MOXIFLOXACINO+DEXAMETASONA GOTAS OFTALMICAS',
                'medicament_group_id' => null,
                'unit_id' => 8,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'PS-193-A-030',
                'name' => 'DESLORATADINA  JBE 2 MG/5ML X 60 ML',
                'medicament_group_id' => null,
                'unit_id' => 10,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'PS-194-A-030',
                'name' => 'LEVOCETIRIZINA JBE X 120 ML',
                'medicament_group_id' => null,
                'unit_id' => 10,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'PS-196',
                'name' => 'EZETIMIBA/ SINVASTATINA  10   - 40 MG TAB',
                'medicament_group_id' => null,
                'unit_id' => 21,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'PS-196-2',
                'name' => 'EZETIMIBA  10 MG-ZETIA',
                'medicament_group_id' => null,
                'unit_id' => 3,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'PS-200',
                'name' => 'NAPROXEN TABLETAS 250 MG',
                'medicament_group_id' => null,
                'unit_id' => 21,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'PS-201',
                'name' => 'GLUCOSAMINA  CAPSULAS 500 MG SULFATO DE CHONDROITIN 400 MG',
                'medicament_group_id' => null,
                'unit_id' => 2,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'PS-205',
                'name' => 'BUDESONIDA 1 MG/ML SUSP. PARA NEBULIZAR',
                'medicament_group_id' => null,
                'unit_id' => 19,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'PS-205-010',
                'name' => 'BUDESONIDA CAP 200 MG',
                'medicament_group_id' => null,
                'unit_id' => 2,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'PS-205-1',
                'name' => 'BUDESONIDA AEROSOL  PARA INHALAR  200 MCG/DOSIS',
                'medicament_group_id' => null,
                'unit_id' => 11,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'PS-205-160',
                'name' => 'BUDESONIDA NASAL SPRAY 360 DOSIS',
                'medicament_group_id' => null,
                'unit_id' => 11,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'PS-207',
                'name' => 'ERTAPENEM AMP 1 G',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'PS-208',
                'name' => 'OXITOCINA  AMP 10 UI/ML',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'PS-213',
                'name' => 'ARIPIPRAZOL  15 MG X 10  TABLETAS',
                'medicament_group_id' => null,
                'unit_id' => 21,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'PS-215',
                'name' => 'LINEZOLID  TAB REC 600 MG X 10',
                'medicament_group_id' => null,
                'unit_id' => 21,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'PS-215-000',
                'name' => 'LINEZOLID 600 MG AMP  E.V-ZYVOX',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'PS-219',
                'name' => 'TRAZEL  AMPOLLAS',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'PS-224',
                'name' => 'ATOMOXETINA  CAP 18 MG X 14',
                'medicament_group_id' => null,
                'unit_id' => 2,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'PS-224-1',
                'name' => 'ATOMOXETINA  25  MG  TABLETAS',
                'medicament_group_id' => null,
                'unit_id' => 3,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'PS-224-2',
                'name' => 'ATOMOXETINA  CAP 40 MG  X 14',
                'medicament_group_id' => null,
                'unit_id' => 2,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'PS-224-A',
                'name' => 'ATOMOXETINA CAP 10 MG X 7',
                'medicament_group_id' => null,
                'unit_id' => 2,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'PS-293',
                'name' => 'CIPROFIBRATO 100 MG X30',
                'medicament_group_id' => null,
                'unit_id' => 2,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'PS-330-000',
                'name' => 'SOMATOSTATINA ACETATO 3 MG AMPOLLAS',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'PS-349-070',
                'name' => 'PREDNISOLONA  ACETATO SUSPENSION OCUPRED',
                'medicament_group_id' => null,
                'unit_id' => 8,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'PS-353-071',
                'name' => 'SOPHIPREN SUSP OFT X 5 ML',
                'medicament_group_id' => null,
                'unit_id' => 8,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'PS-353-072',
                'name' => 'NEPAFENAC 1MG/ML (0,1% ) GTAS OFT',
                'medicament_group_id' => null,
                'unit_id' => 8,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'PS-376-070',
                'name' => 'MOXIFLOXACINA  0.50% SOLUCION OFTALMICA',
                'medicament_group_id' => null,
                'unit_id' => 8,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'PS-391',
                'name' => 'RISPERIDONA  2  MG  TAB X  20',
                'medicament_group_id' => null,
                'unit_id' => 2,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'PS-391-000',
                'name' => 'RISPERIDONA 25 MG AMPOLLAS',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'PS-392',
                'name' => 'TRETINOINA  CREMA X 30  GR',
                'medicament_group_id' => null,
                'unit_id' => 4,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'PS-396',
                'name' => 'ITRACONAZOL  CAPS X 100 MG X 4',
                'medicament_group_id' => null,
                'unit_id' => 2,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'PS-396-1',
                'name' => 'SECNIDAZOL  166,66 + ITRACONAL  33,33 MCG  CAPSULA ALBISEC',
                'medicament_group_id' => null,
                'unit_id' => 2,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'PS-397',
                'name' => 'LEVODOPA 50MG/CARBIDOPA 12.5 MG/ ENTACAPONA 200 MG',
                'medicament_group_id' => null,
                'unit_id' => 2,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'PS-397-1',
                'name' => 'LEVODOPA 100MG/ CARBIDOPA 25 MG/ ENTACAPONA 200 MG TAB',
                'medicament_group_id' => null,
                'unit_id' => 2,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'PS-397-2',
                'name' => 'LEVODOPA 200 MG + BENSERAZIDA 50 MG COMP',
                'medicament_group_id' => null,
                'unit_id' => 3,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'PS-397-4-1',
                'name' => 'CARBIDOPA-LEVODOPA 150 MG TABLETAS',
                'medicament_group_id' => null,
                'unit_id' => 3,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'PS-397-A',
                'name' => 'LEVODOPA 150 MG -CARBIDOPA 37.5 MG/ ENTACAPONA 200 MG',
                'medicament_group_id' => null,
                'unit_id' => 2,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'PS-397-A-1',
                'name' => 'CARBIDOPA-LEVODOPA 150 MG TABLETAS',
                'medicament_group_id' => null,
                'unit_id' => 3,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'PS-400',
                'name' => 'FILTROSOL  CREMA  100 PROTECTOR SOLAR',
                'medicament_group_id' => null,
                'unit_id' => 5,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'PS-405',
                'name' => 'PATANOL  0,1% 5  ML',
                'medicament_group_id' => null,
                'unit_id' => 8,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'PS-411',
                'name' => 'PIPERACILINA 4 G-TAZOBACTAN 0.5G AMP',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'PS-416',
                'name' => 'BETARRENTIN H CREMA DERMICA',
                'medicament_group_id' => null,
                'unit_id' => 4,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'PS-420',
                'name' => 'RANELATO DE ESTRONCIO 2 G',
                'medicament_group_id' => null,
                'unit_id' => 17,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'PS-421',
                'name' => 'OLMERSATAN TAB  20 MG X14  (BENICAR)',
                'medicament_group_id' => null,
                'unit_id' => 3,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'PS-421-1',
                'name' => 'OLMERSATAN-HIDROCLORTIAZIDA TAB 40 MG-12.5 MG X 14',
                'medicament_group_id' => null,
                'unit_id' => 3,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'PS-421-2',
                'name' => 'OLMESARTAN-AMLODIPINA TAB 20 MG-5 MG X 14',
                'medicament_group_id' => null,
                'unit_id' => 3,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'PS-421-3',
                'name' => 'CANDERSATAN CILEXETILO TAB 8 MG X 14',
                'medicament_group_id' => null,
                'unit_id' => 3,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'PS-421-4',
                'name' => 'IRBESARTAN 150MG/HIDROCLORTIAZIDA 12.5 MG',
                'medicament_group_id' => null,
                'unit_id' => 21,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'PS-421-6',
                'name' => 'CANDESARTAN TAB 32 MG X 14',
                'medicament_group_id' => null,
                'unit_id' => 21,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'PS-421-7',
                'name' => 'IRBESARTAN 150MG* 14 TAB',
                'medicament_group_id' => null,
                'unit_id' => 2,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'PS-424',
                'name' => 'RIVASTIGMINA 9 MG X 30 PARCHES',
                'medicament_group_id' => null,
                'unit_id' => 14,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'PS-424-1',
                'name' => 'MEMANTINA  TAB10 MG X60 (MIMETIX)',
                'medicament_group_id' => null,
                'unit_id' => 3,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'PS-425',
                'name' => 'RIVASTIGMINA 18 MG X 30 PARCHES',
                'medicament_group_id' => null,
                'unit_id' => 14,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'PS-426',
                'name' => 'TELMISARTAN TAB 80 MG X 14',
                'medicament_group_id' => null,
                'unit_id' => 21,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'PS-430',
                'name' => 'TAMSULOSINA CLORHIDRATO TAB 0.4 MG X 30',
                'medicament_group_id' => null,
                'unit_id' => 3,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'PS-431',
                'name' => 'DUTASTERIDE 0,5 MG X30  AVODART',
                'medicament_group_id' => null,
                'unit_id' => 2,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'PS-458',
                'name' => 'CASPOFUNGINA 50 MG -CANCIDAS AMP',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'PS-458-1',
                'name' => 'VORICONAZOL 200 MG TAB',
                'medicament_group_id' => null,
                'unit_id' => 3,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'PS-458-2',
                'name' => 'VORICONAZOL AMP 200 MG',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'PS-460-000',
                'name' => 'COLISTINA 100 MG AMP',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'PS-520-072',
                'name' => 'SYSTANE GOTAS X15 ML',
                'medicament_group_id' => null,
                'unit_id' => 8,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'PS-520-100',
                'name' => 'ACRYLARM  GEL OFT',
                'medicament_group_id' => null,
                'unit_id' => 7,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'PS-526-070',
                'name' => 'OKACIN GOTAS  OFT',
                'medicament_group_id' => null,
                'unit_id' => 8,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'PS-532-070',
                'name' => 'CARBACHOL INTRAOCULAR SOLUCIÓN USP',
                'medicament_group_id' => null,
                'unit_id' => 16,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'PS-536',
                'name' => 'SOLUCIÓN SALINA BALANCEADA OFTALMOLOGIA',
                'medicament_group_id' => null,
                'unit_id' => 16,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'PS-537',
                'name' => 'TRYPAN BLUE 0.6 MG',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'V-1-2',
                'name' => 'TIGECICLINA   50 MG AMPOLLAS TYGACIL',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'P-414-001',
                'name' => 'CEFAZOLINA  AMP 500 MG',
                'medicament_group_id' => null,
                'unit_id' => 1,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'PS-040',
                'name' => 'FRASCO X 1000 ML ISOPROPILICO',
                'medicament_group_id' => null,
                'unit_id' => 16,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'PS-040-A',
                'name' => 'ALCOHOL AL 96 %  500ML',
                'medicament_group_id' => null,
                'unit_id' => 16,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'PS-040-A-1',
                'name' => 'GALON DE ALCOHOL ISOPROPILICO',
                'medicament_group_id' => null,
                'unit_id' => 16,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'PS-047',
                'name' => 'FORMOL AL 40%  X GALON',
                'medicament_group_id' => null,
                'unit_id' => 16,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'PS-084',
                'name' => 'TARRO DE 250 GR VASELINA',
                'medicament_group_id' => null,
                'unit_id' => 22,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'PS-124',
                'name' => 'SOLUC. 3000 ML  GLICINA',
                'medicament_group_id' => null,
                'unit_id' => 16,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'PS-125',
                'name' => 'SOLUCION 1%  GLICERINA',
                'medicament_group_id' => null,
                'unit_id' => 16,
                'price_sale' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'PS-170',
                'name' => 'ACIDO TRICLORACETICO AL 85 % X 50 ML.',
                    'medicament_group_id' => null,
            'unit_id' => 16,
            'price_sale' => 0.00,
            'created_at' => now(),
            'updated_at' => now() ]
        ];
        Medicament::insert($data);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class EstadosTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('estados')->delete();
        
        \DB::table('estados')->insert(array (
            0 => 
            array (
                'id_estado' => 1,
                'estado' => 'Amazonas',
                'iso_3166-2' => 'VE-X',
            ),
            1 => 
            array (
                'id_estado' => 2,
                'estado' => 'Anzoátegui',
                'iso_3166-2' => 'VE-B',
            ),
            2 => 
            array (
                'id_estado' => 3,
                'estado' => 'Apure',
                'iso_3166-2' => 'VE-C',
            ),
            3 => 
            array (
                'id_estado' => 4,
                'estado' => 'Aragua',
                'iso_3166-2' => 'VE-D',
            ),
            4 => 
            array (
                'id_estado' => 5,
                'estado' => 'Barinas',
                'iso_3166-2' => 'VE-E',
            ),
            5 => 
            array (
                'id_estado' => 6,
                'estado' => 'Bolívar',
                'iso_3166-2' => 'VE-F',
            ),
            6 => 
            array (
                'id_estado' => 7,
                'estado' => 'Carabobo',
                'iso_3166-2' => 'VE-G',
            ),
            7 => 
            array (
                'id_estado' => 8,
                'estado' => 'Cojedes',
                'iso_3166-2' => 'VE-H',
            ),
            8 => 
            array (
                'id_estado' => 9,
                'estado' => 'Delta Amacuro',
                'iso_3166-2' => 'VE-Y',
            ),
            9 => 
            array (
                'id_estado' => 10,
                'estado' => 'Falcón',
                'iso_3166-2' => 'VE-I',
            ),
            10 => 
            array (
                'id_estado' => 11,
                'estado' => 'Guárico',
                'iso_3166-2' => 'VE-J',
            ),
            11 => 
            array (
                'id_estado' => 12,
                'estado' => 'Lara',
                'iso_3166-2' => 'VE-K',
            ),
            12 => 
            array (
                'id_estado' => 13,
                'estado' => 'Mérida',
                'iso_3166-2' => 'VE-L',
            ),
            13 => 
            array (
                'id_estado' => 14,
                'estado' => 'Miranda',
                'iso_3166-2' => 'VE-M',
            ),
            14 => 
            array (
                'id_estado' => 15,
                'estado' => 'Monagas',
                'iso_3166-2' => 'VE-N',
            ),
            15 => 
            array (
                'id_estado' => 16,
                'estado' => 'Nueva Esparta',
                'iso_3166-2' => 'VE-O',
            ),
            16 => 
            array (
                'id_estado' => 17,
                'estado' => 'Portuguesa',
                'iso_3166-2' => 'VE-P',
            ),
            17 => 
            array (
                'id_estado' => 18,
                'estado' => 'Sucre',
                'iso_3166-2' => 'VE-R',
            ),
            18 => 
            array (
                'id_estado' => 19,
                'estado' => 'Táchira',
                'iso_3166-2' => 'VE-S',
            ),
            19 => 
            array (
                'id_estado' => 20,
                'estado' => 'Trujillo',
                'iso_3166-2' => 'VE-T',
            ),
            20 => 
            array (
                'id_estado' => 21,
                'estado' => 'La Guaira',
                'iso_3166-2' => 'VE-W',
            ),
            21 => 
            array (
                'id_estado' => 22,
                'estado' => 'Yaracuy',
                'iso_3166-2' => 'VE-U',
            ),
            22 => 
            array (
                'id_estado' => 23,
                'estado' => 'Zulia',
                'iso_3166-2' => 'VE-V',
            ),
            23 => 
            array (
                'id_estado' => 24,
                'estado' => 'Distrito Capital',
                'iso_3166-2' => 'VE-A',
            ),
            24 => 
            array (
                'id_estado' => 25,
                'estado' => 'Dependencias Federales',
                'iso_3166-2' => 'VE-Z',
            ),
        ));
        
        
    }
}
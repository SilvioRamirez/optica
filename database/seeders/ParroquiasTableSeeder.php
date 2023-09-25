<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ParroquiasTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('parroquias')->delete();
        
        \DB::table('parroquias')->insert(array (
            0 => 
            array (
                'id_parroquia' => 1,
                'id_municipio' => 1,
                'parroquia' => 'Alto Orinoco',
            ),
            1 => 
            array (
                'id_parroquia' => 2,
                'id_municipio' => 1,
                'parroquia' => 'Huachamacare Acanaña',
            ),
            2 => 
            array (
                'id_parroquia' => 3,
                'id_municipio' => 1,
                'parroquia' => 'Marawaka Toky Shamanaña',
            ),
            3 => 
            array (
                'id_parroquia' => 4,
                'id_municipio' => 1,
                'parroquia' => 'Mavaka Mavaka',
            ),
            4 => 
            array (
                'id_parroquia' => 5,
                'id_municipio' => 1,
                'parroquia' => 'Sierra Parima Parimabé',
            ),
            5 => 
            array (
                'id_parroquia' => 6,
                'id_municipio' => 2,
                'parroquia' => 'Ucata Laja Lisa',
            ),
            6 => 
            array (
                'id_parroquia' => 7,
                'id_municipio' => 2,
                'parroquia' => 'Yapacana Macuruco',
            ),
            7 => 
            array (
                'id_parroquia' => 8,
                'id_municipio' => 2,
                'parroquia' => 'Caname Guarinuma',
            ),
            8 => 
            array (
                'id_parroquia' => 9,
                'id_municipio' => 3,
                'parroquia' => 'Fernando Girón Tovar',
            ),
            9 => 
            array (
                'id_parroquia' => 10,
                'id_municipio' => 3,
                'parroquia' => 'Luis Alberto Gómez',
            ),
            10 => 
            array (
                'id_parroquia' => 11,
                'id_municipio' => 3,
                'parroquia' => 'Pahueña Limón de Parhueña',
            ),
            11 => 
            array (
                'id_parroquia' => 12,
                'id_municipio' => 3,
                'parroquia' => 'Platanillal Platanillal',
            ),
            12 => 
            array (
                'id_parroquia' => 13,
                'id_municipio' => 4,
                'parroquia' => 'Samariapo',
            ),
            13 => 
            array (
                'id_parroquia' => 14,
                'id_municipio' => 4,
                'parroquia' => 'Sipapo',
            ),
            14 => 
            array (
                'id_parroquia' => 15,
                'id_municipio' => 4,
                'parroquia' => 'Munduapo',
            ),
            15 => 
            array (
                'id_parroquia' => 16,
                'id_municipio' => 4,
                'parroquia' => 'Guayapo',
            ),
            16 => 
            array (
                'id_parroquia' => 17,
                'id_municipio' => 5,
                'parroquia' => 'Alto Ventuari',
            ),
            17 => 
            array (
                'id_parroquia' => 18,
                'id_municipio' => 5,
                'parroquia' => 'Medio Ventuari',
            ),
            18 => 
            array (
                'id_parroquia' => 19,
                'id_municipio' => 5,
                'parroquia' => 'Bajo Ventuari',
            ),
            19 => 
            array (
                'id_parroquia' => 20,
                'id_municipio' => 6,
                'parroquia' => 'Victorino',
            ),
            20 => 
            array (
                'id_parroquia' => 21,
                'id_municipio' => 6,
                'parroquia' => 'Comunidad',
            ),
            21 => 
            array (
                'id_parroquia' => 22,
                'id_municipio' => 7,
                'parroquia' => 'Casiquiare',
            ),
            22 => 
            array (
                'id_parroquia' => 23,
                'id_municipio' => 7,
                'parroquia' => 'Cocuy',
            ),
            23 => 
            array (
                'id_parroquia' => 24,
                'id_municipio' => 7,
                'parroquia' => 'San Carlos de Río Negro',
            ),
            24 => 
            array (
                'id_parroquia' => 25,
                'id_municipio' => 7,
                'parroquia' => 'Solano',
            ),
            25 => 
            array (
                'id_parroquia' => 26,
                'id_municipio' => 8,
                'parroquia' => 'Anaco',
            ),
            26 => 
            array (
                'id_parroquia' => 27,
                'id_municipio' => 8,
                'parroquia' => 'San Joaquín',
            ),
            27 => 
            array (
                'id_parroquia' => 28,
                'id_municipio' => 9,
                'parroquia' => 'Cachipo',
            ),
            28 => 
            array (
                'id_parroquia' => 29,
                'id_municipio' => 9,
                'parroquia' => 'Aragua de Barcelona',
            ),
            29 => 
            array (
                'id_parroquia' => 30,
                'id_municipio' => 11,
                'parroquia' => 'Lechería',
            ),
            30 => 
            array (
                'id_parroquia' => 31,
                'id_municipio' => 11,
                'parroquia' => 'El Morro',
            ),
            31 => 
            array (
                'id_parroquia' => 32,
                'id_municipio' => 12,
                'parroquia' => 'Puerto Píritu',
            ),
            32 => 
            array (
                'id_parroquia' => 33,
                'id_municipio' => 12,
                'parroquia' => 'San Miguel',
            ),
            33 => 
            array (
                'id_parroquia' => 34,
                'id_municipio' => 12,
                'parroquia' => 'Sucre',
            ),
            34 => 
            array (
                'id_parroquia' => 35,
                'id_municipio' => 13,
                'parroquia' => 'Valle de Guanape',
            ),
            35 => 
            array (
                'id_parroquia' => 36,
                'id_municipio' => 13,
                'parroquia' => 'Santa Bárbara',
            ),
            36 => 
            array (
                'id_parroquia' => 37,
                'id_municipio' => 14,
                'parroquia' => 'El Chaparro',
            ),
            37 => 
            array (
                'id_parroquia' => 38,
                'id_municipio' => 14,
                'parroquia' => 'Tomás Alfaro',
            ),
            38 => 
            array (
                'id_parroquia' => 39,
                'id_municipio' => 14,
                'parroquia' => 'Calatrava',
            ),
            39 => 
            array (
                'id_parroquia' => 40,
                'id_municipio' => 15,
                'parroquia' => 'Guanta',
            ),
            40 => 
            array (
                'id_parroquia' => 41,
                'id_municipio' => 15,
                'parroquia' => 'Chorrerón',
            ),
            41 => 
            array (
                'id_parroquia' => 42,
                'id_municipio' => 16,
                'parroquia' => 'Mamo',
            ),
            42 => 
            array (
                'id_parroquia' => 43,
                'id_municipio' => 16,
                'parroquia' => 'Soledad',
            ),
            43 => 
            array (
                'id_parroquia' => 44,
                'id_municipio' => 17,
                'parroquia' => 'Mapire',
            ),
            44 => 
            array (
                'id_parroquia' => 45,
                'id_municipio' => 17,
                'parroquia' => 'Piar',
            ),
            45 => 
            array (
                'id_parroquia' => 46,
                'id_municipio' => 17,
                'parroquia' => 'Santa Clara',
            ),
            46 => 
            array (
                'id_parroquia' => 47,
                'id_municipio' => 17,
                'parroquia' => 'San Diego de Cabrutica',
            ),
            47 => 
            array (
                'id_parroquia' => 48,
                'id_municipio' => 17,
                'parroquia' => 'Uverito',
            ),
            48 => 
            array (
                'id_parroquia' => 49,
                'id_municipio' => 17,
                'parroquia' => 'Zuata',
            ),
            49 => 
            array (
                'id_parroquia' => 50,
                'id_municipio' => 18,
                'parroquia' => 'Puerto La Cruz',
            ),
            50 => 
            array (
                'id_parroquia' => 51,
                'id_municipio' => 18,
                'parroquia' => 'Pozuelos',
            ),
            51 => 
            array (
                'id_parroquia' => 52,
                'id_municipio' => 19,
                'parroquia' => 'Onoto',
            ),
            52 => 
            array (
                'id_parroquia' => 53,
                'id_municipio' => 19,
                'parroquia' => 'San Pablo',
            ),
            53 => 
            array (
                'id_parroquia' => 54,
                'id_municipio' => 20,
                'parroquia' => 'San Mateo',
            ),
            54 => 
            array (
                'id_parroquia' => 55,
                'id_municipio' => 20,
                'parroquia' => 'El Carito',
            ),
            55 => 
            array (
                'id_parroquia' => 56,
                'id_municipio' => 20,
                'parroquia' => 'Santa Inés',
            ),
            56 => 
            array (
                'id_parroquia' => 57,
                'id_municipio' => 20,
                'parroquia' => 'La Romereña',
            ),
            57 => 
            array (
                'id_parroquia' => 58,
                'id_municipio' => 21,
                'parroquia' => 'Atapirire',
            ),
            58 => 
            array (
                'id_parroquia' => 59,
                'id_municipio' => 21,
                'parroquia' => 'Boca del Pao',
            ),
            59 => 
            array (
                'id_parroquia' => 60,
                'id_municipio' => 21,
                'parroquia' => 'El Pao',
            ),
            60 => 
            array (
                'id_parroquia' => 61,
                'id_municipio' => 21,
                'parroquia' => 'Pariaguán',
            ),
            61 => 
            array (
                'id_parroquia' => 62,
                'id_municipio' => 22,
                'parroquia' => 'Cantaura',
            ),
            62 => 
            array (
                'id_parroquia' => 63,
                'id_municipio' => 22,
                'parroquia' => 'Libertador',
            ),
            63 => 
            array (
                'id_parroquia' => 64,
                'id_municipio' => 22,
                'parroquia' => 'Santa Rosa',
            ),
            64 => 
            array (
                'id_parroquia' => 65,
                'id_municipio' => 22,
                'parroquia' => 'Urica',
            ),
            65 => 
            array (
                'id_parroquia' => 66,
                'id_municipio' => 23,
                'parroquia' => 'Píritu',
            ),
            66 => 
            array (
                'id_parroquia' => 67,
                'id_municipio' => 23,
                'parroquia' => 'San Francisco',
            ),
            67 => 
            array (
                'id_parroquia' => 68,
                'id_municipio' => 24,
                'parroquia' => 'San José de Guanipa',
            ),
            68 => 
            array (
                'id_parroquia' => 69,
                'id_municipio' => 25,
                'parroquia' => 'Boca de Uchire',
            ),
            69 => 
            array (
                'id_parroquia' => 70,
                'id_municipio' => 25,
                'parroquia' => 'Boca de Chávez',
            ),
            70 => 
            array (
                'id_parroquia' => 71,
                'id_municipio' => 26,
                'parroquia' => 'Pueblo Nuevo',
            ),
            71 => 
            array (
                'id_parroquia' => 72,
                'id_municipio' => 26,
                'parroquia' => 'Santa Ana',
            ),
            72 => 
            array (
                'id_parroquia' => 73,
                'id_municipio' => 27,
                'parroquia' => 'Bergantín',
            ),
            73 => 
            array (
                'id_parroquia' => 74,
                'id_municipio' => 27,
                'parroquia' => 'Caigua',
            ),
            74 => 
            array (
                'id_parroquia' => 75,
                'id_municipio' => 27,
                'parroquia' => 'El Carmen',
            ),
            75 => 
            array (
                'id_parroquia' => 76,
                'id_municipio' => 27,
                'parroquia' => 'El Pilar',
            ),
            76 => 
            array (
                'id_parroquia' => 77,
                'id_municipio' => 27,
                'parroquia' => 'Naricual',
            ),
            77 => 
            array (
                'id_parroquia' => 78,
                'id_municipio' => 27,
                'parroquia' => 'San Crsitóbal',
            ),
            78 => 
            array (
                'id_parroquia' => 79,
                'id_municipio' => 28,
                'parroquia' => 'Edmundo Barrios',
            ),
            79 => 
            array (
                'id_parroquia' => 80,
                'id_municipio' => 28,
                'parroquia' => 'Miguel Otero Silva',
            ),
            80 => 
            array (
                'id_parroquia' => 81,
                'id_municipio' => 29,
                'parroquia' => 'Achaguas',
            ),
            81 => 
            array (
                'id_parroquia' => 82,
                'id_municipio' => 29,
                'parroquia' => 'Apurito',
            ),
            82 => 
            array (
                'id_parroquia' => 83,
                'id_municipio' => 29,
                'parroquia' => 'El Yagual',
            ),
            83 => 
            array (
                'id_parroquia' => 84,
                'id_municipio' => 29,
                'parroquia' => 'Guachara',
            ),
            84 => 
            array (
                'id_parroquia' => 85,
                'id_municipio' => 29,
                'parroquia' => 'Mucuritas',
            ),
            85 => 
            array (
                'id_parroquia' => 86,
                'id_municipio' => 29,
                'parroquia' => 'Queseras del medio',
            ),
            86 => 
            array (
                'id_parroquia' => 87,
                'id_municipio' => 30,
                'parroquia' => 'Biruaca',
            ),
            87 => 
            array (
                'id_parroquia' => 88,
                'id_municipio' => 31,
                'parroquia' => 'Bruzual',
            ),
            88 => 
            array (
                'id_parroquia' => 89,
                'id_municipio' => 31,
                'parroquia' => 'Mantecal',
            ),
            89 => 
            array (
                'id_parroquia' => 90,
                'id_municipio' => 31,
                'parroquia' => 'Quintero',
            ),
            90 => 
            array (
                'id_parroquia' => 91,
                'id_municipio' => 31,
                'parroquia' => 'Rincón Hondo',
            ),
            91 => 
            array (
                'id_parroquia' => 92,
                'id_municipio' => 31,
                'parroquia' => 'San Vicente',
            ),
            92 => 
            array (
                'id_parroquia' => 93,
                'id_municipio' => 32,
                'parroquia' => 'Guasdualito',
            ),
            93 => 
            array (
                'id_parroquia' => 94,
                'id_municipio' => 32,
                'parroquia' => 'Aramendi',
            ),
            94 => 
            array (
                'id_parroquia' => 95,
                'id_municipio' => 32,
                'parroquia' => 'El Amparo',
            ),
            95 => 
            array (
                'id_parroquia' => 96,
                'id_municipio' => 32,
                'parroquia' => 'San Camilo',
            ),
            96 => 
            array (
                'id_parroquia' => 97,
                'id_municipio' => 32,
                'parroquia' => 'Urdaneta',
            ),
            97 => 
            array (
                'id_parroquia' => 98,
                'id_municipio' => 33,
                'parroquia' => 'San Juan de Payara',
            ),
            98 => 
            array (
                'id_parroquia' => 99,
                'id_municipio' => 33,
                'parroquia' => 'Codazzi',
            ),
            99 => 
            array (
                'id_parroquia' => 100,
                'id_municipio' => 33,
                'parroquia' => 'Cunaviche',
            ),
            100 => 
            array (
                'id_parroquia' => 101,
                'id_municipio' => 34,
                'parroquia' => 'Elorza',
            ),
            101 => 
            array (
                'id_parroquia' => 102,
                'id_municipio' => 34,
                'parroquia' => 'La Trinidad',
            ),
            102 => 
            array (
                'id_parroquia' => 103,
                'id_municipio' => 35,
                'parroquia' => 'San Fernando',
            ),
            103 => 
            array (
                'id_parroquia' => 104,
                'id_municipio' => 35,
                'parroquia' => 'El Recreo',
            ),
            104 => 
            array (
                'id_parroquia' => 105,
                'id_municipio' => 35,
                'parroquia' => 'Peñalver',
            ),
            105 => 
            array (
                'id_parroquia' => 106,
                'id_municipio' => 35,
                'parroquia' => 'San Rafael de Atamaica',
            ),
            106 => 
            array (
                'id_parroquia' => 107,
                'id_municipio' => 36,
                'parroquia' => 'Pedro José Ovalles',
            ),
            107 => 
            array (
                'id_parroquia' => 108,
                'id_municipio' => 36,
                'parroquia' => 'Joaquín Crespo',
            ),
            108 => 
            array (
                'id_parroquia' => 109,
                'id_municipio' => 36,
                'parroquia' => 'José Casanova Godoy',
            ),
            109 => 
            array (
                'id_parroquia' => 110,
                'id_municipio' => 36,
                'parroquia' => 'Madre María de San José',
            ),
            110 => 
            array (
                'id_parroquia' => 111,
                'id_municipio' => 36,
                'parroquia' => 'Andrés Eloy Blanco',
            ),
            111 => 
            array (
                'id_parroquia' => 112,
                'id_municipio' => 36,
                'parroquia' => 'Los Tacarigua',
            ),
            112 => 
            array (
                'id_parroquia' => 113,
                'id_municipio' => 36,
                'parroquia' => 'Las Delicias',
            ),
            113 => 
            array (
                'id_parroquia' => 114,
                'id_municipio' => 36,
                'parroquia' => 'Choroní',
            ),
            114 => 
            array (
                'id_parroquia' => 115,
                'id_municipio' => 37,
                'parroquia' => 'Bolívar',
            ),
            115 => 
            array (
                'id_parroquia' => 116,
                'id_municipio' => 38,
                'parroquia' => 'Camatagua',
            ),
            116 => 
            array (
                'id_parroquia' => 117,
                'id_municipio' => 38,
                'parroquia' => 'Carmen de Cura',
            ),
            117 => 
            array (
                'id_parroquia' => 118,
                'id_municipio' => 39,
                'parroquia' => 'Santa Rita',
            ),
            118 => 
            array (
                'id_parroquia' => 119,
                'id_municipio' => 39,
                'parroquia' => 'Francisco de Miranda',
            ),
            119 => 
            array (
                'id_parroquia' => 120,
                'id_municipio' => 39,
                'parroquia' => 'Moseñor Feliciano González',
            ),
            120 => 
            array (
                'id_parroquia' => 121,
                'id_municipio' => 40,
                'parroquia' => 'Santa Cruz',
            ),
            121 => 
            array (
                'id_parroquia' => 122,
                'id_municipio' => 41,
                'parroquia' => 'José Félix Ribas',
            ),
            122 => 
            array (
                'id_parroquia' => 123,
                'id_municipio' => 41,
                'parroquia' => 'Castor Nieves Ríos',
            ),
            123 => 
            array (
                'id_parroquia' => 124,
                'id_municipio' => 41,
                'parroquia' => 'Las Guacamayas',
            ),
            124 => 
            array (
                'id_parroquia' => 125,
                'id_municipio' => 41,
                'parroquia' => 'Pao de Zárate',
            ),
            125 => 
            array (
                'id_parroquia' => 126,
                'id_municipio' => 41,
                'parroquia' => 'Zuata',
            ),
            126 => 
            array (
                'id_parroquia' => 127,
                'id_municipio' => 42,
                'parroquia' => 'José Rafael Revenga',
            ),
            127 => 
            array (
                'id_parroquia' => 128,
                'id_municipio' => 43,
                'parroquia' => 'Palo Negro',
            ),
            128 => 
            array (
                'id_parroquia' => 129,
                'id_municipio' => 43,
                'parroquia' => 'San Martín de Porres',
            ),
            129 => 
            array (
                'id_parroquia' => 130,
                'id_municipio' => 44,
                'parroquia' => 'El Limón',
            ),
            130 => 
            array (
                'id_parroquia' => 131,
                'id_municipio' => 44,
                'parroquia' => 'Caña de Azúcar',
            ),
            131 => 
            array (
                'id_parroquia' => 132,
                'id_municipio' => 45,
                'parroquia' => 'Ocumare de la Costa',
            ),
            132 => 
            array (
                'id_parroquia' => 133,
                'id_municipio' => 46,
                'parroquia' => 'San Casimiro',
            ),
            133 => 
            array (
                'id_parroquia' => 134,
                'id_municipio' => 46,
                'parroquia' => 'Güiripa',
            ),
            134 => 
            array (
                'id_parroquia' => 135,
                'id_municipio' => 46,
                'parroquia' => 'Ollas de Caramacate',
            ),
            135 => 
            array (
                'id_parroquia' => 136,
                'id_municipio' => 46,
                'parroquia' => 'Valle Morín',
            ),
            136 => 
            array (
                'id_parroquia' => 137,
                'id_municipio' => 47,
                'parroquia' => 'San Sebastían',
            ),
            137 => 
            array (
                'id_parroquia' => 138,
                'id_municipio' => 48,
                'parroquia' => 'Turmero',
            ),
            138 => 
            array (
                'id_parroquia' => 139,
                'id_municipio' => 48,
                'parroquia' => 'Arevalo Aponte',
            ),
            139 => 
            array (
                'id_parroquia' => 140,
                'id_municipio' => 48,
                'parroquia' => 'Chuao',
            ),
            140 => 
            array (
                'id_parroquia' => 141,
                'id_municipio' => 48,
                'parroquia' => 'Samán de Güere',
            ),
            141 => 
            array (
                'id_parroquia' => 142,
                'id_municipio' => 48,
                'parroquia' => 'Alfredo Pacheco Miranda',
            ),
            142 => 
            array (
                'id_parroquia' => 143,
                'id_municipio' => 49,
                'parroquia' => 'Santos Michelena',
            ),
            143 => 
            array (
                'id_parroquia' => 144,
                'id_municipio' => 49,
                'parroquia' => 'Tiara',
            ),
            144 => 
            array (
                'id_parroquia' => 145,
                'id_municipio' => 50,
                'parroquia' => 'Cagua',
            ),
            145 => 
            array (
                'id_parroquia' => 146,
                'id_municipio' => 50,
                'parroquia' => 'Bella Vista',
            ),
            146 => 
            array (
                'id_parroquia' => 147,
                'id_municipio' => 51,
                'parroquia' => 'Tovar',
            ),
            147 => 
            array (
                'id_parroquia' => 148,
                'id_municipio' => 52,
                'parroquia' => 'Urdaneta',
            ),
            148 => 
            array (
                'id_parroquia' => 149,
                'id_municipio' => 52,
                'parroquia' => 'Las Peñitas',
            ),
            149 => 
            array (
                'id_parroquia' => 150,
                'id_municipio' => 52,
                'parroquia' => 'San Francisco de Cara',
            ),
            150 => 
            array (
                'id_parroquia' => 151,
                'id_municipio' => 52,
                'parroquia' => 'Taguay',
            ),
            151 => 
            array (
                'id_parroquia' => 152,
                'id_municipio' => 53,
                'parroquia' => 'Zamora',
            ),
            152 => 
            array (
                'id_parroquia' => 153,
                'id_municipio' => 53,
                'parroquia' => 'Magdaleno',
            ),
            153 => 
            array (
                'id_parroquia' => 154,
                'id_municipio' => 53,
                'parroquia' => 'San Francisco de Asís',
            ),
            154 => 
            array (
                'id_parroquia' => 155,
                'id_municipio' => 53,
                'parroquia' => 'Valles de Tucutunemo',
            ),
            155 => 
            array (
                'id_parroquia' => 156,
                'id_municipio' => 53,
                'parroquia' => 'Augusto Mijares',
            ),
            156 => 
            array (
                'id_parroquia' => 157,
                'id_municipio' => 54,
                'parroquia' => 'Sabaneta',
            ),
            157 => 
            array (
                'id_parroquia' => 158,
                'id_municipio' => 54,
                'parroquia' => 'Juan Antonio Rodríguez Domínguez',
            ),
            158 => 
            array (
                'id_parroquia' => 159,
                'id_municipio' => 55,
                'parroquia' => 'El Cantón',
            ),
            159 => 
            array (
                'id_parroquia' => 160,
                'id_municipio' => 55,
                'parroquia' => 'Santa Cruz de Guacas',
            ),
            160 => 
            array (
                'id_parroquia' => 161,
                'id_municipio' => 55,
                'parroquia' => 'Puerto Vivas',
            ),
            161 => 
            array (
                'id_parroquia' => 162,
                'id_municipio' => 56,
                'parroquia' => 'Ticoporo',
            ),
            162 => 
            array (
                'id_parroquia' => 163,
                'id_municipio' => 56,
                'parroquia' => 'Nicolás Pulido',
            ),
            163 => 
            array (
                'id_parroquia' => 164,
                'id_municipio' => 56,
                'parroquia' => 'Andrés Bello',
            ),
            164 => 
            array (
                'id_parroquia' => 165,
                'id_municipio' => 57,
                'parroquia' => 'Arismendi',
            ),
            165 => 
            array (
                'id_parroquia' => 166,
                'id_municipio' => 57,
                'parroquia' => 'Guadarrama',
            ),
            166 => 
            array (
                'id_parroquia' => 167,
                'id_municipio' => 57,
                'parroquia' => 'La Unión',
            ),
            167 => 
            array (
                'id_parroquia' => 168,
                'id_municipio' => 57,
                'parroquia' => 'San Antonio',
            ),
            168 => 
            array (
                'id_parroquia' => 169,
                'id_municipio' => 58,
                'parroquia' => 'Barinas',
            ),
            169 => 
            array (
                'id_parroquia' => 170,
                'id_municipio' => 58,
                'parroquia' => 'Alberto Arvelo Larriva',
            ),
            170 => 
            array (
                'id_parroquia' => 171,
                'id_municipio' => 58,
                'parroquia' => 'San Silvestre',
            ),
            171 => 
            array (
                'id_parroquia' => 172,
                'id_municipio' => 58,
                'parroquia' => 'Santa Inés',
            ),
            172 => 
            array (
                'id_parroquia' => 173,
                'id_municipio' => 58,
                'parroquia' => 'Santa Lucía',
            ),
            173 => 
            array (
                'id_parroquia' => 174,
                'id_municipio' => 58,
                'parroquia' => 'Torumos',
            ),
            174 => 
            array (
                'id_parroquia' => 175,
                'id_municipio' => 58,
                'parroquia' => 'El Carmen',
            ),
            175 => 
            array (
                'id_parroquia' => 176,
                'id_municipio' => 58,
                'parroquia' => 'Rómulo Betancourt',
            ),
            176 => 
            array (
                'id_parroquia' => 177,
                'id_municipio' => 58,
                'parroquia' => 'Corazón de Jesús',
            ),
            177 => 
            array (
                'id_parroquia' => 178,
                'id_municipio' => 58,
                'parroquia' => 'Ramón Ignacio Méndez',
            ),
            178 => 
            array (
                'id_parroquia' => 179,
                'id_municipio' => 58,
                'parroquia' => 'Alto Barinas',
            ),
            179 => 
            array (
                'id_parroquia' => 180,
                'id_municipio' => 58,
                'parroquia' => 'Manuel Palacio Fajardo',
            ),
            180 => 
            array (
                'id_parroquia' => 181,
                'id_municipio' => 58,
                'parroquia' => 'Juan Antonio Rodríguez Domínguez',
            ),
            181 => 
            array (
                'id_parroquia' => 182,
                'id_municipio' => 58,
                'parroquia' => 'Dominga Ortiz de Páez',
            ),
            182 => 
            array (
                'id_parroquia' => 183,
                'id_municipio' => 59,
                'parroquia' => 'Barinitas',
            ),
            183 => 
            array (
                'id_parroquia' => 184,
                'id_municipio' => 59,
                'parroquia' => 'Altamira de Cáceres',
            ),
            184 => 
            array (
                'id_parroquia' => 185,
                'id_municipio' => 59,
                'parroquia' => 'Calderas',
            ),
            185 => 
            array (
                'id_parroquia' => 186,
                'id_municipio' => 60,
                'parroquia' => 'Barrancas',
            ),
            186 => 
            array (
                'id_parroquia' => 187,
                'id_municipio' => 60,
                'parroquia' => 'El Socorro',
            ),
            187 => 
            array (
                'id_parroquia' => 188,
                'id_municipio' => 60,
                'parroquia' => 'Mazparrito',
            ),
            188 => 
            array (
                'id_parroquia' => 189,
                'id_municipio' => 61,
                'parroquia' => 'Santa Bárbara',
            ),
            189 => 
            array (
                'id_parroquia' => 190,
                'id_municipio' => 61,
                'parroquia' => 'Pedro Briceño Méndez',
            ),
            190 => 
            array (
                'id_parroquia' => 191,
                'id_municipio' => 61,
                'parroquia' => 'Ramón Ignacio Méndez',
            ),
            191 => 
            array (
                'id_parroquia' => 192,
                'id_municipio' => 61,
                'parroquia' => 'José Ignacio del Pumar',
            ),
            192 => 
            array (
                'id_parroquia' => 193,
                'id_municipio' => 62,
                'parroquia' => 'Obispos',
            ),
            193 => 
            array (
                'id_parroquia' => 194,
                'id_municipio' => 62,
                'parroquia' => 'Guasimitos',
            ),
            194 => 
            array (
                'id_parroquia' => 195,
                'id_municipio' => 62,
                'parroquia' => 'El Real',
            ),
            195 => 
            array (
                'id_parroquia' => 196,
                'id_municipio' => 62,
                'parroquia' => 'La Luz',
            ),
            196 => 
            array (
                'id_parroquia' => 197,
                'id_municipio' => 63,
                'parroquia' => 'Ciudad Bolívia',
            ),
            197 => 
            array (
                'id_parroquia' => 198,
                'id_municipio' => 63,
                'parroquia' => 'José Ignacio Briceño',
            ),
            198 => 
            array (
                'id_parroquia' => 199,
                'id_municipio' => 63,
                'parroquia' => 'José Félix Ribas',
            ),
            199 => 
            array (
                'id_parroquia' => 200,
                'id_municipio' => 63,
                'parroquia' => 'Páez',
            ),
            200 => 
            array (
                'id_parroquia' => 201,
                'id_municipio' => 64,
                'parroquia' => 'Libertad',
            ),
            201 => 
            array (
                'id_parroquia' => 202,
                'id_municipio' => 64,
                'parroquia' => 'Dolores',
            ),
            202 => 
            array (
                'id_parroquia' => 203,
                'id_municipio' => 64,
                'parroquia' => 'Santa Rosa',
            ),
            203 => 
            array (
                'id_parroquia' => 204,
                'id_municipio' => 64,
                'parroquia' => 'Palacio Fajardo',
            ),
            204 => 
            array (
                'id_parroquia' => 205,
                'id_municipio' => 65,
                'parroquia' => 'Ciudad de Nutrias',
            ),
            205 => 
            array (
                'id_parroquia' => 206,
                'id_municipio' => 65,
                'parroquia' => 'El Regalo',
            ),
            206 => 
            array (
                'id_parroquia' => 207,
                'id_municipio' => 65,
                'parroquia' => 'Puerto Nutrias',
            ),
            207 => 
            array (
                'id_parroquia' => 208,
                'id_municipio' => 65,
                'parroquia' => 'Santa Catalina',
            ),
            208 => 
            array (
                'id_parroquia' => 209,
                'id_municipio' => 66,
                'parroquia' => 'Cachamay',
            ),
            209 => 
            array (
                'id_parroquia' => 210,
                'id_municipio' => 66,
                'parroquia' => 'Chirica',
            ),
            210 => 
            array (
                'id_parroquia' => 211,
                'id_municipio' => 66,
                'parroquia' => 'Dalla Costa',
            ),
            211 => 
            array (
                'id_parroquia' => 212,
                'id_municipio' => 66,
                'parroquia' => 'Once de Abril',
            ),
            212 => 
            array (
                'id_parroquia' => 213,
                'id_municipio' => 66,
                'parroquia' => 'Simón Bolívar',
            ),
            213 => 
            array (
                'id_parroquia' => 214,
                'id_municipio' => 66,
                'parroquia' => 'Unare',
            ),
            214 => 
            array (
                'id_parroquia' => 215,
                'id_municipio' => 66,
                'parroquia' => 'Universidad',
            ),
            215 => 
            array (
                'id_parroquia' => 216,
                'id_municipio' => 66,
                'parroquia' => 'Vista al Sol',
            ),
            216 => 
            array (
                'id_parroquia' => 217,
                'id_municipio' => 66,
                'parroquia' => 'Pozo Verde',
            ),
            217 => 
            array (
                'id_parroquia' => 218,
                'id_municipio' => 66,
                'parroquia' => 'Yocoima',
            ),
            218 => 
            array (
                'id_parroquia' => 219,
                'id_municipio' => 66,
                'parroquia' => '5 de Julio',
            ),
            219 => 
            array (
                'id_parroquia' => 220,
                'id_municipio' => 67,
                'parroquia' => 'Cedeño',
            ),
            220 => 
            array (
                'id_parroquia' => 221,
                'id_municipio' => 67,
                'parroquia' => 'Altagracia',
            ),
            221 => 
            array (
                'id_parroquia' => 222,
                'id_municipio' => 67,
                'parroquia' => 'Ascensión Farreras',
            ),
            222 => 
            array (
                'id_parroquia' => 223,
                'id_municipio' => 67,
                'parroquia' => 'Guaniamo',
            ),
            223 => 
            array (
                'id_parroquia' => 224,
                'id_municipio' => 67,
                'parroquia' => 'La Urbana',
            ),
            224 => 
            array (
                'id_parroquia' => 225,
                'id_municipio' => 67,
                'parroquia' => 'Pijiguaos',
            ),
            225 => 
            array (
                'id_parroquia' => 226,
                'id_municipio' => 68,
                'parroquia' => 'El Callao',
            ),
            226 => 
            array (
                'id_parroquia' => 227,
                'id_municipio' => 69,
                'parroquia' => 'Gran Sabana',
            ),
            227 => 
            array (
                'id_parroquia' => 228,
                'id_municipio' => 69,
                'parroquia' => 'Ikabarú',
            ),
            228 => 
            array (
                'id_parroquia' => 229,
                'id_municipio' => 70,
                'parroquia' => 'Catedral',
            ),
            229 => 
            array (
                'id_parroquia' => 230,
                'id_municipio' => 70,
                'parroquia' => 'Zea',
            ),
            230 => 
            array (
                'id_parroquia' => 231,
                'id_municipio' => 70,
                'parroquia' => 'Orinoco',
            ),
            231 => 
            array (
                'id_parroquia' => 232,
                'id_municipio' => 70,
                'parroquia' => 'José Antonio Páez',
            ),
            232 => 
            array (
                'id_parroquia' => 233,
                'id_municipio' => 70,
                'parroquia' => 'Marhuanta',
            ),
            233 => 
            array (
                'id_parroquia' => 234,
                'id_municipio' => 70,
                'parroquia' => 'Agua Salada',
            ),
            234 => 
            array (
                'id_parroquia' => 235,
                'id_municipio' => 70,
                'parroquia' => 'Vista Hermosa',
            ),
            235 => 
            array (
                'id_parroquia' => 236,
                'id_municipio' => 70,
                'parroquia' => 'La Sabanita',
            ),
            236 => 
            array (
                'id_parroquia' => 237,
                'id_municipio' => 70,
                'parroquia' => 'Panapana',
            ),
            237 => 
            array (
                'id_parroquia' => 238,
                'id_municipio' => 71,
                'parroquia' => 'Andrés Eloy Blanco',
            ),
            238 => 
            array (
                'id_parroquia' => 239,
                'id_municipio' => 71,
                'parroquia' => 'Pedro Cova',
            ),
            239 => 
            array (
                'id_parroquia' => 240,
                'id_municipio' => 72,
                'parroquia' => 'Raúl Leoni',
            ),
            240 => 
            array (
                'id_parroquia' => 241,
                'id_municipio' => 72,
                'parroquia' => 'Barceloneta',
            ),
            241 => 
            array (
                'id_parroquia' => 242,
                'id_municipio' => 72,
                'parroquia' => 'Santa Bárbara',
            ),
            242 => 
            array (
                'id_parroquia' => 243,
                'id_municipio' => 72,
                'parroquia' => 'San Francisco',
            ),
            243 => 
            array (
                'id_parroquia' => 244,
                'id_municipio' => 73,
                'parroquia' => 'Roscio',
            ),
            244 => 
            array (
                'id_parroquia' => 245,
                'id_municipio' => 73,
                'parroquia' => 'Salóm',
            ),
            245 => 
            array (
                'id_parroquia' => 246,
                'id_municipio' => 74,
                'parroquia' => 'Sifontes',
            ),
            246 => 
            array (
                'id_parroquia' => 247,
                'id_municipio' => 74,
                'parroquia' => 'Dalla Costa',
            ),
            247 => 
            array (
                'id_parroquia' => 248,
                'id_municipio' => 74,
                'parroquia' => 'San Isidro',
            ),
            248 => 
            array (
                'id_parroquia' => 249,
                'id_municipio' => 75,
                'parroquia' => 'Sucre',
            ),
            249 => 
            array (
                'id_parroquia' => 250,
                'id_municipio' => 75,
                'parroquia' => 'Aripao',
            ),
            250 => 
            array (
                'id_parroquia' => 251,
                'id_municipio' => 75,
                'parroquia' => 'Guarataro',
            ),
            251 => 
            array (
                'id_parroquia' => 252,
                'id_municipio' => 75,
                'parroquia' => 'Las Majadas',
            ),
            252 => 
            array (
                'id_parroquia' => 253,
                'id_municipio' => 75,
                'parroquia' => 'Moitaco',
            ),
            253 => 
            array (
                'id_parroquia' => 254,
                'id_municipio' => 76,
                'parroquia' => 'Padre Pedro Chien',
            ),
            254 => 
            array (
                'id_parroquia' => 255,
                'id_municipio' => 76,
                'parroquia' => 'Río Grande',
            ),
            255 => 
            array (
                'id_parroquia' => 256,
                'id_municipio' => 77,
                'parroquia' => 'Bejuma',
            ),
            256 => 
            array (
                'id_parroquia' => 257,
                'id_municipio' => 77,
                'parroquia' => 'Canoabo',
            ),
            257 => 
            array (
                'id_parroquia' => 258,
                'id_municipio' => 77,
                'parroquia' => 'Simón Bolívar',
            ),
            258 => 
            array (
                'id_parroquia' => 259,
                'id_municipio' => 78,
                'parroquia' => 'Güigüe',
            ),
            259 => 
            array (
                'id_parroquia' => 260,
                'id_municipio' => 78,
                'parroquia' => 'Carabobo',
            ),
            260 => 
            array (
                'id_parroquia' => 261,
                'id_municipio' => 78,
                'parroquia' => 'Tacarigua',
            ),
            261 => 
            array (
                'id_parroquia' => 262,
                'id_municipio' => 79,
                'parroquia' => 'Mariara',
            ),
            262 => 
            array (
                'id_parroquia' => 263,
                'id_municipio' => 79,
                'parroquia' => 'Aguas Calientes',
            ),
            263 => 
            array (
                'id_parroquia' => 264,
                'id_municipio' => 80,
                'parroquia' => 'Ciudad Alianza',
            ),
            264 => 
            array (
                'id_parroquia' => 265,
                'id_municipio' => 80,
                'parroquia' => 'Guacara',
            ),
            265 => 
            array (
                'id_parroquia' => 266,
                'id_municipio' => 80,
                'parroquia' => 'Yagua',
            ),
            266 => 
            array (
                'id_parroquia' => 267,
                'id_municipio' => 81,
                'parroquia' => 'Morón',
            ),
            267 => 
            array (
                'id_parroquia' => 268,
                'id_municipio' => 81,
                'parroquia' => 'Yagua',
            ),
            268 => 
            array (
                'id_parroquia' => 269,
                'id_municipio' => 82,
                'parroquia' => 'Tocuyito',
            ),
            269 => 
            array (
                'id_parroquia' => 270,
                'id_municipio' => 82,
                'parroquia' => 'Independencia',
            ),
            270 => 
            array (
                'id_parroquia' => 271,
                'id_municipio' => 83,
                'parroquia' => 'Los Guayos',
            ),
            271 => 
            array (
                'id_parroquia' => 272,
                'id_municipio' => 84,
                'parroquia' => 'Miranda',
            ),
            272 => 
            array (
                'id_parroquia' => 273,
                'id_municipio' => 85,
                'parroquia' => 'Montalbán',
            ),
            273 => 
            array (
                'id_parroquia' => 274,
                'id_municipio' => 86,
                'parroquia' => 'Naguanagua',
            ),
            274 => 
            array (
                'id_parroquia' => 275,
                'id_municipio' => 87,
                'parroquia' => 'Bartolomé Salóm',
            ),
            275 => 
            array (
                'id_parroquia' => 276,
                'id_municipio' => 87,
                'parroquia' => 'Democracia',
            ),
            276 => 
            array (
                'id_parroquia' => 277,
                'id_municipio' => 87,
                'parroquia' => 'Fraternidad',
            ),
            277 => 
            array (
                'id_parroquia' => 278,
                'id_municipio' => 87,
                'parroquia' => 'Goaigoaza',
            ),
            278 => 
            array (
                'id_parroquia' => 279,
                'id_municipio' => 87,
                'parroquia' => 'Juan José Flores',
            ),
            279 => 
            array (
                'id_parroquia' => 280,
                'id_municipio' => 87,
                'parroquia' => 'Unión',
            ),
            280 => 
            array (
                'id_parroquia' => 281,
                'id_municipio' => 87,
                'parroquia' => 'Borburata',
            ),
            281 => 
            array (
                'id_parroquia' => 282,
                'id_municipio' => 87,
                'parroquia' => 'Patanemo',
            ),
            282 => 
            array (
                'id_parroquia' => 283,
                'id_municipio' => 88,
                'parroquia' => 'San Diego',
            ),
            283 => 
            array (
                'id_parroquia' => 284,
                'id_municipio' => 89,
                'parroquia' => 'San Joaquín',
            ),
            284 => 
            array (
                'id_parroquia' => 285,
                'id_municipio' => 90,
                'parroquia' => 'Candelaria',
            ),
            285 => 
            array (
                'id_parroquia' => 286,
                'id_municipio' => 90,
                'parroquia' => 'Catedral',
            ),
            286 => 
            array (
                'id_parroquia' => 287,
                'id_municipio' => 90,
                'parroquia' => 'El Socorro',
            ),
            287 => 
            array (
                'id_parroquia' => 288,
                'id_municipio' => 90,
                'parroquia' => 'Miguel Peña',
            ),
            288 => 
            array (
                'id_parroquia' => 289,
                'id_municipio' => 90,
                'parroquia' => 'Rafael Urdaneta',
            ),
            289 => 
            array (
                'id_parroquia' => 290,
                'id_municipio' => 90,
                'parroquia' => 'San Blas',
            ),
            290 => 
            array (
                'id_parroquia' => 291,
                'id_municipio' => 90,
                'parroquia' => 'San José',
            ),
            291 => 
            array (
                'id_parroquia' => 292,
                'id_municipio' => 90,
                'parroquia' => 'Santa Rosa',
            ),
            292 => 
            array (
                'id_parroquia' => 293,
                'id_municipio' => 90,
                'parroquia' => 'Negro Primero',
            ),
            293 => 
            array (
                'id_parroquia' => 294,
                'id_municipio' => 91,
                'parroquia' => 'Cojedes',
            ),
            294 => 
            array (
                'id_parroquia' => 295,
                'id_municipio' => 91,
                'parroquia' => 'Juan de Mata Suárez',
            ),
            295 => 
            array (
                'id_parroquia' => 296,
                'id_municipio' => 92,
                'parroquia' => 'Tinaquillo',
            ),
            296 => 
            array (
                'id_parroquia' => 297,
                'id_municipio' => 93,
                'parroquia' => 'El Baúl',
            ),
            297 => 
            array (
                'id_parroquia' => 298,
                'id_municipio' => 93,
                'parroquia' => 'Sucre',
            ),
            298 => 
            array (
                'id_parroquia' => 299,
                'id_municipio' => 94,
                'parroquia' => 'La Aguadita',
            ),
            299 => 
            array (
                'id_parroquia' => 300,
                'id_municipio' => 94,
                'parroquia' => 'Macapo',
            ),
            300 => 
            array (
                'id_parroquia' => 301,
                'id_municipio' => 95,
                'parroquia' => 'El Pao',
            ),
            301 => 
            array (
                'id_parroquia' => 302,
                'id_municipio' => 96,
                'parroquia' => 'El Amparo',
            ),
            302 => 
            array (
                'id_parroquia' => 303,
                'id_municipio' => 96,
                'parroquia' => 'Libertad de Cojedes',
            ),
            303 => 
            array (
                'id_parroquia' => 304,
                'id_municipio' => 97,
                'parroquia' => 'Rómulo Gallegos',
            ),
            304 => 
            array (
                'id_parroquia' => 305,
                'id_municipio' => 98,
                'parroquia' => 'San Carlos de Austria',
            ),
            305 => 
            array (
                'id_parroquia' => 306,
                'id_municipio' => 98,
                'parroquia' => 'Juan Ángel Bravo',
            ),
            306 => 
            array (
                'id_parroquia' => 307,
                'id_municipio' => 98,
                'parroquia' => 'Manuel Manrique',
            ),
            307 => 
            array (
                'id_parroquia' => 308,
                'id_municipio' => 99,
                'parroquia' => 'General en Jefe José Laurencio Silva',
            ),
            308 => 
            array (
                'id_parroquia' => 309,
                'id_municipio' => 100,
                'parroquia' => 'Curiapo',
            ),
            309 => 
            array (
                'id_parroquia' => 310,
                'id_municipio' => 100,
                'parroquia' => 'Almirante Luis Brión',
            ),
            310 => 
            array (
                'id_parroquia' => 311,
                'id_municipio' => 100,
                'parroquia' => 'Francisco Aniceto Lugo',
            ),
            311 => 
            array (
                'id_parroquia' => 312,
                'id_municipio' => 100,
                'parroquia' => 'Manuel Renaud',
            ),
            312 => 
            array (
                'id_parroquia' => 313,
                'id_municipio' => 100,
                'parroquia' => 'Padre Barral',
            ),
            313 => 
            array (
                'id_parroquia' => 314,
                'id_municipio' => 100,
                'parroquia' => 'Santos de Abelgas',
            ),
            314 => 
            array (
                'id_parroquia' => 315,
                'id_municipio' => 101,
                'parroquia' => 'Imataca',
            ),
            315 => 
            array (
                'id_parroquia' => 316,
                'id_municipio' => 101,
                'parroquia' => 'Cinco de Julio',
            ),
            316 => 
            array (
                'id_parroquia' => 317,
                'id_municipio' => 101,
                'parroquia' => 'Juan Bautista Arismendi',
            ),
            317 => 
            array (
                'id_parroquia' => 318,
                'id_municipio' => 101,
                'parroquia' => 'Manuel Piar',
            ),
            318 => 
            array (
                'id_parroquia' => 319,
                'id_municipio' => 101,
                'parroquia' => 'Rómulo Gallegos',
            ),
            319 => 
            array (
                'id_parroquia' => 320,
                'id_municipio' => 102,
                'parroquia' => 'Pedernales',
            ),
            320 => 
            array (
                'id_parroquia' => 321,
                'id_municipio' => 102,
                'parroquia' => 'Luis Beltrán Prieto Figueroa',
            ),
            321 => 
            array (
                'id_parroquia' => 322,
                'id_municipio' => 103,
            'parroquia' => 'San José (Delta Amacuro)',
            ),
            322 => 
            array (
                'id_parroquia' => 323,
                'id_municipio' => 103,
                'parroquia' => 'José Vidal Marcano',
            ),
            323 => 
            array (
                'id_parroquia' => 324,
                'id_municipio' => 103,
                'parroquia' => 'Juan Millán',
            ),
            324 => 
            array (
                'id_parroquia' => 325,
                'id_municipio' => 103,
                'parroquia' => 'Leonardo Ruíz Pineda',
            ),
            325 => 
            array (
                'id_parroquia' => 326,
                'id_municipio' => 103,
                'parroquia' => 'Mariscal Antonio José de Sucre',
            ),
            326 => 
            array (
                'id_parroquia' => 327,
                'id_municipio' => 103,
                'parroquia' => 'Monseñor Argimiro García',
            ),
            327 => 
            array (
                'id_parroquia' => 328,
                'id_municipio' => 103,
            'parroquia' => 'San Rafael (Delta Amacuro)',
            ),
            328 => 
            array (
                'id_parroquia' => 329,
                'id_municipio' => 103,
                'parroquia' => 'Virgen del Valle',
            ),
            329 => 
            array (
                'id_parroquia' => 330,
                'id_municipio' => 10,
                'parroquia' => 'Clarines',
            ),
            330 => 
            array (
                'id_parroquia' => 331,
                'id_municipio' => 10,
                'parroquia' => 'Guanape',
            ),
            331 => 
            array (
                'id_parroquia' => 332,
                'id_municipio' => 10,
                'parroquia' => 'Sabana de Uchire',
            ),
            332 => 
            array (
                'id_parroquia' => 333,
                'id_municipio' => 104,
                'parroquia' => 'Capadare',
            ),
            333 => 
            array (
                'id_parroquia' => 334,
                'id_municipio' => 104,
                'parroquia' => 'La Pastora',
            ),
            334 => 
            array (
                'id_parroquia' => 335,
                'id_municipio' => 104,
                'parroquia' => 'Libertador',
            ),
            335 => 
            array (
                'id_parroquia' => 336,
                'id_municipio' => 104,
                'parroquia' => 'San Juan de los Cayos',
            ),
            336 => 
            array (
                'id_parroquia' => 337,
                'id_municipio' => 105,
                'parroquia' => 'Aracua',
            ),
            337 => 
            array (
                'id_parroquia' => 338,
                'id_municipio' => 105,
                'parroquia' => 'La Peña',
            ),
            338 => 
            array (
                'id_parroquia' => 339,
                'id_municipio' => 105,
                'parroquia' => 'San Luis',
            ),
            339 => 
            array (
                'id_parroquia' => 340,
                'id_municipio' => 106,
                'parroquia' => 'Bariro',
            ),
            340 => 
            array (
                'id_parroquia' => 341,
                'id_municipio' => 106,
                'parroquia' => 'Borojó',
            ),
            341 => 
            array (
                'id_parroquia' => 342,
                'id_municipio' => 106,
                'parroquia' => 'Capatárida',
            ),
            342 => 
            array (
                'id_parroquia' => 343,
                'id_municipio' => 106,
                'parroquia' => 'Guajiro',
            ),
            343 => 
            array (
                'id_parroquia' => 344,
                'id_municipio' => 106,
                'parroquia' => 'Seque',
            ),
            344 => 
            array (
                'id_parroquia' => 345,
                'id_municipio' => 106,
                'parroquia' => 'Zazárida',
            ),
            345 => 
            array (
                'id_parroquia' => 346,
                'id_municipio' => 106,
                'parroquia' => 'Valle de Eroa',
            ),
            346 => 
            array (
                'id_parroquia' => 347,
                'id_municipio' => 107,
                'parroquia' => 'Cacique Manaure',
            ),
            347 => 
            array (
                'id_parroquia' => 348,
                'id_municipio' => 108,
                'parroquia' => 'Norte',
            ),
            348 => 
            array (
                'id_parroquia' => 349,
                'id_municipio' => 108,
                'parroquia' => 'Carirubana',
            ),
            349 => 
            array (
                'id_parroquia' => 350,
                'id_municipio' => 108,
                'parroquia' => 'Santa Ana',
            ),
            350 => 
            array (
                'id_parroquia' => 351,
                'id_municipio' => 108,
                'parroquia' => 'Urbana Punta Cardón',
            ),
            351 => 
            array (
                'id_parroquia' => 352,
                'id_municipio' => 109,
                'parroquia' => 'La Vela de Coro',
            ),
            352 => 
            array (
                'id_parroquia' => 353,
                'id_municipio' => 109,
                'parroquia' => 'Acurigua',
            ),
            353 => 
            array (
                'id_parroquia' => 354,
                'id_municipio' => 109,
                'parroquia' => 'Guaibacoa',
            ),
            354 => 
            array (
                'id_parroquia' => 355,
                'id_municipio' => 109,
                'parroquia' => 'Las Calderas',
            ),
            355 => 
            array (
                'id_parroquia' => 356,
                'id_municipio' => 109,
                'parroquia' => 'Macoruca',
            ),
            356 => 
            array (
                'id_parroquia' => 357,
                'id_municipio' => 110,
                'parroquia' => 'Dabajuro',
            ),
            357 => 
            array (
                'id_parroquia' => 358,
                'id_municipio' => 111,
                'parroquia' => 'Agua Clara',
            ),
            358 => 
            array (
                'id_parroquia' => 359,
                'id_municipio' => 111,
                'parroquia' => 'Avaria',
            ),
            359 => 
            array (
                'id_parroquia' => 360,
                'id_municipio' => 111,
                'parroquia' => 'Pedregal',
            ),
            360 => 
            array (
                'id_parroquia' => 361,
                'id_municipio' => 111,
                'parroquia' => 'Piedra Grande',
            ),
            361 => 
            array (
                'id_parroquia' => 362,
                'id_municipio' => 111,
                'parroquia' => 'Purureche',
            ),
            362 => 
            array (
                'id_parroquia' => 363,
                'id_municipio' => 112,
                'parroquia' => 'Adaure',
            ),
            363 => 
            array (
                'id_parroquia' => 364,
                'id_municipio' => 112,
                'parroquia' => 'Adícora',
            ),
            364 => 
            array (
                'id_parroquia' => 365,
                'id_municipio' => 112,
                'parroquia' => 'Baraived',
            ),
            365 => 
            array (
                'id_parroquia' => 366,
                'id_municipio' => 112,
                'parroquia' => 'Buena Vista',
            ),
            366 => 
            array (
                'id_parroquia' => 367,
                'id_municipio' => 112,
                'parroquia' => 'Jadacaquiva',
            ),
            367 => 
            array (
                'id_parroquia' => 368,
                'id_municipio' => 112,
                'parroquia' => 'El Vínculo',
            ),
            368 => 
            array (
                'id_parroquia' => 369,
                'id_municipio' => 112,
                'parroquia' => 'El Hato',
            ),
            369 => 
            array (
                'id_parroquia' => 370,
                'id_municipio' => 112,
                'parroquia' => 'Moruy',
            ),
            370 => 
            array (
                'id_parroquia' => 371,
                'id_municipio' => 112,
                'parroquia' => 'Pueblo Nuevo',
            ),
            371 => 
            array (
                'id_parroquia' => 372,
                'id_municipio' => 113,
                'parroquia' => 'Agua Larga',
            ),
            372 => 
            array (
                'id_parroquia' => 373,
                'id_municipio' => 113,
                'parroquia' => 'El Paují',
            ),
            373 => 
            array (
                'id_parroquia' => 374,
                'id_municipio' => 113,
                'parroquia' => 'Independencia',
            ),
            374 => 
            array (
                'id_parroquia' => 375,
                'id_municipio' => 113,
                'parroquia' => 'Mapararí',
            ),
            375 => 
            array (
                'id_parroquia' => 376,
                'id_municipio' => 114,
                'parroquia' => 'Agua Linda',
            ),
            376 => 
            array (
                'id_parroquia' => 377,
                'id_municipio' => 114,
                'parroquia' => 'Araurima',
            ),
            377 => 
            array (
                'id_parroquia' => 378,
                'id_municipio' => 114,
                'parroquia' => 'Jacura',
            ),
            378 => 
            array (
                'id_parroquia' => 379,
                'id_municipio' => 115,
                'parroquia' => 'Tucacas',
            ),
            379 => 
            array (
                'id_parroquia' => 380,
                'id_municipio' => 115,
                'parroquia' => 'Boca de Aroa',
            ),
            380 => 
            array (
                'id_parroquia' => 381,
                'id_municipio' => 116,
                'parroquia' => 'Los Taques',
            ),
            381 => 
            array (
                'id_parroquia' => 382,
                'id_municipio' => 116,
                'parroquia' => 'Judibana',
            ),
            382 => 
            array (
                'id_parroquia' => 383,
                'id_municipio' => 117,
                'parroquia' => 'Mene de Mauroa',
            ),
            383 => 
            array (
                'id_parroquia' => 384,
                'id_municipio' => 117,
                'parroquia' => 'San Félix',
            ),
            384 => 
            array (
                'id_parroquia' => 385,
                'id_municipio' => 117,
                'parroquia' => 'Casigua',
            ),
            385 => 
            array (
                'id_parroquia' => 386,
                'id_municipio' => 118,
                'parroquia' => 'Guzmán Guillermo',
            ),
            386 => 
            array (
                'id_parroquia' => 387,
                'id_municipio' => 118,
                'parroquia' => 'Mitare',
            ),
            387 => 
            array (
                'id_parroquia' => 388,
                'id_municipio' => 118,
                'parroquia' => 'Río Seco',
            ),
            388 => 
            array (
                'id_parroquia' => 389,
                'id_municipio' => 118,
                'parroquia' => 'Sabaneta',
            ),
            389 => 
            array (
                'id_parroquia' => 390,
                'id_municipio' => 118,
                'parroquia' => 'San Antonio',
            ),
            390 => 
            array (
                'id_parroquia' => 391,
                'id_municipio' => 118,
                'parroquia' => 'San Gabriel',
            ),
            391 => 
            array (
                'id_parroquia' => 392,
                'id_municipio' => 118,
                'parroquia' => 'Santa Ana',
            ),
            392 => 
            array (
                'id_parroquia' => 393,
                'id_municipio' => 119,
                'parroquia' => 'Boca del Tocuyo',
            ),
            393 => 
            array (
                'id_parroquia' => 394,
                'id_municipio' => 119,
                'parroquia' => 'Chichiriviche',
            ),
            394 => 
            array (
                'id_parroquia' => 395,
                'id_municipio' => 119,
                'parroquia' => 'Tocuyo de la Costa',
            ),
            395 => 
            array (
                'id_parroquia' => 396,
                'id_municipio' => 120,
                'parroquia' => 'Palmasola',
            ),
            396 => 
            array (
                'id_parroquia' => 397,
                'id_municipio' => 121,
                'parroquia' => 'Cabure',
            ),
            397 => 
            array (
                'id_parroquia' => 398,
                'id_municipio' => 121,
                'parroquia' => 'Colina',
            ),
            398 => 
            array (
                'id_parroquia' => 399,
                'id_municipio' => 121,
                'parroquia' => 'Curimagua',
            ),
            399 => 
            array (
                'id_parroquia' => 400,
                'id_municipio' => 122,
                'parroquia' => 'San José de la Costa',
            ),
            400 => 
            array (
                'id_parroquia' => 401,
                'id_municipio' => 122,
                'parroquia' => 'Píritu',
            ),
            401 => 
            array (
                'id_parroquia' => 402,
                'id_municipio' => 123,
                'parroquia' => 'San Francisco',
            ),
            402 => 
            array (
                'id_parroquia' => 403,
                'id_municipio' => 124,
                'parroquia' => 'Sucre',
            ),
            403 => 
            array (
                'id_parroquia' => 404,
                'id_municipio' => 124,
                'parroquia' => 'Pecaya',
            ),
            404 => 
            array (
                'id_parroquia' => 405,
                'id_municipio' => 125,
                'parroquia' => 'Tocópero',
            ),
            405 => 
            array (
                'id_parroquia' => 406,
                'id_municipio' => 126,
                'parroquia' => 'El Charal',
            ),
            406 => 
            array (
                'id_parroquia' => 407,
                'id_municipio' => 126,
                'parroquia' => 'Las Vegas del Tuy',
            ),
            407 => 
            array (
                'id_parroquia' => 408,
                'id_municipio' => 126,
                'parroquia' => 'Santa Cruz de Bucaral',
            ),
            408 => 
            array (
                'id_parroquia' => 409,
                'id_municipio' => 127,
                'parroquia' => 'Bruzual',
            ),
            409 => 
            array (
                'id_parroquia' => 410,
                'id_municipio' => 127,
                'parroquia' => 'Urumaco',
            ),
            410 => 
            array (
                'id_parroquia' => 411,
                'id_municipio' => 128,
                'parroquia' => 'Puerto Cumarebo',
            ),
            411 => 
            array (
                'id_parroquia' => 412,
                'id_municipio' => 128,
                'parroquia' => 'La Ciénaga',
            ),
            412 => 
            array (
                'id_parroquia' => 413,
                'id_municipio' => 128,
                'parroquia' => 'La Soledad',
            ),
            413 => 
            array (
                'id_parroquia' => 414,
                'id_municipio' => 128,
                'parroquia' => 'Pueblo Cumarebo',
            ),
            414 => 
            array (
                'id_parroquia' => 415,
                'id_municipio' => 128,
                'parroquia' => 'Zazárida',
            ),
            415 => 
            array (
                'id_parroquia' => 416,
                'id_municipio' => 113,
                'parroquia' => 'Churuguara',
            ),
            416 => 
            array (
                'id_parroquia' => 417,
                'id_municipio' => 129,
                'parroquia' => 'Camaguán',
            ),
            417 => 
            array (
                'id_parroquia' => 418,
                'id_municipio' => 129,
                'parroquia' => 'Puerto Miranda',
            ),
            418 => 
            array (
                'id_parroquia' => 419,
                'id_municipio' => 129,
                'parroquia' => 'Uverito',
            ),
            419 => 
            array (
                'id_parroquia' => 420,
                'id_municipio' => 130,
                'parroquia' => 'Chaguaramas',
            ),
            420 => 
            array (
                'id_parroquia' => 421,
                'id_municipio' => 131,
                'parroquia' => 'El Socorro',
            ),
            421 => 
            array (
                'id_parroquia' => 422,
                'id_municipio' => 132,
                'parroquia' => 'Tucupido',
            ),
            422 => 
            array (
                'id_parroquia' => 423,
                'id_municipio' => 132,
                'parroquia' => 'San Rafael de Laya',
            ),
            423 => 
            array (
                'id_parroquia' => 424,
                'id_municipio' => 133,
                'parroquia' => 'Altagracia de Orituco',
            ),
            424 => 
            array (
                'id_parroquia' => 425,
                'id_municipio' => 133,
                'parroquia' => 'San Rafael de Orituco',
            ),
            425 => 
            array (
                'id_parroquia' => 426,
                'id_municipio' => 133,
                'parroquia' => 'San Francisco Javier de Lezama',
            ),
            426 => 
            array (
                'id_parroquia' => 427,
                'id_municipio' => 133,
                'parroquia' => 'Paso Real de Macaira',
            ),
            427 => 
            array (
                'id_parroquia' => 428,
                'id_municipio' => 133,
                'parroquia' => 'Carlos Soublette',
            ),
            428 => 
            array (
                'id_parroquia' => 429,
                'id_municipio' => 133,
                'parroquia' => 'San Francisco de Macaira',
            ),
            429 => 
            array (
                'id_parroquia' => 430,
                'id_municipio' => 133,
                'parroquia' => 'Libertad de Orituco',
            ),
            430 => 
            array (
                'id_parroquia' => 431,
                'id_municipio' => 134,
                'parroquia' => 'Cantaclaro',
            ),
            431 => 
            array (
                'id_parroquia' => 432,
                'id_municipio' => 134,
                'parroquia' => 'San Juan de los Morros',
            ),
            432 => 
            array (
                'id_parroquia' => 433,
                'id_municipio' => 134,
                'parroquia' => 'Parapara',
            ),
            433 => 
            array (
                'id_parroquia' => 434,
                'id_municipio' => 135,
                'parroquia' => 'El Sombrero',
            ),
            434 => 
            array (
                'id_parroquia' => 435,
                'id_municipio' => 135,
                'parroquia' => 'Sosa',
            ),
            435 => 
            array (
                'id_parroquia' => 436,
                'id_municipio' => 136,
                'parroquia' => 'Las Mercedes',
            ),
            436 => 
            array (
                'id_parroquia' => 437,
                'id_municipio' => 136,
                'parroquia' => 'Cabruta',
            ),
            437 => 
            array (
                'id_parroquia' => 438,
                'id_municipio' => 136,
                'parroquia' => 'Santa Rita de Manapire',
            ),
            438 => 
            array (
                'id_parroquia' => 439,
                'id_municipio' => 137,
                'parroquia' => 'Valle de la Pascua',
            ),
            439 => 
            array (
                'id_parroquia' => 440,
                'id_municipio' => 137,
                'parroquia' => 'Espino',
            ),
            440 => 
            array (
                'id_parroquia' => 441,
                'id_municipio' => 138,
                'parroquia' => 'San José de Unare',
            ),
            441 => 
            array (
                'id_parroquia' => 442,
                'id_municipio' => 138,
                'parroquia' => 'Zaraza',
            ),
            442 => 
            array (
                'id_parroquia' => 443,
                'id_municipio' => 139,
                'parroquia' => 'San José de Tiznados',
            ),
            443 => 
            array (
                'id_parroquia' => 444,
                'id_municipio' => 139,
                'parroquia' => 'San Francisco de Tiznados',
            ),
            444 => 
            array (
                'id_parroquia' => 445,
                'id_municipio' => 139,
                'parroquia' => 'San Lorenzo de Tiznados',
            ),
            445 => 
            array (
                'id_parroquia' => 446,
                'id_municipio' => 139,
                'parroquia' => 'Ortiz',
            ),
            446 => 
            array (
                'id_parroquia' => 447,
                'id_municipio' => 140,
                'parroquia' => 'Guayabal',
            ),
            447 => 
            array (
                'id_parroquia' => 448,
                'id_municipio' => 140,
                'parroquia' => 'Cazorla',
            ),
            448 => 
            array (
                'id_parroquia' => 449,
                'id_municipio' => 141,
                'parroquia' => 'San José de Guaribe',
            ),
            449 => 
            array (
                'id_parroquia' => 450,
                'id_municipio' => 141,
                'parroquia' => 'Uveral',
            ),
            450 => 
            array (
                'id_parroquia' => 451,
                'id_municipio' => 142,
                'parroquia' => 'Santa María de Ipire',
            ),
            451 => 
            array (
                'id_parroquia' => 452,
                'id_municipio' => 142,
                'parroquia' => 'Altamira',
            ),
            452 => 
            array (
                'id_parroquia' => 453,
                'id_municipio' => 143,
                'parroquia' => 'El Calvario',
            ),
            453 => 
            array (
                'id_parroquia' => 454,
                'id_municipio' => 143,
                'parroquia' => 'El Rastro',
            ),
            454 => 
            array (
                'id_parroquia' => 455,
                'id_municipio' => 143,
                'parroquia' => 'Guardatinajas',
            ),
            455 => 
            array (
                'id_parroquia' => 456,
                'id_municipio' => 143,
                'parroquia' => 'Capital Urbana Calabozo',
            ),
            456 => 
            array (
                'id_parroquia' => 457,
                'id_municipio' => 144,
                'parroquia' => 'Quebrada Honda de Guache',
            ),
            457 => 
            array (
                'id_parroquia' => 458,
                'id_municipio' => 144,
                'parroquia' => 'Pío Tamayo',
            ),
            458 => 
            array (
                'id_parroquia' => 459,
                'id_municipio' => 144,
                'parroquia' => 'Yacambú',
            ),
            459 => 
            array (
                'id_parroquia' => 460,
                'id_municipio' => 145,
                'parroquia' => 'Fréitez',
            ),
            460 => 
            array (
                'id_parroquia' => 461,
                'id_municipio' => 145,
                'parroquia' => 'José María Blanco',
            ),
            461 => 
            array (
                'id_parroquia' => 462,
                'id_municipio' => 146,
                'parroquia' => 'Catedral',
            ),
            462 => 
            array (
                'id_parroquia' => 463,
                'id_municipio' => 146,
                'parroquia' => 'Concepción',
            ),
            463 => 
            array (
                'id_parroquia' => 464,
                'id_municipio' => 146,
                'parroquia' => 'El Cují',
            ),
            464 => 
            array (
                'id_parroquia' => 465,
                'id_municipio' => 146,
                'parroquia' => 'Juan de Villegas',
            ),
            465 => 
            array (
                'id_parroquia' => 466,
                'id_municipio' => 146,
                'parroquia' => 'Santa Rosa',
            ),
            466 => 
            array (
                'id_parroquia' => 467,
                'id_municipio' => 146,
                'parroquia' => 'Tamaca',
            ),
            467 => 
            array (
                'id_parroquia' => 468,
                'id_municipio' => 146,
                'parroquia' => 'Unión',
            ),
            468 => 
            array (
                'id_parroquia' => 469,
                'id_municipio' => 146,
                'parroquia' => 'Aguedo Felipe Alvarado',
            ),
            469 => 
            array (
                'id_parroquia' => 470,
                'id_municipio' => 146,
                'parroquia' => 'Buena Vista',
            ),
            470 => 
            array (
                'id_parroquia' => 471,
                'id_municipio' => 146,
                'parroquia' => 'Juárez',
            ),
            471 => 
            array (
                'id_parroquia' => 472,
                'id_municipio' => 147,
                'parroquia' => 'Juan Bautista Rodríguez',
            ),
            472 => 
            array (
                'id_parroquia' => 473,
                'id_municipio' => 147,
                'parroquia' => 'Cuara',
            ),
            473 => 
            array (
                'id_parroquia' => 474,
                'id_municipio' => 147,
                'parroquia' => 'Diego de Lozada',
            ),
            474 => 
            array (
                'id_parroquia' => 475,
                'id_municipio' => 147,
                'parroquia' => 'Paraíso de San José',
            ),
            475 => 
            array (
                'id_parroquia' => 476,
                'id_municipio' => 147,
                'parroquia' => 'San Miguel',
            ),
            476 => 
            array (
                'id_parroquia' => 477,
                'id_municipio' => 147,
                'parroquia' => 'Tintorero',
            ),
            477 => 
            array (
                'id_parroquia' => 478,
                'id_municipio' => 147,
                'parroquia' => 'José Bernardo Dorante',
            ),
            478 => 
            array (
                'id_parroquia' => 479,
                'id_municipio' => 147,
                'parroquia' => 'Coronel Mariano Peraza ',
            ),
            479 => 
            array (
                'id_parroquia' => 480,
                'id_municipio' => 148,
                'parroquia' => 'Bolívar',
            ),
            480 => 
            array (
                'id_parroquia' => 481,
                'id_municipio' => 148,
                'parroquia' => 'Anzoátegui',
            ),
            481 => 
            array (
                'id_parroquia' => 482,
                'id_municipio' => 148,
                'parroquia' => 'Guarico',
            ),
            482 => 
            array (
                'id_parroquia' => 483,
                'id_municipio' => 148,
                'parroquia' => 'Hilario Luna y Luna',
            ),
            483 => 
            array (
                'id_parroquia' => 484,
                'id_municipio' => 148,
                'parroquia' => 'Humocaro Alto',
            ),
            484 => 
            array (
                'id_parroquia' => 485,
                'id_municipio' => 148,
                'parroquia' => 'Humocaro Bajo',
            ),
            485 => 
            array (
                'id_parroquia' => 486,
                'id_municipio' => 148,
                'parroquia' => 'La Candelaria',
            ),
            486 => 
            array (
                'id_parroquia' => 487,
                'id_municipio' => 148,
                'parroquia' => 'Morán',
            ),
            487 => 
            array (
                'id_parroquia' => 488,
                'id_municipio' => 149,
                'parroquia' => 'Cabudare',
            ),
            488 => 
            array (
                'id_parroquia' => 489,
                'id_municipio' => 149,
                'parroquia' => 'José Gregorio Bastidas',
            ),
            489 => 
            array (
                'id_parroquia' => 490,
                'id_municipio' => 149,
                'parroquia' => 'Agua Viva',
            ),
            490 => 
            array (
                'id_parroquia' => 491,
                'id_municipio' => 150,
                'parroquia' => 'Sarare',
            ),
            491 => 
            array (
                'id_parroquia' => 492,
                'id_municipio' => 150,
                'parroquia' => 'Buría',
            ),
            492 => 
            array (
                'id_parroquia' => 493,
                'id_municipio' => 150,
                'parroquia' => 'Gustavo Vegas León',
            ),
            493 => 
            array (
                'id_parroquia' => 494,
                'id_municipio' => 151,
                'parroquia' => 'Trinidad Samuel',
            ),
            494 => 
            array (
                'id_parroquia' => 495,
                'id_municipio' => 151,
                'parroquia' => 'Antonio Díaz',
            ),
            495 => 
            array (
                'id_parroquia' => 496,
                'id_municipio' => 151,
                'parroquia' => 'Camacaro',
            ),
            496 => 
            array (
                'id_parroquia' => 497,
                'id_municipio' => 151,
                'parroquia' => 'Castañeda',
            ),
            497 => 
            array (
                'id_parroquia' => 498,
                'id_municipio' => 151,
                'parroquia' => 'Cecilio Zubillaga',
            ),
            498 => 
            array (
                'id_parroquia' => 499,
                'id_municipio' => 151,
                'parroquia' => 'Chiquinquirá',
            ),
            499 => 
            array (
                'id_parroquia' => 500,
                'id_municipio' => 151,
                'parroquia' => 'El Blanco',
            ),
        ));
        \DB::table('parroquias')->insert(array (
            0 => 
            array (
                'id_parroquia' => 501,
                'id_municipio' => 151,
                'parroquia' => 'Espinoza de los Monteros',
            ),
            1 => 
            array (
                'id_parroquia' => 502,
                'id_municipio' => 151,
                'parroquia' => 'Lara',
            ),
            2 => 
            array (
                'id_parroquia' => 503,
                'id_municipio' => 151,
                'parroquia' => 'Las Mercedes',
            ),
            3 => 
            array (
                'id_parroquia' => 504,
                'id_municipio' => 151,
                'parroquia' => 'Manuel Morillo',
            ),
            4 => 
            array (
                'id_parroquia' => 505,
                'id_municipio' => 151,
                'parroquia' => 'Montaña Verde',
            ),
            5 => 
            array (
                'id_parroquia' => 506,
                'id_municipio' => 151,
                'parroquia' => 'Montes de Oca',
            ),
            6 => 
            array (
                'id_parroquia' => 507,
                'id_municipio' => 151,
                'parroquia' => 'Torres',
            ),
            7 => 
            array (
                'id_parroquia' => 508,
                'id_municipio' => 151,
                'parroquia' => 'Heriberto Arroyo',
            ),
            8 => 
            array (
                'id_parroquia' => 509,
                'id_municipio' => 151,
                'parroquia' => 'Reyes Vargas',
            ),
            9 => 
            array (
                'id_parroquia' => 510,
                'id_municipio' => 151,
                'parroquia' => 'Altagracia',
            ),
            10 => 
            array (
                'id_parroquia' => 511,
                'id_municipio' => 152,
                'parroquia' => 'Siquisique',
            ),
            11 => 
            array (
                'id_parroquia' => 512,
                'id_municipio' => 152,
                'parroquia' => 'Moroturo',
            ),
            12 => 
            array (
                'id_parroquia' => 513,
                'id_municipio' => 152,
                'parroquia' => 'San Miguel',
            ),
            13 => 
            array (
                'id_parroquia' => 514,
                'id_municipio' => 152,
                'parroquia' => 'Xaguas',
            ),
            14 => 
            array (
                'id_parroquia' => 515,
                'id_municipio' => 179,
                'parroquia' => 'Presidente Betancourt',
            ),
            15 => 
            array (
                'id_parroquia' => 516,
                'id_municipio' => 179,
                'parroquia' => 'Presidente Páez',
            ),
            16 => 
            array (
                'id_parroquia' => 517,
                'id_municipio' => 179,
                'parroquia' => 'Presidente Rómulo Gallegos',
            ),
            17 => 
            array (
                'id_parroquia' => 518,
                'id_municipio' => 179,
                'parroquia' => 'Gabriel Picón González',
            ),
            18 => 
            array (
                'id_parroquia' => 519,
                'id_municipio' => 179,
                'parroquia' => 'Héctor Amable Mora',
            ),
            19 => 
            array (
                'id_parroquia' => 520,
                'id_municipio' => 179,
                'parroquia' => 'José Nucete Sardi',
            ),
            20 => 
            array (
                'id_parroquia' => 521,
                'id_municipio' => 179,
                'parroquia' => 'Pulido Méndez',
            ),
            21 => 
            array (
                'id_parroquia' => 522,
                'id_municipio' => 180,
                'parroquia' => 'La Azulita',
            ),
            22 => 
            array (
                'id_parroquia' => 523,
                'id_municipio' => 181,
                'parroquia' => 'Santa Cruz de Mora',
            ),
            23 => 
            array (
                'id_parroquia' => 524,
                'id_municipio' => 181,
                'parroquia' => 'Mesa Bolívar',
            ),
            24 => 
            array (
                'id_parroquia' => 525,
                'id_municipio' => 181,
                'parroquia' => 'Mesa de Las Palmas',
            ),
            25 => 
            array (
                'id_parroquia' => 526,
                'id_municipio' => 182,
                'parroquia' => 'Aricagua',
            ),
            26 => 
            array (
                'id_parroquia' => 527,
                'id_municipio' => 182,
                'parroquia' => 'San Antonio',
            ),
            27 => 
            array (
                'id_parroquia' => 528,
                'id_municipio' => 183,
                'parroquia' => 'Canagua',
            ),
            28 => 
            array (
                'id_parroquia' => 529,
                'id_municipio' => 183,
                'parroquia' => 'Capurí',
            ),
            29 => 
            array (
                'id_parroquia' => 530,
                'id_municipio' => 183,
                'parroquia' => 'Chacantá',
            ),
            30 => 
            array (
                'id_parroquia' => 531,
                'id_municipio' => 183,
                'parroquia' => 'El Molino',
            ),
            31 => 
            array (
                'id_parroquia' => 532,
                'id_municipio' => 183,
                'parroquia' => 'Guaimaral',
            ),
            32 => 
            array (
                'id_parroquia' => 533,
                'id_municipio' => 183,
                'parroquia' => 'Mucutuy',
            ),
            33 => 
            array (
                'id_parroquia' => 534,
                'id_municipio' => 183,
                'parroquia' => 'Mucuchachí',
            ),
            34 => 
            array (
                'id_parroquia' => 535,
                'id_municipio' => 184,
                'parroquia' => 'Fernández Peña',
            ),
            35 => 
            array (
                'id_parroquia' => 536,
                'id_municipio' => 184,
                'parroquia' => 'Matriz',
            ),
            36 => 
            array (
                'id_parroquia' => 537,
                'id_municipio' => 184,
                'parroquia' => 'Montalbán',
            ),
            37 => 
            array (
                'id_parroquia' => 538,
                'id_municipio' => 184,
                'parroquia' => 'Acequias',
            ),
            38 => 
            array (
                'id_parroquia' => 539,
                'id_municipio' => 184,
                'parroquia' => 'Jají',
            ),
            39 => 
            array (
                'id_parroquia' => 540,
                'id_municipio' => 184,
                'parroquia' => 'La Mesa',
            ),
            40 => 
            array (
                'id_parroquia' => 541,
                'id_municipio' => 184,
                'parroquia' => 'San José del Sur',
            ),
            41 => 
            array (
                'id_parroquia' => 542,
                'id_municipio' => 185,
                'parroquia' => 'Tucaní',
            ),
            42 => 
            array (
                'id_parroquia' => 543,
                'id_municipio' => 185,
                'parroquia' => 'Florencio Ramírez',
            ),
            43 => 
            array (
                'id_parroquia' => 544,
                'id_municipio' => 186,
                'parroquia' => 'Santo Domingo',
            ),
            44 => 
            array (
                'id_parroquia' => 545,
                'id_municipio' => 186,
                'parroquia' => 'Las Piedras',
            ),
            45 => 
            array (
                'id_parroquia' => 546,
                'id_municipio' => 187,
                'parroquia' => 'Guaraque',
            ),
            46 => 
            array (
                'id_parroquia' => 547,
                'id_municipio' => 187,
                'parroquia' => 'Mesa de Quintero',
            ),
            47 => 
            array (
                'id_parroquia' => 548,
                'id_municipio' => 187,
                'parroquia' => 'Río Negro',
            ),
            48 => 
            array (
                'id_parroquia' => 549,
                'id_municipio' => 188,
                'parroquia' => 'Arapuey',
            ),
            49 => 
            array (
                'id_parroquia' => 550,
                'id_municipio' => 188,
                'parroquia' => 'Palmira',
            ),
            50 => 
            array (
                'id_parroquia' => 551,
                'id_municipio' => 189,
                'parroquia' => 'San Cristóbal de Torondoy',
            ),
            51 => 
            array (
                'id_parroquia' => 552,
                'id_municipio' => 189,
                'parroquia' => 'Torondoy',
            ),
            52 => 
            array (
                'id_parroquia' => 553,
                'id_municipio' => 190,
                'parroquia' => 'Antonio Spinetti Dini',
            ),
            53 => 
            array (
                'id_parroquia' => 554,
                'id_municipio' => 190,
                'parroquia' => 'Arias',
            ),
            54 => 
            array (
                'id_parroquia' => 555,
                'id_municipio' => 190,
                'parroquia' => 'Caracciolo Parra Pérez',
            ),
            55 => 
            array (
                'id_parroquia' => 556,
                'id_municipio' => 190,
                'parroquia' => 'Domingo Peña',
            ),
            56 => 
            array (
                'id_parroquia' => 557,
                'id_municipio' => 190,
                'parroquia' => 'El Llano',
            ),
            57 => 
            array (
                'id_parroquia' => 558,
                'id_municipio' => 190,
                'parroquia' => 'Gonzalo Picón Febres',
            ),
            58 => 
            array (
                'id_parroquia' => 559,
                'id_municipio' => 190,
                'parroquia' => 'Jacinto Plaza',
            ),
            59 => 
            array (
                'id_parroquia' => 560,
                'id_municipio' => 190,
                'parroquia' => 'Juan Rodríguez Suárez',
            ),
            60 => 
            array (
                'id_parroquia' => 561,
                'id_municipio' => 190,
                'parroquia' => 'Lasso de la Vega',
            ),
            61 => 
            array (
                'id_parroquia' => 562,
                'id_municipio' => 190,
                'parroquia' => 'Mariano Picón Salas',
            ),
            62 => 
            array (
                'id_parroquia' => 563,
                'id_municipio' => 190,
                'parroquia' => 'Milla',
            ),
            63 => 
            array (
                'id_parroquia' => 564,
                'id_municipio' => 190,
                'parroquia' => 'Osuna Rodríguez',
            ),
            64 => 
            array (
                'id_parroquia' => 565,
                'id_municipio' => 190,
                'parroquia' => 'Sagrario',
            ),
            65 => 
            array (
                'id_parroquia' => 566,
                'id_municipio' => 190,
                'parroquia' => 'El Morro',
            ),
            66 => 
            array (
                'id_parroquia' => 567,
                'id_municipio' => 190,
                'parroquia' => 'Los Nevados',
            ),
            67 => 
            array (
                'id_parroquia' => 568,
                'id_municipio' => 191,
                'parroquia' => 'Andrés Eloy Blanco',
            ),
            68 => 
            array (
                'id_parroquia' => 569,
                'id_municipio' => 191,
                'parroquia' => 'La Venta',
            ),
            69 => 
            array (
                'id_parroquia' => 570,
                'id_municipio' => 191,
                'parroquia' => 'Piñango',
            ),
            70 => 
            array (
                'id_parroquia' => 571,
                'id_municipio' => 191,
                'parroquia' => 'Timotes',
            ),
            71 => 
            array (
                'id_parroquia' => 572,
                'id_municipio' => 192,
                'parroquia' => 'Eloy Paredes',
            ),
            72 => 
            array (
                'id_parroquia' => 573,
                'id_municipio' => 192,
                'parroquia' => 'San Rafael de Alcázar',
            ),
            73 => 
            array (
                'id_parroquia' => 574,
                'id_municipio' => 192,
                'parroquia' => 'Santa Elena de Arenales',
            ),
            74 => 
            array (
                'id_parroquia' => 575,
                'id_municipio' => 193,
                'parroquia' => 'Santa María de Caparo',
            ),
            75 => 
            array (
                'id_parroquia' => 576,
                'id_municipio' => 194,
                'parroquia' => 'Pueblo Llano',
            ),
            76 => 
            array (
                'id_parroquia' => 577,
                'id_municipio' => 195,
                'parroquia' => 'Cacute',
            ),
            77 => 
            array (
                'id_parroquia' => 578,
                'id_municipio' => 195,
                'parroquia' => 'La Toma',
            ),
            78 => 
            array (
                'id_parroquia' => 579,
                'id_municipio' => 195,
                'parroquia' => 'Mucuchíes',
            ),
            79 => 
            array (
                'id_parroquia' => 580,
                'id_municipio' => 195,
                'parroquia' => 'Mucurubá',
            ),
            80 => 
            array (
                'id_parroquia' => 581,
                'id_municipio' => 195,
                'parroquia' => 'San Rafael',
            ),
            81 => 
            array (
                'id_parroquia' => 582,
                'id_municipio' => 196,
                'parroquia' => 'Gerónimo Maldonado',
            ),
            82 => 
            array (
                'id_parroquia' => 583,
                'id_municipio' => 196,
                'parroquia' => 'Bailadores',
            ),
            83 => 
            array (
                'id_parroquia' => 584,
                'id_municipio' => 197,
                'parroquia' => 'Tabay',
            ),
            84 => 
            array (
                'id_parroquia' => 585,
                'id_municipio' => 198,
                'parroquia' => 'Chiguará',
            ),
            85 => 
            array (
                'id_parroquia' => 586,
                'id_municipio' => 198,
                'parroquia' => 'Estánquez',
            ),
            86 => 
            array (
                'id_parroquia' => 587,
                'id_municipio' => 198,
                'parroquia' => 'Lagunillas',
            ),
            87 => 
            array (
                'id_parroquia' => 588,
                'id_municipio' => 198,
                'parroquia' => 'La Trampa',
            ),
            88 => 
            array (
                'id_parroquia' => 589,
                'id_municipio' => 198,
                'parroquia' => 'Pueblo Nuevo del Sur',
            ),
            89 => 
            array (
                'id_parroquia' => 590,
                'id_municipio' => 198,
                'parroquia' => 'San Juan',
            ),
            90 => 
            array (
                'id_parroquia' => 591,
                'id_municipio' => 199,
                'parroquia' => 'El Amparo',
            ),
            91 => 
            array (
                'id_parroquia' => 592,
                'id_municipio' => 199,
                'parroquia' => 'El Llano',
            ),
            92 => 
            array (
                'id_parroquia' => 593,
                'id_municipio' => 199,
                'parroquia' => 'San Francisco',
            ),
            93 => 
            array (
                'id_parroquia' => 594,
                'id_municipio' => 199,
                'parroquia' => 'Tovar',
            ),
            94 => 
            array (
                'id_parroquia' => 595,
                'id_municipio' => 200,
                'parroquia' => 'Independencia',
            ),
            95 => 
            array (
                'id_parroquia' => 596,
                'id_municipio' => 200,
                'parroquia' => 'María de la Concepción Palacios Blanco',
            ),
            96 => 
            array (
                'id_parroquia' => 597,
                'id_municipio' => 200,
                'parroquia' => 'Nueva Bolivia',
            ),
            97 => 
            array (
                'id_parroquia' => 598,
                'id_municipio' => 200,
                'parroquia' => 'Santa Apolonia',
            ),
            98 => 
            array (
                'id_parroquia' => 599,
                'id_municipio' => 201,
                'parroquia' => 'Caño El Tigre',
            ),
            99 => 
            array (
                'id_parroquia' => 600,
                'id_municipio' => 201,
                'parroquia' => 'Zea',
            ),
            100 => 
            array (
                'id_parroquia' => 601,
                'id_municipio' => 223,
                'parroquia' => 'Aragüita',
            ),
            101 => 
            array (
                'id_parroquia' => 602,
                'id_municipio' => 223,
                'parroquia' => 'Arévalo González',
            ),
            102 => 
            array (
                'id_parroquia' => 603,
                'id_municipio' => 223,
                'parroquia' => 'Capaya',
            ),
            103 => 
            array (
                'id_parroquia' => 604,
                'id_municipio' => 223,
                'parroquia' => 'Caucagua',
            ),
            104 => 
            array (
                'id_parroquia' => 605,
                'id_municipio' => 223,
                'parroquia' => 'Panaquire',
            ),
            105 => 
            array (
                'id_parroquia' => 606,
                'id_municipio' => 223,
                'parroquia' => 'Ribas',
            ),
            106 => 
            array (
                'id_parroquia' => 607,
                'id_municipio' => 223,
                'parroquia' => 'El Café',
            ),
            107 => 
            array (
                'id_parroquia' => 608,
                'id_municipio' => 223,
                'parroquia' => 'Marizapa',
            ),
            108 => 
            array (
                'id_parroquia' => 609,
                'id_municipio' => 224,
                'parroquia' => 'Cumbo',
            ),
            109 => 
            array (
                'id_parroquia' => 610,
                'id_municipio' => 224,
                'parroquia' => 'San José de Barlovento',
            ),
            110 => 
            array (
                'id_parroquia' => 611,
                'id_municipio' => 225,
                'parroquia' => 'El Cafetal',
            ),
            111 => 
            array (
                'id_parroquia' => 612,
                'id_municipio' => 225,
                'parroquia' => 'Las Minas',
            ),
            112 => 
            array (
                'id_parroquia' => 613,
                'id_municipio' => 225,
                'parroquia' => 'Nuestra Señora del Rosario',
            ),
            113 => 
            array (
                'id_parroquia' => 614,
                'id_municipio' => 226,
                'parroquia' => 'Higuerote',
            ),
            114 => 
            array (
                'id_parroquia' => 615,
                'id_municipio' => 226,
                'parroquia' => 'Curiepe',
            ),
            115 => 
            array (
                'id_parroquia' => 616,
                'id_municipio' => 226,
                'parroquia' => 'Tacarigua de Brión',
            ),
            116 => 
            array (
                'id_parroquia' => 617,
                'id_municipio' => 227,
                'parroquia' => 'Mamporal',
            ),
            117 => 
            array (
                'id_parroquia' => 618,
                'id_municipio' => 228,
                'parroquia' => 'Carrizal',
            ),
            118 => 
            array (
                'id_parroquia' => 619,
                'id_municipio' => 229,
                'parroquia' => 'Chacao',
            ),
            119 => 
            array (
                'id_parroquia' => 620,
                'id_municipio' => 230,
                'parroquia' => 'Charallave',
            ),
            120 => 
            array (
                'id_parroquia' => 621,
                'id_municipio' => 230,
                'parroquia' => 'Las Brisas',
            ),
            121 => 
            array (
                'id_parroquia' => 622,
                'id_municipio' => 231,
                'parroquia' => 'El Hatillo',
            ),
            122 => 
            array (
                'id_parroquia' => 623,
                'id_municipio' => 232,
                'parroquia' => 'Altagracia de la Montaña',
            ),
            123 => 
            array (
                'id_parroquia' => 624,
                'id_municipio' => 232,
                'parroquia' => 'Cecilio Acosta',
            ),
            124 => 
            array (
                'id_parroquia' => 625,
                'id_municipio' => 232,
                'parroquia' => 'Los Teques',
            ),
            125 => 
            array (
                'id_parroquia' => 626,
                'id_municipio' => 232,
                'parroquia' => 'El Jarillo',
            ),
            126 => 
            array (
                'id_parroquia' => 627,
                'id_municipio' => 232,
                'parroquia' => 'San Pedro',
            ),
            127 => 
            array (
                'id_parroquia' => 628,
                'id_municipio' => 232,
                'parroquia' => 'Tácata',
            ),
            128 => 
            array (
                'id_parroquia' => 629,
                'id_municipio' => 232,
                'parroquia' => 'Paracotos',
            ),
            129 => 
            array (
                'id_parroquia' => 630,
                'id_municipio' => 233,
                'parroquia' => 'Cartanal',
            ),
            130 => 
            array (
                'id_parroquia' => 631,
                'id_municipio' => 233,
                'parroquia' => 'Santa Teresa del Tuy',
            ),
            131 => 
            array (
                'id_parroquia' => 632,
                'id_municipio' => 234,
                'parroquia' => 'La Democracia',
            ),
            132 => 
            array (
                'id_parroquia' => 633,
                'id_municipio' => 234,
                'parroquia' => 'Ocumare del Tuy',
            ),
            133 => 
            array (
                'id_parroquia' => 634,
                'id_municipio' => 234,
                'parroquia' => 'Santa Bárbara',
            ),
            134 => 
            array (
                'id_parroquia' => 635,
                'id_municipio' => 235,
                'parroquia' => 'San Antonio de los Altos',
            ),
            135 => 
            array (
                'id_parroquia' => 636,
                'id_municipio' => 236,
                'parroquia' => 'Río Chico',
            ),
            136 => 
            array (
                'id_parroquia' => 637,
                'id_municipio' => 236,
                'parroquia' => 'El Guapo',
            ),
            137 => 
            array (
                'id_parroquia' => 638,
                'id_municipio' => 236,
                'parroquia' => 'Tacarigua de la Laguna',
            ),
            138 => 
            array (
                'id_parroquia' => 639,
                'id_municipio' => 236,
                'parroquia' => 'Paparo',
            ),
            139 => 
            array (
                'id_parroquia' => 640,
                'id_municipio' => 236,
                'parroquia' => 'San Fernando del Guapo',
            ),
            140 => 
            array (
                'id_parroquia' => 641,
                'id_municipio' => 237,
                'parroquia' => 'Santa Lucía del Tuy',
            ),
            141 => 
            array (
                'id_parroquia' => 642,
                'id_municipio' => 238,
                'parroquia' => 'Cúpira',
            ),
            142 => 
            array (
                'id_parroquia' => 643,
                'id_municipio' => 238,
                'parroquia' => 'Machurucuto',
            ),
            143 => 
            array (
                'id_parroquia' => 644,
                'id_municipio' => 239,
                'parroquia' => 'Guarenas',
            ),
            144 => 
            array (
                'id_parroquia' => 645,
                'id_municipio' => 240,
                'parroquia' => 'San Antonio de Yare',
            ),
            145 => 
            array (
                'id_parroquia' => 646,
                'id_municipio' => 240,
                'parroquia' => 'San Francisco de Yare',
            ),
            146 => 
            array (
                'id_parroquia' => 647,
                'id_municipio' => 241,
                'parroquia' => 'Leoncio Martínez',
            ),
            147 => 
            array (
                'id_parroquia' => 648,
                'id_municipio' => 241,
                'parroquia' => 'Petare',
            ),
            148 => 
            array (
                'id_parroquia' => 649,
                'id_municipio' => 241,
                'parroquia' => 'Caucagüita',
            ),
            149 => 
            array (
                'id_parroquia' => 650,
                'id_municipio' => 241,
                'parroquia' => 'Filas de Mariche',
            ),
            150 => 
            array (
                'id_parroquia' => 651,
                'id_municipio' => 241,
                'parroquia' => 'La Dolorita',
            ),
            151 => 
            array (
                'id_parroquia' => 652,
                'id_municipio' => 242,
                'parroquia' => 'Cúa',
            ),
            152 => 
            array (
                'id_parroquia' => 653,
                'id_municipio' => 242,
                'parroquia' => 'Nueva Cúa',
            ),
            153 => 
            array (
                'id_parroquia' => 654,
                'id_municipio' => 243,
                'parroquia' => 'Guatire',
            ),
            154 => 
            array (
                'id_parroquia' => 655,
                'id_municipio' => 243,
                'parroquia' => 'Bolívar',
            ),
            155 => 
            array (
                'id_parroquia' => 656,
                'id_municipio' => 258,
                'parroquia' => 'San Antonio de Maturín',
            ),
            156 => 
            array (
                'id_parroquia' => 657,
                'id_municipio' => 258,
                'parroquia' => 'San Francisco de Maturín',
            ),
            157 => 
            array (
                'id_parroquia' => 658,
                'id_municipio' => 259,
                'parroquia' => 'Aguasay',
            ),
            158 => 
            array (
                'id_parroquia' => 659,
                'id_municipio' => 260,
                'parroquia' => 'Caripito',
            ),
            159 => 
            array (
                'id_parroquia' => 660,
                'id_municipio' => 261,
                'parroquia' => 'El Guácharo',
            ),
            160 => 
            array (
                'id_parroquia' => 661,
                'id_municipio' => 261,
                'parroquia' => 'La Guanota',
            ),
            161 => 
            array (
                'id_parroquia' => 662,
                'id_municipio' => 261,
                'parroquia' => 'Sabana de Piedra',
            ),
            162 => 
            array (
                'id_parroquia' => 663,
                'id_municipio' => 261,
                'parroquia' => 'San Agustín',
            ),
            163 => 
            array (
                'id_parroquia' => 664,
                'id_municipio' => 261,
                'parroquia' => 'Teresen',
            ),
            164 => 
            array (
                'id_parroquia' => 665,
                'id_municipio' => 261,
                'parroquia' => 'Caripe',
            ),
            165 => 
            array (
                'id_parroquia' => 666,
                'id_municipio' => 262,
                'parroquia' => 'Areo',
            ),
            166 => 
            array (
                'id_parroquia' => 667,
                'id_municipio' => 262,
                'parroquia' => 'Capital Cedeño',
            ),
            167 => 
            array (
                'id_parroquia' => 668,
                'id_municipio' => 262,
                'parroquia' => 'San Félix de Cantalicio',
            ),
            168 => 
            array (
                'id_parroquia' => 669,
                'id_municipio' => 262,
                'parroquia' => 'Viento Fresco',
            ),
            169 => 
            array (
                'id_parroquia' => 670,
                'id_municipio' => 263,
                'parroquia' => 'El Tejero',
            ),
            170 => 
            array (
                'id_parroquia' => 671,
                'id_municipio' => 263,
                'parroquia' => 'Punta de Mata',
            ),
            171 => 
            array (
                'id_parroquia' => 672,
                'id_municipio' => 264,
                'parroquia' => 'Chaguaramas',
            ),
            172 => 
            array (
                'id_parroquia' => 673,
                'id_municipio' => 264,
                'parroquia' => 'Las Alhuacas',
            ),
            173 => 
            array (
                'id_parroquia' => 674,
                'id_municipio' => 264,
                'parroquia' => 'Tabasca',
            ),
            174 => 
            array (
                'id_parroquia' => 675,
                'id_municipio' => 264,
                'parroquia' => 'Temblador',
            ),
            175 => 
            array (
                'id_parroquia' => 676,
                'id_municipio' => 265,
                'parroquia' => 'Alto de los Godos',
            ),
            176 => 
            array (
                'id_parroquia' => 677,
                'id_municipio' => 265,
                'parroquia' => 'Boquerón',
            ),
            177 => 
            array (
                'id_parroquia' => 678,
                'id_municipio' => 265,
                'parroquia' => 'Las Cocuizas',
            ),
            178 => 
            array (
                'id_parroquia' => 679,
                'id_municipio' => 265,
                'parroquia' => 'La Cruz',
            ),
            179 => 
            array (
                'id_parroquia' => 680,
                'id_municipio' => 265,
                'parroquia' => 'San Simón',
            ),
            180 => 
            array (
                'id_parroquia' => 681,
                'id_municipio' => 265,
                'parroquia' => 'El Corozo',
            ),
            181 => 
            array (
                'id_parroquia' => 682,
                'id_municipio' => 265,
                'parroquia' => 'El Furrial',
            ),
            182 => 
            array (
                'id_parroquia' => 683,
                'id_municipio' => 265,
                'parroquia' => 'Jusepín',
            ),
            183 => 
            array (
                'id_parroquia' => 684,
                'id_municipio' => 265,
                'parroquia' => 'La Pica',
            ),
            184 => 
            array (
                'id_parroquia' => 685,
                'id_municipio' => 265,
                'parroquia' => 'San Vicente',
            ),
            185 => 
            array (
                'id_parroquia' => 686,
                'id_municipio' => 266,
                'parroquia' => 'Aparicio',
            ),
            186 => 
            array (
                'id_parroquia' => 687,
                'id_municipio' => 266,
                'parroquia' => 'Aragua de Maturín',
            ),
            187 => 
            array (
                'id_parroquia' => 688,
                'id_municipio' => 266,
                'parroquia' => 'Chaguamal',
            ),
            188 => 
            array (
                'id_parroquia' => 689,
                'id_municipio' => 266,
                'parroquia' => 'El Pinto',
            ),
            189 => 
            array (
                'id_parroquia' => 690,
                'id_municipio' => 266,
                'parroquia' => 'Guanaguana',
            ),
            190 => 
            array (
                'id_parroquia' => 691,
                'id_municipio' => 266,
                'parroquia' => 'La Toscana',
            ),
            191 => 
            array (
                'id_parroquia' => 692,
                'id_municipio' => 266,
                'parroquia' => 'Taguaya',
            ),
            192 => 
            array (
                'id_parroquia' => 693,
                'id_municipio' => 267,
                'parroquia' => 'Cachipo',
            ),
            193 => 
            array (
                'id_parroquia' => 694,
                'id_municipio' => 267,
                'parroquia' => 'Quiriquire',
            ),
            194 => 
            array (
                'id_parroquia' => 695,
                'id_municipio' => 268,
                'parroquia' => 'Santa Bárbara',
            ),
            195 => 
            array (
                'id_parroquia' => 696,
                'id_municipio' => 269,
                'parroquia' => 'Barrancas',
            ),
            196 => 
            array (
                'id_parroquia' => 697,
                'id_municipio' => 269,
                'parroquia' => 'Los Barrancos de Fajardo',
            ),
            197 => 
            array (
                'id_parroquia' => 698,
                'id_municipio' => 270,
                'parroquia' => 'Uracoa',
            ),
            198 => 
            array (
                'id_parroquia' => 699,
                'id_municipio' => 271,
                'parroquia' => 'Antolín del Campo',
            ),
            199 => 
            array (
                'id_parroquia' => 700,
                'id_municipio' => 272,
                'parroquia' => 'Arismendi',
            ),
            200 => 
            array (
                'id_parroquia' => 701,
                'id_municipio' => 273,
                'parroquia' => 'García',
            ),
            201 => 
            array (
                'id_parroquia' => 702,
                'id_municipio' => 273,
                'parroquia' => 'Francisco Fajardo',
            ),
            202 => 
            array (
                'id_parroquia' => 703,
                'id_municipio' => 274,
                'parroquia' => 'Bolívar',
            ),
            203 => 
            array (
                'id_parroquia' => 704,
                'id_municipio' => 274,
                'parroquia' => 'Guevara',
            ),
            204 => 
            array (
                'id_parroquia' => 705,
                'id_municipio' => 274,
                'parroquia' => 'Matasiete',
            ),
            205 => 
            array (
                'id_parroquia' => 706,
                'id_municipio' => 274,
                'parroquia' => 'Santa Ana',
            ),
            206 => 
            array (
                'id_parroquia' => 707,
                'id_municipio' => 274,
                'parroquia' => 'Sucre',
            ),
            207 => 
            array (
                'id_parroquia' => 708,
                'id_municipio' => 275,
                'parroquia' => 'Aguirre',
            ),
            208 => 
            array (
                'id_parroquia' => 709,
                'id_municipio' => 275,
                'parroquia' => 'Maneiro',
            ),
            209 => 
            array (
                'id_parroquia' => 710,
                'id_municipio' => 276,
                'parroquia' => 'Adrián',
            ),
            210 => 
            array (
                'id_parroquia' => 711,
                'id_municipio' => 276,
                'parroquia' => 'Juan Griego',
            ),
            211 => 
            array (
                'id_parroquia' => 712,
                'id_municipio' => 276,
                'parroquia' => 'Yaguaraparo',
            ),
            212 => 
            array (
                'id_parroquia' => 713,
                'id_municipio' => 277,
                'parroquia' => 'Porlamar',
            ),
            213 => 
            array (
                'id_parroquia' => 714,
                'id_municipio' => 278,
                'parroquia' => 'San Francisco de Macanao',
            ),
            214 => 
            array (
                'id_parroquia' => 715,
                'id_municipio' => 278,
                'parroquia' => 'Boca de Río',
            ),
            215 => 
            array (
                'id_parroquia' => 716,
                'id_municipio' => 279,
                'parroquia' => 'Tubores',
            ),
            216 => 
            array (
                'id_parroquia' => 717,
                'id_municipio' => 279,
                'parroquia' => 'Los Baleales',
            ),
            217 => 
            array (
                'id_parroquia' => 718,
                'id_municipio' => 280,
                'parroquia' => 'Vicente Fuentes',
            ),
            218 => 
            array (
                'id_parroquia' => 719,
                'id_municipio' => 280,
                'parroquia' => 'Villalba',
            ),
            219 => 
            array (
                'id_parroquia' => 720,
                'id_municipio' => 281,
                'parroquia' => 'San Juan Bautista',
            ),
            220 => 
            array (
                'id_parroquia' => 721,
                'id_municipio' => 281,
                'parroquia' => 'Zabala',
            ),
            221 => 
            array (
                'id_parroquia' => 722,
                'id_municipio' => 283,
                'parroquia' => 'Capital Araure',
            ),
            222 => 
            array (
                'id_parroquia' => 723,
                'id_municipio' => 283,
                'parroquia' => 'Río Acarigua',
            ),
            223 => 
            array (
                'id_parroquia' => 724,
                'id_municipio' => 284,
                'parroquia' => 'Capital Esteller',
            ),
            224 => 
            array (
                'id_parroquia' => 725,
                'id_municipio' => 284,
                'parroquia' => 'Uveral',
            ),
            225 => 
            array (
                'id_parroquia' => 726,
                'id_municipio' => 285,
                'parroquia' => 'Guanare',
            ),
            226 => 
            array (
                'id_parroquia' => 727,
                'id_municipio' => 285,
                'parroquia' => 'Córdoba',
            ),
            227 => 
            array (
                'id_parroquia' => 728,
                'id_municipio' => 285,
                'parroquia' => 'San José de la Montaña',
            ),
            228 => 
            array (
                'id_parroquia' => 729,
                'id_municipio' => 285,
                'parroquia' => 'San Juan de Guanaguanare',
            ),
            229 => 
            array (
                'id_parroquia' => 730,
                'id_municipio' => 285,
                'parroquia' => 'Virgen de la Coromoto',
            ),
            230 => 
            array (
                'id_parroquia' => 731,
                'id_municipio' => 286,
                'parroquia' => 'Guanarito',
            ),
            231 => 
            array (
                'id_parroquia' => 732,
                'id_municipio' => 286,
                'parroquia' => 'Trinidad de la Capilla',
            ),
            232 => 
            array (
                'id_parroquia' => 733,
                'id_municipio' => 286,
                'parroquia' => 'Divina Pastora',
            ),
            233 => 
            array (
                'id_parroquia' => 734,
                'id_municipio' => 287,
                'parroquia' => 'Monseñor José Vicente de Unda',
            ),
            234 => 
            array (
                'id_parroquia' => 735,
                'id_municipio' => 287,
                'parroquia' => 'Peña Blanca',
            ),
            235 => 
            array (
                'id_parroquia' => 736,
                'id_municipio' => 288,
                'parroquia' => 'Capital Ospino',
            ),
            236 => 
            array (
                'id_parroquia' => 737,
                'id_municipio' => 288,
                'parroquia' => 'Aparición',
            ),
            237 => 
            array (
                'id_parroquia' => 738,
                'id_municipio' => 288,
                'parroquia' => 'La Estación',
            ),
            238 => 
            array (
                'id_parroquia' => 739,
                'id_municipio' => 289,
                'parroquia' => 'Páez',
            ),
            239 => 
            array (
                'id_parroquia' => 740,
                'id_municipio' => 289,
                'parroquia' => 'Payara',
            ),
            240 => 
            array (
                'id_parroquia' => 741,
                'id_municipio' => 289,
                'parroquia' => 'Pimpinela',
            ),
            241 => 
            array (
                'id_parroquia' => 742,
                'id_municipio' => 289,
                'parroquia' => 'Ramón Peraza',
            ),
            242 => 
            array (
                'id_parroquia' => 743,
                'id_municipio' => 290,
                'parroquia' => 'Papelón',
            ),
            243 => 
            array (
                'id_parroquia' => 744,
                'id_municipio' => 290,
                'parroquia' => 'Caño Delgadito',
            ),
            244 => 
            array (
                'id_parroquia' => 745,
                'id_municipio' => 291,
                'parroquia' => 'San Genaro de Boconoito',
            ),
            245 => 
            array (
                'id_parroquia' => 746,
                'id_municipio' => 291,
                'parroquia' => 'Antolín Tovar',
            ),
            246 => 
            array (
                'id_parroquia' => 747,
                'id_municipio' => 292,
                'parroquia' => 'San Rafael de Onoto',
            ),
            247 => 
            array (
                'id_parroquia' => 748,
                'id_municipio' => 292,
                'parroquia' => 'Santa Fe',
            ),
            248 => 
            array (
                'id_parroquia' => 749,
                'id_municipio' => 292,
                'parroquia' => 'Thermo Morles',
            ),
            249 => 
            array (
                'id_parroquia' => 750,
                'id_municipio' => 293,
                'parroquia' => 'Santa Rosalía',
            ),
            250 => 
            array (
                'id_parroquia' => 751,
                'id_municipio' => 293,
                'parroquia' => 'Florida',
            ),
            251 => 
            array (
                'id_parroquia' => 752,
                'id_municipio' => 294,
                'parroquia' => 'Sucre',
            ),
            252 => 
            array (
                'id_parroquia' => 753,
                'id_municipio' => 294,
                'parroquia' => 'Concepción',
            ),
            253 => 
            array (
                'id_parroquia' => 754,
                'id_municipio' => 294,
                'parroquia' => 'San Rafael de Palo Alzado',
            ),
            254 => 
            array (
                'id_parroquia' => 755,
                'id_municipio' => 294,
                'parroquia' => 'Uvencio Antonio Velásquez',
            ),
            255 => 
            array (
                'id_parroquia' => 756,
                'id_municipio' => 294,
                'parroquia' => 'San José de Saguaz',
            ),
            256 => 
            array (
                'id_parroquia' => 757,
                'id_municipio' => 294,
                'parroquia' => 'Villa Rosa',
            ),
            257 => 
            array (
                'id_parroquia' => 758,
                'id_municipio' => 295,
                'parroquia' => 'Turén',
            ),
            258 => 
            array (
                'id_parroquia' => 759,
                'id_municipio' => 295,
                'parroquia' => 'Canelones',
            ),
            259 => 
            array (
                'id_parroquia' => 760,
                'id_municipio' => 295,
                'parroquia' => 'Santa Cruz',
            ),
            260 => 
            array (
                'id_parroquia' => 761,
                'id_municipio' => 295,
                'parroquia' => 'San Isidro Labrador',
            ),
            261 => 
            array (
                'id_parroquia' => 762,
                'id_municipio' => 296,
                'parroquia' => 'Mariño',
            ),
            262 => 
            array (
                'id_parroquia' => 763,
                'id_municipio' => 296,
                'parroquia' => 'Rómulo Gallegos',
            ),
            263 => 
            array (
                'id_parroquia' => 764,
                'id_municipio' => 297,
                'parroquia' => 'San José de Aerocuar',
            ),
            264 => 
            array (
                'id_parroquia' => 765,
                'id_municipio' => 297,
                'parroquia' => 'Tavera Acosta',
            ),
            265 => 
            array (
                'id_parroquia' => 766,
                'id_municipio' => 298,
                'parroquia' => 'Río Caribe',
            ),
            266 => 
            array (
                'id_parroquia' => 767,
                'id_municipio' => 298,
                'parroquia' => 'Antonio José de Sucre',
            ),
            267 => 
            array (
                'id_parroquia' => 768,
                'id_municipio' => 298,
                'parroquia' => 'El Morro de Puerto Santo',
            ),
            268 => 
            array (
                'id_parroquia' => 769,
                'id_municipio' => 298,
                'parroquia' => 'Puerto Santo',
            ),
            269 => 
            array (
                'id_parroquia' => 770,
                'id_municipio' => 298,
                'parroquia' => 'San Juan de las Galdonas',
            ),
            270 => 
            array (
                'id_parroquia' => 771,
                'id_municipio' => 299,
                'parroquia' => 'El Pilar',
            ),
            271 => 
            array (
                'id_parroquia' => 772,
                'id_municipio' => 299,
                'parroquia' => 'El Rincón',
            ),
            272 => 
            array (
                'id_parroquia' => 773,
                'id_municipio' => 299,
                'parroquia' => 'General Francisco Antonio Váquez',
            ),
            273 => 
            array (
                'id_parroquia' => 774,
                'id_municipio' => 299,
                'parroquia' => 'Guaraúnos',
            ),
            274 => 
            array (
                'id_parroquia' => 775,
                'id_municipio' => 299,
                'parroquia' => 'Tunapuicito',
            ),
            275 => 
            array (
                'id_parroquia' => 776,
                'id_municipio' => 299,
                'parroquia' => 'Unión',
            ),
            276 => 
            array (
                'id_parroquia' => 777,
                'id_municipio' => 300,
                'parroquia' => 'Santa Catalina',
            ),
            277 => 
            array (
                'id_parroquia' => 778,
                'id_municipio' => 300,
                'parroquia' => 'Santa Rosa',
            ),
            278 => 
            array (
                'id_parroquia' => 779,
                'id_municipio' => 300,
                'parroquia' => 'Santa Teresa',
            ),
            279 => 
            array (
                'id_parroquia' => 780,
                'id_municipio' => 300,
                'parroquia' => 'Bolívar',
            ),
            280 => 
            array (
                'id_parroquia' => 781,
                'id_municipio' => 300,
                'parroquia' => 'Maracapana',
            ),
            281 => 
            array (
                'id_parroquia' => 782,
                'id_municipio' => 302,
                'parroquia' => 'Libertad',
            ),
            282 => 
            array (
                'id_parroquia' => 783,
                'id_municipio' => 302,
                'parroquia' => 'El Paujil',
            ),
            283 => 
            array (
                'id_parroquia' => 784,
                'id_municipio' => 302,
                'parroquia' => 'Yaguaraparo',
            ),
            284 => 
            array (
                'id_parroquia' => 785,
                'id_municipio' => 303,
                'parroquia' => 'Cruz Salmerón Acosta',
            ),
            285 => 
            array (
                'id_parroquia' => 786,
                'id_municipio' => 303,
                'parroquia' => 'Chacopata',
            ),
            286 => 
            array (
                'id_parroquia' => 787,
                'id_municipio' => 303,
                'parroquia' => 'Manicuare',
            ),
            287 => 
            array (
                'id_parroquia' => 788,
                'id_municipio' => 304,
                'parroquia' => 'Tunapuy',
            ),
            288 => 
            array (
                'id_parroquia' => 789,
                'id_municipio' => 304,
                'parroquia' => 'Campo Elías',
            ),
            289 => 
            array (
                'id_parroquia' => 790,
                'id_municipio' => 305,
                'parroquia' => 'Irapa',
            ),
            290 => 
            array (
                'id_parroquia' => 791,
                'id_municipio' => 305,
                'parroquia' => 'Campo Claro',
            ),
            291 => 
            array (
                'id_parroquia' => 792,
                'id_municipio' => 305,
                'parroquia' => 'Maraval',
            ),
            292 => 
            array (
                'id_parroquia' => 793,
                'id_municipio' => 305,
                'parroquia' => 'San Antonio de Irapa',
            ),
            293 => 
            array (
                'id_parroquia' => 794,
                'id_municipio' => 305,
                'parroquia' => 'Soro',
            ),
            294 => 
            array (
                'id_parroquia' => 795,
                'id_municipio' => 306,
                'parroquia' => 'Mejía',
            ),
            295 => 
            array (
                'id_parroquia' => 796,
                'id_municipio' => 307,
                'parroquia' => 'Cumanacoa',
            ),
            296 => 
            array (
                'id_parroquia' => 797,
                'id_municipio' => 307,
                'parroquia' => 'Arenas',
            ),
            297 => 
            array (
                'id_parroquia' => 798,
                'id_municipio' => 307,
                'parroquia' => 'Aricagua',
            ),
            298 => 
            array (
                'id_parroquia' => 799,
                'id_municipio' => 307,
                'parroquia' => 'Cogollar',
            ),
            299 => 
            array (
                'id_parroquia' => 800,
                'id_municipio' => 307,
                'parroquia' => 'San Fernando',
            ),
            300 => 
            array (
                'id_parroquia' => 801,
                'id_municipio' => 307,
                'parroquia' => 'San Lorenzo',
            ),
            301 => 
            array (
                'id_parroquia' => 802,
                'id_municipio' => 308,
            'parroquia' => 'Villa Frontado (Muelle de Cariaco)',
            ),
            302 => 
            array (
                'id_parroquia' => 803,
                'id_municipio' => 308,
                'parroquia' => 'Catuaro',
            ),
            303 => 
            array (
                'id_parroquia' => 804,
                'id_municipio' => 308,
                'parroquia' => 'Rendón',
            ),
            304 => 
            array (
                'id_parroquia' => 805,
                'id_municipio' => 308,
                'parroquia' => 'San Cruz',
            ),
            305 => 
            array (
                'id_parroquia' => 806,
                'id_municipio' => 308,
                'parroquia' => 'Santa María',
            ),
            306 => 
            array (
                'id_parroquia' => 807,
                'id_municipio' => 309,
                'parroquia' => 'Altagracia',
            ),
            307 => 
            array (
                'id_parroquia' => 808,
                'id_municipio' => 309,
                'parroquia' => 'Santa Inés',
            ),
            308 => 
            array (
                'id_parroquia' => 809,
                'id_municipio' => 309,
                'parroquia' => 'Valentín Valiente',
            ),
            309 => 
            array (
                'id_parroquia' => 810,
                'id_municipio' => 309,
                'parroquia' => 'Ayacucho',
            ),
            310 => 
            array (
                'id_parroquia' => 811,
                'id_municipio' => 309,
                'parroquia' => 'San Juan',
            ),
            311 => 
            array (
                'id_parroquia' => 812,
                'id_municipio' => 309,
                'parroquia' => 'Raúl Leoni',
            ),
            312 => 
            array (
                'id_parroquia' => 813,
                'id_municipio' => 309,
                'parroquia' => 'Gran Mariscal',
            ),
            313 => 
            array (
                'id_parroquia' => 814,
                'id_municipio' => 310,
                'parroquia' => 'Cristóbal Colón',
            ),
            314 => 
            array (
                'id_parroquia' => 815,
                'id_municipio' => 310,
                'parroquia' => 'Bideau',
            ),
            315 => 
            array (
                'id_parroquia' => 816,
                'id_municipio' => 310,
                'parroquia' => 'Punta de Piedras',
            ),
            316 => 
            array (
                'id_parroquia' => 817,
                'id_municipio' => 310,
                'parroquia' => 'Güiria',
            ),
            317 => 
            array (
                'id_parroquia' => 818,
                'id_municipio' => 341,
                'parroquia' => 'Andrés Bello',
            ),
            318 => 
            array (
                'id_parroquia' => 819,
                'id_municipio' => 342,
                'parroquia' => 'Antonio Rómulo Costa',
            ),
            319 => 
            array (
                'id_parroquia' => 820,
                'id_municipio' => 343,
                'parroquia' => 'Ayacucho',
            ),
            320 => 
            array (
                'id_parroquia' => 821,
                'id_municipio' => 343,
                'parroquia' => 'Rivas Berti',
            ),
            321 => 
            array (
                'id_parroquia' => 822,
                'id_municipio' => 343,
                'parroquia' => 'San Pedro del Río',
            ),
            322 => 
            array (
                'id_parroquia' => 823,
                'id_municipio' => 344,
                'parroquia' => 'Bolívar',
            ),
            323 => 
            array (
                'id_parroquia' => 824,
                'id_municipio' => 344,
                'parroquia' => 'Palotal',
            ),
            324 => 
            array (
                'id_parroquia' => 825,
                'id_municipio' => 344,
                'parroquia' => 'General Juan Vicente Gómez',
            ),
            325 => 
            array (
                'id_parroquia' => 826,
                'id_municipio' => 344,
                'parroquia' => 'Isaías Medina Angarita',
            ),
            326 => 
            array (
                'id_parroquia' => 827,
                'id_municipio' => 345,
                'parroquia' => 'Cárdenas',
            ),
            327 => 
            array (
                'id_parroquia' => 828,
                'id_municipio' => 345,
                'parroquia' => 'Amenodoro Ángel Lamus',
            ),
            328 => 
            array (
                'id_parroquia' => 829,
                'id_municipio' => 345,
                'parroquia' => 'La Florida',
            ),
            329 => 
            array (
                'id_parroquia' => 830,
                'id_municipio' => 346,
                'parroquia' => 'Córdoba',
            ),
            330 => 
            array (
                'id_parroquia' => 831,
                'id_municipio' => 347,
                'parroquia' => 'Fernández Feo',
            ),
            331 => 
            array (
                'id_parroquia' => 832,
                'id_municipio' => 347,
                'parroquia' => 'Alberto Adriani',
            ),
            332 => 
            array (
                'id_parroquia' => 833,
                'id_municipio' => 347,
                'parroquia' => 'Santo Domingo',
            ),
            333 => 
            array (
                'id_parroquia' => 834,
                'id_municipio' => 348,
                'parroquia' => 'Francisco de Miranda',
            ),
            334 => 
            array (
                'id_parroquia' => 835,
                'id_municipio' => 349,
                'parroquia' => 'García de Hevia',
            ),
            335 => 
            array (
                'id_parroquia' => 836,
                'id_municipio' => 349,
                'parroquia' => 'Boca de Grita',
            ),
            336 => 
            array (
                'id_parroquia' => 837,
                'id_municipio' => 349,
                'parroquia' => 'José Antonio Páez',
            ),
            337 => 
            array (
                'id_parroquia' => 838,
                'id_municipio' => 350,
                'parroquia' => 'Guásimos',
            ),
            338 => 
            array (
                'id_parroquia' => 839,
                'id_municipio' => 351,
                'parroquia' => 'Independencia',
            ),
            339 => 
            array (
                'id_parroquia' => 840,
                'id_municipio' => 351,
                'parroquia' => 'Juan Germán Roscio',
            ),
            340 => 
            array (
                'id_parroquia' => 841,
                'id_municipio' => 351,
                'parroquia' => 'Román Cárdenas',
            ),
            341 => 
            array (
                'id_parroquia' => 842,
                'id_municipio' => 352,
                'parroquia' => 'Jáuregui',
            ),
            342 => 
            array (
                'id_parroquia' => 843,
                'id_municipio' => 352,
                'parroquia' => 'Emilio Constantino Guerrero',
            ),
            343 => 
            array (
                'id_parroquia' => 844,
                'id_municipio' => 352,
                'parroquia' => 'Monseñor Miguel Antonio Salas',
            ),
            344 => 
            array (
                'id_parroquia' => 845,
                'id_municipio' => 353,
                'parroquia' => 'José María Vargas',
            ),
            345 => 
            array (
                'id_parroquia' => 846,
                'id_municipio' => 354,
                'parroquia' => 'Junín',
            ),
            346 => 
            array (
                'id_parroquia' => 847,
                'id_municipio' => 354,
                'parroquia' => 'La Petrólea',
            ),
            347 => 
            array (
                'id_parroquia' => 848,
                'id_municipio' => 354,
                'parroquia' => 'Quinimarí',
            ),
            348 => 
            array (
                'id_parroquia' => 849,
                'id_municipio' => 354,
                'parroquia' => 'Bramón',
            ),
            349 => 
            array (
                'id_parroquia' => 850,
                'id_municipio' => 355,
                'parroquia' => 'Libertad',
            ),
            350 => 
            array (
                'id_parroquia' => 851,
                'id_municipio' => 355,
                'parroquia' => 'Cipriano Castro',
            ),
            351 => 
            array (
                'id_parroquia' => 852,
                'id_municipio' => 355,
                'parroquia' => 'Manuel Felipe Rugeles',
            ),
            352 => 
            array (
                'id_parroquia' => 853,
                'id_municipio' => 356,
                'parroquia' => 'Libertador',
            ),
            353 => 
            array (
                'id_parroquia' => 854,
                'id_municipio' => 356,
                'parroquia' => 'Doradas',
            ),
            354 => 
            array (
                'id_parroquia' => 855,
                'id_municipio' => 356,
                'parroquia' => 'Emeterio Ochoa',
            ),
            355 => 
            array (
                'id_parroquia' => 856,
                'id_municipio' => 356,
                'parroquia' => 'San Joaquín de Navay',
            ),
            356 => 
            array (
                'id_parroquia' => 857,
                'id_municipio' => 357,
                'parroquia' => 'Lobatera',
            ),
            357 => 
            array (
                'id_parroquia' => 858,
                'id_municipio' => 357,
                'parroquia' => 'Constitución',
            ),
            358 => 
            array (
                'id_parroquia' => 859,
                'id_municipio' => 358,
                'parroquia' => 'Michelena',
            ),
            359 => 
            array (
                'id_parroquia' => 860,
                'id_municipio' => 359,
                'parroquia' => 'Panamericano',
            ),
            360 => 
            array (
                'id_parroquia' => 861,
                'id_municipio' => 359,
                'parroquia' => 'La Palmita',
            ),
            361 => 
            array (
                'id_parroquia' => 862,
                'id_municipio' => 360,
                'parroquia' => 'Pedro María Ureña',
            ),
            362 => 
            array (
                'id_parroquia' => 863,
                'id_municipio' => 360,
                'parroquia' => 'Nueva Arcadia',
            ),
            363 => 
            array (
                'id_parroquia' => 864,
                'id_municipio' => 361,
                'parroquia' => 'Delicias',
            ),
            364 => 
            array (
                'id_parroquia' => 865,
                'id_municipio' => 361,
                'parroquia' => 'Pecaya',
            ),
            365 => 
            array (
                'id_parroquia' => 866,
                'id_municipio' => 362,
                'parroquia' => 'Samuel Darío Maldonado',
            ),
            366 => 
            array (
                'id_parroquia' => 867,
                'id_municipio' => 362,
                'parroquia' => 'Boconó',
            ),
            367 => 
            array (
                'id_parroquia' => 868,
                'id_municipio' => 362,
                'parroquia' => 'Hernández',
            ),
            368 => 
            array (
                'id_parroquia' => 869,
                'id_municipio' => 363,
                'parroquia' => 'La Concordia',
            ),
            369 => 
            array (
                'id_parroquia' => 870,
                'id_municipio' => 363,
                'parroquia' => 'San Juan Bautista',
            ),
            370 => 
            array (
                'id_parroquia' => 871,
                'id_municipio' => 363,
                'parroquia' => 'Pedro María Morantes',
            ),
            371 => 
            array (
                'id_parroquia' => 872,
                'id_municipio' => 363,
                'parroquia' => 'San Sebastián',
            ),
            372 => 
            array (
                'id_parroquia' => 873,
                'id_municipio' => 363,
                'parroquia' => 'Dr. Francisco Romero Lobo',
            ),
            373 => 
            array (
                'id_parroquia' => 874,
                'id_municipio' => 364,
                'parroquia' => 'Seboruco',
            ),
            374 => 
            array (
                'id_parroquia' => 875,
                'id_municipio' => 365,
                'parroquia' => 'Simón Rodríguez',
            ),
            375 => 
            array (
                'id_parroquia' => 876,
                'id_municipio' => 366,
                'parroquia' => 'Sucre',
            ),
            376 => 
            array (
                'id_parroquia' => 877,
                'id_municipio' => 366,
                'parroquia' => 'Eleazar López Contreras',
            ),
            377 => 
            array (
                'id_parroquia' => 878,
                'id_municipio' => 366,
                'parroquia' => 'San Pablo',
            ),
            378 => 
            array (
                'id_parroquia' => 879,
                'id_municipio' => 367,
                'parroquia' => 'Torbes',
            ),
            379 => 
            array (
                'id_parroquia' => 880,
                'id_municipio' => 368,
                'parroquia' => 'Uribante',
            ),
            380 => 
            array (
                'id_parroquia' => 881,
                'id_municipio' => 368,
                'parroquia' => 'Cárdenas',
            ),
            381 => 
            array (
                'id_parroquia' => 882,
                'id_municipio' => 368,
                'parroquia' => 'Juan Pablo Peñalosa',
            ),
            382 => 
            array (
                'id_parroquia' => 883,
                'id_municipio' => 368,
                'parroquia' => 'Potosí',
            ),
            383 => 
            array (
                'id_parroquia' => 884,
                'id_municipio' => 369,
                'parroquia' => 'San Judas Tadeo',
            ),
            384 => 
            array (
                'id_parroquia' => 885,
                'id_municipio' => 370,
                'parroquia' => 'Araguaney',
            ),
            385 => 
            array (
                'id_parroquia' => 886,
                'id_municipio' => 370,
                'parroquia' => 'El Jaguito',
            ),
            386 => 
            array (
                'id_parroquia' => 887,
                'id_municipio' => 370,
                'parroquia' => 'La Esperanza',
            ),
            387 => 
            array (
                'id_parroquia' => 888,
                'id_municipio' => 370,
                'parroquia' => 'Santa Isabel',
            ),
            388 => 
            array (
                'id_parroquia' => 889,
                'id_municipio' => 371,
                'parroquia' => 'Boconó',
            ),
            389 => 
            array (
                'id_parroquia' => 890,
                'id_municipio' => 371,
                'parroquia' => 'El Carmen',
            ),
            390 => 
            array (
                'id_parroquia' => 891,
                'id_municipio' => 371,
                'parroquia' => 'Mosquey',
            ),
            391 => 
            array (
                'id_parroquia' => 892,
                'id_municipio' => 371,
                'parroquia' => 'Ayacucho',
            ),
            392 => 
            array (
                'id_parroquia' => 893,
                'id_municipio' => 371,
                'parroquia' => 'Burbusay',
            ),
            393 => 
            array (
                'id_parroquia' => 894,
                'id_municipio' => 371,
                'parroquia' => 'General Ribas',
            ),
            394 => 
            array (
                'id_parroquia' => 895,
                'id_municipio' => 371,
                'parroquia' => 'Guaramacal',
            ),
            395 => 
            array (
                'id_parroquia' => 896,
                'id_municipio' => 371,
                'parroquia' => 'Vega de Guaramacal',
            ),
            396 => 
            array (
                'id_parroquia' => 897,
                'id_municipio' => 371,
                'parroquia' => 'Monseñor Jáuregui',
            ),
            397 => 
            array (
                'id_parroquia' => 898,
                'id_municipio' => 371,
                'parroquia' => 'Rafael Rangel',
            ),
            398 => 
            array (
                'id_parroquia' => 899,
                'id_municipio' => 371,
                'parroquia' => 'San Miguel',
            ),
            399 => 
            array (
                'id_parroquia' => 900,
                'id_municipio' => 371,
                'parroquia' => 'San José',
            ),
            400 => 
            array (
                'id_parroquia' => 901,
                'id_municipio' => 372,
                'parroquia' => 'Sabana Grande',
            ),
            401 => 
            array (
                'id_parroquia' => 902,
                'id_municipio' => 372,
                'parroquia' => 'Cheregüé',
            ),
            402 => 
            array (
                'id_parroquia' => 903,
                'id_municipio' => 372,
                'parroquia' => 'Granados',
            ),
            403 => 
            array (
                'id_parroquia' => 904,
                'id_municipio' => 373,
                'parroquia' => 'Arnoldo Gabaldón',
            ),
            404 => 
            array (
                'id_parroquia' => 905,
                'id_municipio' => 373,
                'parroquia' => 'Bolivia',
            ),
            405 => 
            array (
                'id_parroquia' => 906,
                'id_municipio' => 373,
                'parroquia' => 'Carrillo',
            ),
            406 => 
            array (
                'id_parroquia' => 907,
                'id_municipio' => 373,
                'parroquia' => 'Cegarra',
            ),
            407 => 
            array (
                'id_parroquia' => 908,
                'id_municipio' => 373,
                'parroquia' => 'Chejendé',
            ),
            408 => 
            array (
                'id_parroquia' => 909,
                'id_municipio' => 373,
                'parroquia' => 'Manuel Salvador Ulloa',
            ),
            409 => 
            array (
                'id_parroquia' => 910,
                'id_municipio' => 373,
                'parroquia' => 'San José',
            ),
            410 => 
            array (
                'id_parroquia' => 911,
                'id_municipio' => 374,
                'parroquia' => 'Carache',
            ),
            411 => 
            array (
                'id_parroquia' => 912,
                'id_municipio' => 374,
                'parroquia' => 'La Concepción',
            ),
            412 => 
            array (
                'id_parroquia' => 913,
                'id_municipio' => 374,
                'parroquia' => 'Cuicas',
            ),
            413 => 
            array (
                'id_parroquia' => 914,
                'id_municipio' => 374,
                'parroquia' => 'Panamericana',
            ),
            414 => 
            array (
                'id_parroquia' => 915,
                'id_municipio' => 374,
                'parroquia' => 'Santa Cruz',
            ),
            415 => 
            array (
                'id_parroquia' => 916,
                'id_municipio' => 375,
                'parroquia' => 'Escuque',
            ),
            416 => 
            array (
                'id_parroquia' => 917,
                'id_municipio' => 375,
                'parroquia' => 'La Unión',
            ),
            417 => 
            array (
                'id_parroquia' => 918,
                'id_municipio' => 375,
                'parroquia' => 'Santa Rita',
            ),
            418 => 
            array (
                'id_parroquia' => 919,
                'id_municipio' => 375,
                'parroquia' => 'Sabana Libre',
            ),
            419 => 
            array (
                'id_parroquia' => 920,
                'id_municipio' => 376,
                'parroquia' => 'El Socorro',
            ),
            420 => 
            array (
                'id_parroquia' => 921,
                'id_municipio' => 376,
                'parroquia' => 'Los Caprichos',
            ),
            421 => 
            array (
                'id_parroquia' => 922,
                'id_municipio' => 376,
                'parroquia' => 'Antonio José de Sucre',
            ),
            422 => 
            array (
                'id_parroquia' => 923,
                'id_municipio' => 377,
                'parroquia' => 'Campo Elías',
            ),
            423 => 
            array (
                'id_parroquia' => 924,
                'id_municipio' => 377,
                'parroquia' => 'Arnoldo Gabaldón',
            ),
            424 => 
            array (
                'id_parroquia' => 925,
                'id_municipio' => 378,
                'parroquia' => 'Santa Apolonia',
            ),
            425 => 
            array (
                'id_parroquia' => 926,
                'id_municipio' => 378,
                'parroquia' => 'El Progreso',
            ),
            426 => 
            array (
                'id_parroquia' => 927,
                'id_municipio' => 378,
                'parroquia' => 'La Ceiba',
            ),
            427 => 
            array (
                'id_parroquia' => 928,
                'id_municipio' => 378,
                'parroquia' => 'Tres de Febrero',
            ),
            428 => 
            array (
                'id_parroquia' => 929,
                'id_municipio' => 379,
                'parroquia' => 'El Dividive',
            ),
            429 => 
            array (
                'id_parroquia' => 930,
                'id_municipio' => 379,
                'parroquia' => 'Agua Santa',
            ),
            430 => 
            array (
                'id_parroquia' => 931,
                'id_municipio' => 379,
                'parroquia' => 'Agua Caliente',
            ),
            431 => 
            array (
                'id_parroquia' => 932,
                'id_municipio' => 379,
                'parroquia' => 'El Cenizo',
            ),
            432 => 
            array (
                'id_parroquia' => 933,
                'id_municipio' => 379,
                'parroquia' => 'Valerita',
            ),
            433 => 
            array (
                'id_parroquia' => 934,
                'id_municipio' => 380,
                'parroquia' => 'Monte Carmelo',
            ),
            434 => 
            array (
                'id_parroquia' => 935,
                'id_municipio' => 380,
                'parroquia' => 'Buena Vista',
            ),
            435 => 
            array (
                'id_parroquia' => 936,
                'id_municipio' => 380,
                'parroquia' => 'Santa María del Horcón',
            ),
            436 => 
            array (
                'id_parroquia' => 937,
                'id_municipio' => 381,
                'parroquia' => 'Motatán',
            ),
            437 => 
            array (
                'id_parroquia' => 938,
                'id_municipio' => 381,
                'parroquia' => 'El Baño',
            ),
            438 => 
            array (
                'id_parroquia' => 939,
                'id_municipio' => 381,
                'parroquia' => 'Jalisco',
            ),
            439 => 
            array (
                'id_parroquia' => 940,
                'id_municipio' => 382,
                'parroquia' => 'Pampán',
            ),
            440 => 
            array (
                'id_parroquia' => 941,
                'id_municipio' => 382,
                'parroquia' => 'Flor de Patria',
            ),
            441 => 
            array (
                'id_parroquia' => 942,
                'id_municipio' => 382,
                'parroquia' => 'La Paz',
            ),
            442 => 
            array (
                'id_parroquia' => 943,
                'id_municipio' => 382,
                'parroquia' => 'Santa Ana',
            ),
            443 => 
            array (
                'id_parroquia' => 944,
                'id_municipio' => 383,
                'parroquia' => 'Pampanito',
            ),
            444 => 
            array (
                'id_parroquia' => 945,
                'id_municipio' => 383,
                'parroquia' => 'La Concepción',
            ),
            445 => 
            array (
                'id_parroquia' => 946,
                'id_municipio' => 383,
                'parroquia' => 'Pampanito II',
            ),
            446 => 
            array (
                'id_parroquia' => 947,
                'id_municipio' => 384,
                'parroquia' => 'Betijoque',
            ),
            447 => 
            array (
                'id_parroquia' => 948,
                'id_municipio' => 384,
                'parroquia' => 'José Gregorio Hernández',
            ),
            448 => 
            array (
                'id_parroquia' => 949,
                'id_municipio' => 384,
                'parroquia' => 'La Pueblita',
            ),
            449 => 
            array (
                'id_parroquia' => 950,
                'id_municipio' => 384,
                'parroquia' => 'Los Cedros',
            ),
            450 => 
            array (
                'id_parroquia' => 951,
                'id_municipio' => 385,
                'parroquia' => 'Carvajal',
            ),
            451 => 
            array (
                'id_parroquia' => 952,
                'id_municipio' => 385,
                'parroquia' => 'Campo Alegre',
            ),
            452 => 
            array (
                'id_parroquia' => 953,
                'id_municipio' => 385,
                'parroquia' => 'Antonio Nicolás Briceño',
            ),
            453 => 
            array (
                'id_parroquia' => 954,
                'id_municipio' => 385,
                'parroquia' => 'José Leonardo Suárez',
            ),
            454 => 
            array (
                'id_parroquia' => 955,
                'id_municipio' => 386,
                'parroquia' => 'Sabana de Mendoza',
            ),
            455 => 
            array (
                'id_parroquia' => 956,
                'id_municipio' => 386,
                'parroquia' => 'Junín',
            ),
            456 => 
            array (
                'id_parroquia' => 957,
                'id_municipio' => 386,
                'parroquia' => 'Valmore Rodríguez',
            ),
            457 => 
            array (
                'id_parroquia' => 958,
                'id_municipio' => 386,
                'parroquia' => 'El Paraíso',
            ),
            458 => 
            array (
                'id_parroquia' => 959,
                'id_municipio' => 387,
                'parroquia' => 'Andrés Linares',
            ),
            459 => 
            array (
                'id_parroquia' => 960,
                'id_municipio' => 387,
                'parroquia' => 'Chiquinquirá',
            ),
            460 => 
            array (
                'id_parroquia' => 961,
                'id_municipio' => 387,
                'parroquia' => 'Cristóbal Mendoza',
            ),
            461 => 
            array (
                'id_parroquia' => 962,
                'id_municipio' => 387,
                'parroquia' => 'Cruz Carrillo',
            ),
            462 => 
            array (
                'id_parroquia' => 963,
                'id_municipio' => 387,
                'parroquia' => 'Matriz',
            ),
            463 => 
            array (
                'id_parroquia' => 964,
                'id_municipio' => 387,
                'parroquia' => 'Monseñor Carrillo',
            ),
            464 => 
            array (
                'id_parroquia' => 965,
                'id_municipio' => 387,
                'parroquia' => 'Tres Esquinas',
            ),
            465 => 
            array (
                'id_parroquia' => 966,
                'id_municipio' => 388,
                'parroquia' => 'Cabimbú',
            ),
            466 => 
            array (
                'id_parroquia' => 967,
                'id_municipio' => 388,
                'parroquia' => 'Jajó',
            ),
            467 => 
            array (
                'id_parroquia' => 968,
                'id_municipio' => 388,
                'parroquia' => 'La Mesa de Esnujaque',
            ),
            468 => 
            array (
                'id_parroquia' => 969,
                'id_municipio' => 388,
                'parroquia' => 'Santiago',
            ),
            469 => 
            array (
                'id_parroquia' => 970,
                'id_municipio' => 388,
                'parroquia' => 'Tuñame',
            ),
            470 => 
            array (
                'id_parroquia' => 971,
                'id_municipio' => 388,
                'parroquia' => 'La Quebrada',
            ),
            471 => 
            array (
                'id_parroquia' => 972,
                'id_municipio' => 389,
                'parroquia' => 'Juan Ignacio Montilla',
            ),
            472 => 
            array (
                'id_parroquia' => 973,
                'id_municipio' => 389,
                'parroquia' => 'La Beatriz',
            ),
            473 => 
            array (
                'id_parroquia' => 974,
                'id_municipio' => 389,
                'parroquia' => 'La Puerta',
            ),
            474 => 
            array (
                'id_parroquia' => 975,
                'id_municipio' => 389,
                'parroquia' => 'Mendoza del Valle de Momboy',
            ),
            475 => 
            array (
                'id_parroquia' => 976,
                'id_municipio' => 389,
                'parroquia' => 'Mercedes Díaz',
            ),
            476 => 
            array (
                'id_parroquia' => 977,
                'id_municipio' => 389,
                'parroquia' => 'San Luis',
            ),
            477 => 
            array (
                'id_parroquia' => 978,
                'id_municipio' => 390,
                'parroquia' => 'Caraballeda',
            ),
            478 => 
            array (
                'id_parroquia' => 979,
                'id_municipio' => 390,
                'parroquia' => 'Carayaca',
            ),
            479 => 
            array (
                'id_parroquia' => 980,
                'id_municipio' => 390,
                'parroquia' => 'Carlos Soublette',
            ),
            480 => 
            array (
                'id_parroquia' => 981,
                'id_municipio' => 390,
                'parroquia' => 'Caruao Chuspa',
            ),
            481 => 
            array (
                'id_parroquia' => 982,
                'id_municipio' => 390,
                'parroquia' => 'Catia La Mar',
            ),
            482 => 
            array (
                'id_parroquia' => 983,
                'id_municipio' => 390,
                'parroquia' => 'El Junko',
            ),
            483 => 
            array (
                'id_parroquia' => 984,
                'id_municipio' => 390,
                'parroquia' => 'La Guaira',
            ),
            484 => 
            array (
                'id_parroquia' => 985,
                'id_municipio' => 390,
                'parroquia' => 'Macuto',
            ),
            485 => 
            array (
                'id_parroquia' => 986,
                'id_municipio' => 390,
                'parroquia' => 'Maiquetía',
            ),
            486 => 
            array (
                'id_parroquia' => 987,
                'id_municipio' => 390,
                'parroquia' => 'Naiguatá',
            ),
            487 => 
            array (
                'id_parroquia' => 988,
                'id_municipio' => 390,
                'parroquia' => 'Urimare',
            ),
            488 => 
            array (
                'id_parroquia' => 989,
                'id_municipio' => 391,
                'parroquia' => 'Arístides Bastidas',
            ),
            489 => 
            array (
                'id_parroquia' => 990,
                'id_municipio' => 392,
                'parroquia' => 'Bolívar',
            ),
            490 => 
            array (
                'id_parroquia' => 991,
                'id_municipio' => 407,
                'parroquia' => 'Chivacoa',
            ),
            491 => 
            array (
                'id_parroquia' => 992,
                'id_municipio' => 407,
                'parroquia' => 'Campo Elías',
            ),
            492 => 
            array (
                'id_parroquia' => 993,
                'id_municipio' => 408,
                'parroquia' => 'Cocorote',
            ),
            493 => 
            array (
                'id_parroquia' => 994,
                'id_municipio' => 409,
                'parroquia' => 'Independencia',
            ),
            494 => 
            array (
                'id_parroquia' => 995,
                'id_municipio' => 410,
                'parroquia' => 'José Antonio Páez',
            ),
            495 => 
            array (
                'id_parroquia' => 996,
                'id_municipio' => 411,
                'parroquia' => 'La Trinidad',
            ),
            496 => 
            array (
                'id_parroquia' => 997,
                'id_municipio' => 412,
                'parroquia' => 'Manuel Monge',
            ),
            497 => 
            array (
                'id_parroquia' => 998,
                'id_municipio' => 413,
                'parroquia' => 'Salóm',
            ),
            498 => 
            array (
                'id_parroquia' => 999,
                'id_municipio' => 413,
                'parroquia' => 'Temerla',
            ),
            499 => 
            array (
                'id_parroquia' => 1000,
                'id_municipio' => 413,
                'parroquia' => 'Nirgua',
            ),
        ));
        \DB::table('parroquias')->insert(array (
            0 => 
            array (
                'id_parroquia' => 1001,
                'id_municipio' => 414,
                'parroquia' => 'San Andrés',
            ),
            1 => 
            array (
                'id_parroquia' => 1002,
                'id_municipio' => 414,
                'parroquia' => 'Yaritagua',
            ),
            2 => 
            array (
                'id_parroquia' => 1003,
                'id_municipio' => 415,
                'parroquia' => 'San Javier',
            ),
            3 => 
            array (
                'id_parroquia' => 1004,
                'id_municipio' => 415,
                'parroquia' => 'Albarico',
            ),
            4 => 
            array (
                'id_parroquia' => 1005,
                'id_municipio' => 415,
                'parroquia' => 'San Felipe',
            ),
            5 => 
            array (
                'id_parroquia' => 1006,
                'id_municipio' => 416,
                'parroquia' => 'Sucre',
            ),
            6 => 
            array (
                'id_parroquia' => 1007,
                'id_municipio' => 417,
                'parroquia' => 'Urachiche',
            ),
            7 => 
            array (
                'id_parroquia' => 1008,
                'id_municipio' => 418,
                'parroquia' => 'El Guayabo',
            ),
            8 => 
            array (
                'id_parroquia' => 1009,
                'id_municipio' => 418,
                'parroquia' => 'Farriar',
            ),
            9 => 
            array (
                'id_parroquia' => 1010,
                'id_municipio' => 441,
                'parroquia' => 'Isla de Toas',
            ),
            10 => 
            array (
                'id_parroquia' => 1011,
                'id_municipio' => 441,
                'parroquia' => 'Monagas',
            ),
            11 => 
            array (
                'id_parroquia' => 1012,
                'id_municipio' => 442,
                'parroquia' => 'San Timoteo',
            ),
            12 => 
            array (
                'id_parroquia' => 1013,
                'id_municipio' => 442,
                'parroquia' => 'General Urdaneta',
            ),
            13 => 
            array (
                'id_parroquia' => 1014,
                'id_municipio' => 442,
                'parroquia' => 'Libertador',
            ),
            14 => 
            array (
                'id_parroquia' => 1015,
                'id_municipio' => 442,
                'parroquia' => 'Marcelino Briceño',
            ),
            15 => 
            array (
                'id_parroquia' => 1016,
                'id_municipio' => 442,
                'parroquia' => 'Pueblo Nuevo',
            ),
            16 => 
            array (
                'id_parroquia' => 1017,
                'id_municipio' => 442,
                'parroquia' => 'Manuel Guanipa Matos',
            ),
            17 => 
            array (
                'id_parroquia' => 1018,
                'id_municipio' => 443,
                'parroquia' => 'Ambrosio',
            ),
            18 => 
            array (
                'id_parroquia' => 1019,
                'id_municipio' => 443,
                'parroquia' => 'Carmen Herrera',
            ),
            19 => 
            array (
                'id_parroquia' => 1020,
                'id_municipio' => 443,
                'parroquia' => 'La Rosa',
            ),
            20 => 
            array (
                'id_parroquia' => 1021,
                'id_municipio' => 443,
                'parroquia' => 'Germán Ríos Linares',
            ),
            21 => 
            array (
                'id_parroquia' => 1022,
                'id_municipio' => 443,
                'parroquia' => 'San Benito',
            ),
            22 => 
            array (
                'id_parroquia' => 1023,
                'id_municipio' => 443,
                'parroquia' => 'Rómulo Betancourt',
            ),
            23 => 
            array (
                'id_parroquia' => 1024,
                'id_municipio' => 443,
                'parroquia' => 'Jorge Hernández',
            ),
            24 => 
            array (
                'id_parroquia' => 1025,
                'id_municipio' => 443,
                'parroquia' => 'Punta Gorda',
            ),
            25 => 
            array (
                'id_parroquia' => 1026,
                'id_municipio' => 443,
                'parroquia' => 'Arístides Calvani',
            ),
            26 => 
            array (
                'id_parroquia' => 1027,
                'id_municipio' => 444,
                'parroquia' => 'Encontrados',
            ),
            27 => 
            array (
                'id_parroquia' => 1028,
                'id_municipio' => 444,
                'parroquia' => 'Udón Pérez',
            ),
            28 => 
            array (
                'id_parroquia' => 1029,
                'id_municipio' => 445,
                'parroquia' => 'Moralito',
            ),
            29 => 
            array (
                'id_parroquia' => 1030,
                'id_municipio' => 445,
                'parroquia' => 'San Carlos del Zulia',
            ),
            30 => 
            array (
                'id_parroquia' => 1031,
                'id_municipio' => 445,
                'parroquia' => 'Santa Cruz del Zulia',
            ),
            31 => 
            array (
                'id_parroquia' => 1032,
                'id_municipio' => 445,
                'parroquia' => 'Santa Bárbara',
            ),
            32 => 
            array (
                'id_parroquia' => 1033,
                'id_municipio' => 445,
                'parroquia' => 'Urribarrí',
            ),
            33 => 
            array (
                'id_parroquia' => 1034,
                'id_municipio' => 446,
                'parroquia' => 'Carlos Quevedo',
            ),
            34 => 
            array (
                'id_parroquia' => 1035,
                'id_municipio' => 446,
                'parroquia' => 'Francisco Javier Pulgar',
            ),
            35 => 
            array (
                'id_parroquia' => 1036,
                'id_municipio' => 446,
                'parroquia' => 'Simón Rodríguez',
            ),
            36 => 
            array (
                'id_parroquia' => 1037,
                'id_municipio' => 446,
                'parroquia' => 'Guamo-Gavilanes',
            ),
            37 => 
            array (
                'id_parroquia' => 1038,
                'id_municipio' => 448,
                'parroquia' => 'La Concepción',
            ),
            38 => 
            array (
                'id_parroquia' => 1039,
                'id_municipio' => 448,
                'parroquia' => 'San José',
            ),
            39 => 
            array (
                'id_parroquia' => 1040,
                'id_municipio' => 448,
                'parroquia' => 'Mariano Parra León',
            ),
            40 => 
            array (
                'id_parroquia' => 1041,
                'id_municipio' => 448,
                'parroquia' => 'José Ramón Yépez',
            ),
            41 => 
            array (
                'id_parroquia' => 1042,
                'id_municipio' => 449,
                'parroquia' => 'Jesús María Semprún',
            ),
            42 => 
            array (
                'id_parroquia' => 1043,
                'id_municipio' => 449,
                'parroquia' => 'Barí',
            ),
            43 => 
            array (
                'id_parroquia' => 1044,
                'id_municipio' => 450,
                'parroquia' => 'Concepción',
            ),
            44 => 
            array (
                'id_parroquia' => 1045,
                'id_municipio' => 450,
                'parroquia' => 'Andrés Bello',
            ),
            45 => 
            array (
                'id_parroquia' => 1046,
                'id_municipio' => 450,
                'parroquia' => 'Chiquinquirá',
            ),
            46 => 
            array (
                'id_parroquia' => 1047,
                'id_municipio' => 450,
                'parroquia' => 'El Carmelo',
            ),
            47 => 
            array (
                'id_parroquia' => 1048,
                'id_municipio' => 450,
                'parroquia' => 'Potreritos',
            ),
            48 => 
            array (
                'id_parroquia' => 1049,
                'id_municipio' => 451,
                'parroquia' => 'Libertad',
            ),
            49 => 
            array (
                'id_parroquia' => 1050,
                'id_municipio' => 451,
                'parroquia' => 'Alonso de Ojeda',
            ),
            50 => 
            array (
                'id_parroquia' => 1051,
                'id_municipio' => 451,
                'parroquia' => 'Venezuela',
            ),
            51 => 
            array (
                'id_parroquia' => 1052,
                'id_municipio' => 451,
                'parroquia' => 'Eleazar López Contreras',
            ),
            52 => 
            array (
                'id_parroquia' => 1053,
                'id_municipio' => 451,
                'parroquia' => 'Campo Lara',
            ),
            53 => 
            array (
                'id_parroquia' => 1054,
                'id_municipio' => 452,
                'parroquia' => 'Bartolomé de las Casas',
            ),
            54 => 
            array (
                'id_parroquia' => 1055,
                'id_municipio' => 452,
                'parroquia' => 'Libertad',
            ),
            55 => 
            array (
                'id_parroquia' => 1056,
                'id_municipio' => 452,
                'parroquia' => 'Río Negro',
            ),
            56 => 
            array (
                'id_parroquia' => 1057,
                'id_municipio' => 452,
                'parroquia' => 'San José de Perijá',
            ),
            57 => 
            array (
                'id_parroquia' => 1058,
                'id_municipio' => 453,
                'parroquia' => 'San Rafael',
            ),
            58 => 
            array (
                'id_parroquia' => 1059,
                'id_municipio' => 453,
                'parroquia' => 'La Sierrita',
            ),
            59 => 
            array (
                'id_parroquia' => 1060,
                'id_municipio' => 453,
                'parroquia' => 'Las Parcelas',
            ),
            60 => 
            array (
                'id_parroquia' => 1061,
                'id_municipio' => 453,
                'parroquia' => 'Luis de Vicente',
            ),
            61 => 
            array (
                'id_parroquia' => 1062,
                'id_municipio' => 453,
                'parroquia' => 'Monseñor Marcos Sergio Godoy',
            ),
            62 => 
            array (
                'id_parroquia' => 1063,
                'id_municipio' => 453,
                'parroquia' => 'Ricaurte',
            ),
            63 => 
            array (
                'id_parroquia' => 1064,
                'id_municipio' => 453,
                'parroquia' => 'Tamare',
            ),
            64 => 
            array (
                'id_parroquia' => 1065,
                'id_municipio' => 454,
                'parroquia' => 'Antonio Borjas Romero',
            ),
            65 => 
            array (
                'id_parroquia' => 1066,
                'id_municipio' => 454,
                'parroquia' => 'Bolívar',
            ),
            66 => 
            array (
                'id_parroquia' => 1067,
                'id_municipio' => 454,
                'parroquia' => 'Cacique Mara',
            ),
            67 => 
            array (
                'id_parroquia' => 1068,
                'id_municipio' => 454,
                'parroquia' => 'Carracciolo Parra Pérez',
            ),
            68 => 
            array (
                'id_parroquia' => 1069,
                'id_municipio' => 454,
                'parroquia' => 'Cecilio Acosta',
            ),
            69 => 
            array (
                'id_parroquia' => 1070,
                'id_municipio' => 454,
                'parroquia' => 'Cristo de Aranza',
            ),
            70 => 
            array (
                'id_parroquia' => 1071,
                'id_municipio' => 454,
                'parroquia' => 'Coquivacoa',
            ),
            71 => 
            array (
                'id_parroquia' => 1072,
                'id_municipio' => 454,
                'parroquia' => 'Chiquinquirá',
            ),
            72 => 
            array (
                'id_parroquia' => 1073,
                'id_municipio' => 454,
                'parroquia' => 'Francisco Eugenio Bustamante',
            ),
            73 => 
            array (
                'id_parroquia' => 1074,
                'id_municipio' => 454,
                'parroquia' => 'Idelfonzo Vásquez',
            ),
            74 => 
            array (
                'id_parroquia' => 1075,
                'id_municipio' => 454,
                'parroquia' => 'Juana de Ávila',
            ),
            75 => 
            array (
                'id_parroquia' => 1076,
                'id_municipio' => 454,
                'parroquia' => 'Luis Hurtado Higuera',
            ),
            76 => 
            array (
                'id_parroquia' => 1077,
                'id_municipio' => 454,
                'parroquia' => 'Manuel Dagnino',
            ),
            77 => 
            array (
                'id_parroquia' => 1078,
                'id_municipio' => 454,
                'parroquia' => 'Olegario Villalobos',
            ),
            78 => 
            array (
                'id_parroquia' => 1079,
                'id_municipio' => 454,
                'parroquia' => 'Raúl Leoni',
            ),
            79 => 
            array (
                'id_parroquia' => 1080,
                'id_municipio' => 454,
                'parroquia' => 'Santa Lucía',
            ),
            80 => 
            array (
                'id_parroquia' => 1081,
                'id_municipio' => 454,
                'parroquia' => 'Venancio Pulgar',
            ),
            81 => 
            array (
                'id_parroquia' => 1082,
                'id_municipio' => 454,
                'parroquia' => 'San Isidro',
            ),
            82 => 
            array (
                'id_parroquia' => 1083,
                'id_municipio' => 455,
                'parroquia' => 'Altagracia',
            ),
            83 => 
            array (
                'id_parroquia' => 1084,
                'id_municipio' => 455,
                'parroquia' => 'Faría',
            ),
            84 => 
            array (
                'id_parroquia' => 1085,
                'id_municipio' => 455,
                'parroquia' => 'Ana María Campos',
            ),
            85 => 
            array (
                'id_parroquia' => 1086,
                'id_municipio' => 455,
                'parroquia' => 'San Antonio',
            ),
            86 => 
            array (
                'id_parroquia' => 1087,
                'id_municipio' => 455,
                'parroquia' => 'San José',
            ),
            87 => 
            array (
                'id_parroquia' => 1088,
                'id_municipio' => 456,
                'parroquia' => 'Donaldo García',
            ),
            88 => 
            array (
                'id_parroquia' => 1089,
                'id_municipio' => 456,
                'parroquia' => 'El Rosario',
            ),
            89 => 
            array (
                'id_parroquia' => 1090,
                'id_municipio' => 456,
                'parroquia' => 'Sixto Zambrano',
            ),
            90 => 
            array (
                'id_parroquia' => 1091,
                'id_municipio' => 457,
                'parroquia' => 'San Francisco',
            ),
            91 => 
            array (
                'id_parroquia' => 1092,
                'id_municipio' => 457,
                'parroquia' => 'El Bajo',
            ),
            92 => 
            array (
                'id_parroquia' => 1093,
                'id_municipio' => 457,
                'parroquia' => 'Domitila Flores',
            ),
            93 => 
            array (
                'id_parroquia' => 1094,
                'id_municipio' => 457,
                'parroquia' => 'Francisco Ochoa',
            ),
            94 => 
            array (
                'id_parroquia' => 1095,
                'id_municipio' => 457,
                'parroquia' => 'Los Cortijos',
            ),
            95 => 
            array (
                'id_parroquia' => 1096,
                'id_municipio' => 457,
                'parroquia' => 'Marcial Hernández',
            ),
            96 => 
            array (
                'id_parroquia' => 1097,
                'id_municipio' => 458,
                'parroquia' => 'Santa Rita',
            ),
            97 => 
            array (
                'id_parroquia' => 1098,
                'id_municipio' => 458,
                'parroquia' => 'El Mene',
            ),
            98 => 
            array (
                'id_parroquia' => 1099,
                'id_municipio' => 458,
                'parroquia' => 'Pedro Lucas Urribarrí',
            ),
            99 => 
            array (
                'id_parroquia' => 1100,
                'id_municipio' => 458,
                'parroquia' => 'José Cenobio Urribarrí',
            ),
            100 => 
            array (
                'id_parroquia' => 1101,
                'id_municipio' => 459,
                'parroquia' => 'Rafael Maria Baralt',
            ),
            101 => 
            array (
                'id_parroquia' => 1102,
                'id_municipio' => 459,
                'parroquia' => 'Manuel Manrique',
            ),
            102 => 
            array (
                'id_parroquia' => 1103,
                'id_municipio' => 459,
                'parroquia' => 'Rafael Urdaneta',
            ),
            103 => 
            array (
                'id_parroquia' => 1104,
                'id_municipio' => 460,
                'parroquia' => 'Bobures',
            ),
            104 => 
            array (
                'id_parroquia' => 1105,
                'id_municipio' => 460,
                'parroquia' => 'Gibraltar',
            ),
            105 => 
            array (
                'id_parroquia' => 1106,
                'id_municipio' => 460,
                'parroquia' => 'Heras',
            ),
            106 => 
            array (
                'id_parroquia' => 1107,
                'id_municipio' => 460,
                'parroquia' => 'Monseñor Arturo Álvarez',
            ),
            107 => 
            array (
                'id_parroquia' => 1108,
                'id_municipio' => 460,
                'parroquia' => 'Rómulo Gallegos',
            ),
            108 => 
            array (
                'id_parroquia' => 1109,
                'id_municipio' => 460,
                'parroquia' => 'El Batey',
            ),
            109 => 
            array (
                'id_parroquia' => 1110,
                'id_municipio' => 461,
                'parroquia' => 'Rafael Urdaneta',
            ),
            110 => 
            array (
                'id_parroquia' => 1111,
                'id_municipio' => 461,
                'parroquia' => 'La Victoria',
            ),
            111 => 
            array (
                'id_parroquia' => 1112,
                'id_municipio' => 461,
                'parroquia' => 'Raúl Cuenca',
            ),
            112 => 
            array (
                'id_parroquia' => 1113,
                'id_municipio' => 447,
                'parroquia' => 'Sinamaica',
            ),
            113 => 
            array (
                'id_parroquia' => 1114,
                'id_municipio' => 447,
                'parroquia' => 'Alta Guajira',
            ),
            114 => 
            array (
                'id_parroquia' => 1115,
                'id_municipio' => 447,
                'parroquia' => 'Elías Sánchez Rubio',
            ),
            115 => 
            array (
                'id_parroquia' => 1116,
                'id_municipio' => 447,
                'parroquia' => 'Guajira',
            ),
            116 => 
            array (
                'id_parroquia' => 1117,
                'id_municipio' => 462,
                'parroquia' => 'Altagracia',
            ),
            117 => 
            array (
                'id_parroquia' => 1118,
                'id_municipio' => 462,
                'parroquia' => 'Antímano',
            ),
            118 => 
            array (
                'id_parroquia' => 1119,
                'id_municipio' => 462,
                'parroquia' => 'Caricuao',
            ),
            119 => 
            array (
                'id_parroquia' => 1120,
                'id_municipio' => 462,
                'parroquia' => 'Catedral',
            ),
            120 => 
            array (
                'id_parroquia' => 1121,
                'id_municipio' => 462,
                'parroquia' => 'Coche',
            ),
            121 => 
            array (
                'id_parroquia' => 1122,
                'id_municipio' => 462,
                'parroquia' => 'El Junquito',
            ),
            122 => 
            array (
                'id_parroquia' => 1123,
                'id_municipio' => 462,
                'parroquia' => 'El Paraíso',
            ),
            123 => 
            array (
                'id_parroquia' => 1124,
                'id_municipio' => 462,
                'parroquia' => 'El Recreo',
            ),
            124 => 
            array (
                'id_parroquia' => 1125,
                'id_municipio' => 462,
                'parroquia' => 'El Valle',
            ),
            125 => 
            array (
                'id_parroquia' => 1126,
                'id_municipio' => 462,
                'parroquia' => 'La Candelaria',
            ),
            126 => 
            array (
                'id_parroquia' => 1127,
                'id_municipio' => 462,
                'parroquia' => 'La Pastora',
            ),
            127 => 
            array (
                'id_parroquia' => 1128,
                'id_municipio' => 462,
                'parroquia' => 'La Vega',
            ),
            128 => 
            array (
                'id_parroquia' => 1129,
                'id_municipio' => 462,
                'parroquia' => 'Macarao',
            ),
            129 => 
            array (
                'id_parroquia' => 1130,
                'id_municipio' => 462,
                'parroquia' => 'San Agustín',
            ),
            130 => 
            array (
                'id_parroquia' => 1131,
                'id_municipio' => 462,
                'parroquia' => 'San Bernardino',
            ),
            131 => 
            array (
                'id_parroquia' => 1132,
                'id_municipio' => 462,
                'parroquia' => 'San José',
            ),
            132 => 
            array (
                'id_parroquia' => 1133,
                'id_municipio' => 462,
                'parroquia' => 'San Juan',
            ),
            133 => 
            array (
                'id_parroquia' => 1134,
                'id_municipio' => 462,
                'parroquia' => 'San Pedro',
            ),
            134 => 
            array (
                'id_parroquia' => 1135,
                'id_municipio' => 462,
                'parroquia' => 'Santa Rosalía',
            ),
            135 => 
            array (
                'id_parroquia' => 1136,
                'id_municipio' => 462,
                'parroquia' => 'Santa Teresa',
            ),
            136 => 
            array (
                'id_parroquia' => 1137,
                'id_municipio' => 462,
            'parroquia' => 'Sucre (Catia)',
            ),
            137 => 
            array (
                'id_parroquia' => 1138,
                'id_municipio' => 462,
                'parroquia' => '23 de enero',
            ),
        ));
        
        
    }
}
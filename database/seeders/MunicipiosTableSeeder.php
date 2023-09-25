<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MunicipiosTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('municipios')->delete();
        
        \DB::table('municipios')->insert(array (
            0 => 
            array (
                'id_municipio' => 1,
                'id_estado' => 1,
                'municipio' => 'Alto Orinoco',
            ),
            1 => 
            array (
                'id_municipio' => 2,
                'id_estado' => 1,
                'municipio' => 'Atabapo',
            ),
            2 => 
            array (
                'id_municipio' => 3,
                'id_estado' => 1,
                'municipio' => 'Atures',
            ),
            3 => 
            array (
                'id_municipio' => 4,
                'id_estado' => 1,
                'municipio' => 'Autana',
            ),
            4 => 
            array (
                'id_municipio' => 5,
                'id_estado' => 1,
                'municipio' => 'Manapiare',
            ),
            5 => 
            array (
                'id_municipio' => 6,
                'id_estado' => 1,
                'municipio' => 'Maroa',
            ),
            6 => 
            array (
                'id_municipio' => 7,
                'id_estado' => 1,
                'municipio' => 'Río Negro',
            ),
            7 => 
            array (
                'id_municipio' => 8,
                'id_estado' => 2,
                'municipio' => 'Anaco',
            ),
            8 => 
            array (
                'id_municipio' => 9,
                'id_estado' => 2,
                'municipio' => 'Aragua',
            ),
            9 => 
            array (
                'id_municipio' => 10,
                'id_estado' => 2,
                'municipio' => 'Manuel Ezequiel Bruzual',
            ),
            10 => 
            array (
                'id_municipio' => 11,
                'id_estado' => 2,
                'municipio' => 'Diego Bautista Urbaneja',
            ),
            11 => 
            array (
                'id_municipio' => 12,
                'id_estado' => 2,
                'municipio' => 'Fernando Peñalver',
            ),
            12 => 
            array (
                'id_municipio' => 13,
                'id_estado' => 2,
                'municipio' => 'Francisco Del Carmen Carvajal',
            ),
            13 => 
            array (
                'id_municipio' => 14,
                'id_estado' => 2,
                'municipio' => 'General Sir Arthur McGregor',
            ),
            14 => 
            array (
                'id_municipio' => 15,
                'id_estado' => 2,
                'municipio' => 'Guanta',
            ),
            15 => 
            array (
                'id_municipio' => 16,
                'id_estado' => 2,
                'municipio' => 'Independencia',
            ),
            16 => 
            array (
                'id_municipio' => 17,
                'id_estado' => 2,
                'municipio' => 'José Gregorio Monagas',
            ),
            17 => 
            array (
                'id_municipio' => 18,
                'id_estado' => 2,
                'municipio' => 'Juan Antonio Sotillo',
            ),
            18 => 
            array (
                'id_municipio' => 19,
                'id_estado' => 2,
                'municipio' => 'Juan Manuel Cajigal',
            ),
            19 => 
            array (
                'id_municipio' => 20,
                'id_estado' => 2,
                'municipio' => 'Libertad',
            ),
            20 => 
            array (
                'id_municipio' => 21,
                'id_estado' => 2,
                'municipio' => 'Francisco de Miranda',
            ),
            21 => 
            array (
                'id_municipio' => 22,
                'id_estado' => 2,
                'municipio' => 'Pedro María Freites',
            ),
            22 => 
            array (
                'id_municipio' => 23,
                'id_estado' => 2,
                'municipio' => 'Píritu',
            ),
            23 => 
            array (
                'id_municipio' => 24,
                'id_estado' => 2,
                'municipio' => 'San José de Guanipa',
            ),
            24 => 
            array (
                'id_municipio' => 25,
                'id_estado' => 2,
                'municipio' => 'San Juan de Capistrano',
            ),
            25 => 
            array (
                'id_municipio' => 26,
                'id_estado' => 2,
                'municipio' => 'Santa Ana',
            ),
            26 => 
            array (
                'id_municipio' => 27,
                'id_estado' => 2,
                'municipio' => 'Simón Bolívar',
            ),
            27 => 
            array (
                'id_municipio' => 28,
                'id_estado' => 2,
                'municipio' => 'Simón Rodríguez',
            ),
            28 => 
            array (
                'id_municipio' => 29,
                'id_estado' => 3,
                'municipio' => 'Achaguas',
            ),
            29 => 
            array (
                'id_municipio' => 30,
                'id_estado' => 3,
                'municipio' => 'Biruaca',
            ),
            30 => 
            array (
                'id_municipio' => 31,
                'id_estado' => 3,
                'municipio' => 'Muñóz',
            ),
            31 => 
            array (
                'id_municipio' => 32,
                'id_estado' => 3,
                'municipio' => 'Páez',
            ),
            32 => 
            array (
                'id_municipio' => 33,
                'id_estado' => 3,
                'municipio' => 'Pedro Camejo',
            ),
            33 => 
            array (
                'id_municipio' => 34,
                'id_estado' => 3,
                'municipio' => 'Rómulo Gallegos',
            ),
            34 => 
            array (
                'id_municipio' => 35,
                'id_estado' => 3,
                'municipio' => 'San Fernando',
            ),
            35 => 
            array (
                'id_municipio' => 36,
                'id_estado' => 4,
                'municipio' => 'Atanasio Girardot',
            ),
            36 => 
            array (
                'id_municipio' => 37,
                'id_estado' => 4,
                'municipio' => 'Bolívar',
            ),
            37 => 
            array (
                'id_municipio' => 38,
                'id_estado' => 4,
                'municipio' => 'Camatagua',
            ),
            38 => 
            array (
                'id_municipio' => 39,
                'id_estado' => 4,
                'municipio' => 'Francisco Linares Alcántara',
            ),
            39 => 
            array (
                'id_municipio' => 40,
                'id_estado' => 4,
                'municipio' => 'José Ángel Lamas',
            ),
            40 => 
            array (
                'id_municipio' => 41,
                'id_estado' => 4,
                'municipio' => 'José Félix Ribas',
            ),
            41 => 
            array (
                'id_municipio' => 42,
                'id_estado' => 4,
                'municipio' => 'José Rafael Revenga',
            ),
            42 => 
            array (
                'id_municipio' => 43,
                'id_estado' => 4,
                'municipio' => 'Libertador',
            ),
            43 => 
            array (
                'id_municipio' => 44,
                'id_estado' => 4,
                'municipio' => 'Mario Briceño Iragorry',
            ),
            44 => 
            array (
                'id_municipio' => 45,
                'id_estado' => 4,
                'municipio' => 'Ocumare de la Costa de Oro',
            ),
            45 => 
            array (
                'id_municipio' => 46,
                'id_estado' => 4,
                'municipio' => 'San Casimiro',
            ),
            46 => 
            array (
                'id_municipio' => 47,
                'id_estado' => 4,
                'municipio' => 'San Sebastián',
            ),
            47 => 
            array (
                'id_municipio' => 48,
                'id_estado' => 4,
                'municipio' => 'Santiago Mariño',
            ),
            48 => 
            array (
                'id_municipio' => 49,
                'id_estado' => 4,
                'municipio' => 'Santos Michelena',
            ),
            49 => 
            array (
                'id_municipio' => 50,
                'id_estado' => 4,
                'municipio' => 'Sucre',
            ),
            50 => 
            array (
                'id_municipio' => 51,
                'id_estado' => 4,
                'municipio' => 'Tovar',
            ),
            51 => 
            array (
                'id_municipio' => 52,
                'id_estado' => 4,
                'municipio' => 'Urdaneta',
            ),
            52 => 
            array (
                'id_municipio' => 53,
                'id_estado' => 4,
                'municipio' => 'Zamora',
            ),
            53 => 
            array (
                'id_municipio' => 54,
                'id_estado' => 5,
                'municipio' => 'Alberto Arvelo Torrealba',
            ),
            54 => 
            array (
                'id_municipio' => 55,
                'id_estado' => 5,
                'municipio' => 'Andrés Eloy Blanco',
            ),
            55 => 
            array (
                'id_municipio' => 56,
                'id_estado' => 5,
                'municipio' => 'Antonio José de Sucre',
            ),
            56 => 
            array (
                'id_municipio' => 57,
                'id_estado' => 5,
                'municipio' => 'Arismendi',
            ),
            57 => 
            array (
                'id_municipio' => 58,
                'id_estado' => 5,
                'municipio' => 'Barinas',
            ),
            58 => 
            array (
                'id_municipio' => 59,
                'id_estado' => 5,
                'municipio' => 'Bolívar',
            ),
            59 => 
            array (
                'id_municipio' => 60,
                'id_estado' => 5,
                'municipio' => 'Cruz Paredes',
            ),
            60 => 
            array (
                'id_municipio' => 61,
                'id_estado' => 5,
                'municipio' => 'Ezequiel Zamora',
            ),
            61 => 
            array (
                'id_municipio' => 62,
                'id_estado' => 5,
                'municipio' => 'Obispos',
            ),
            62 => 
            array (
                'id_municipio' => 63,
                'id_estado' => 5,
                'municipio' => 'Pedraza',
            ),
            63 => 
            array (
                'id_municipio' => 64,
                'id_estado' => 5,
                'municipio' => 'Rojas',
            ),
            64 => 
            array (
                'id_municipio' => 65,
                'id_estado' => 5,
                'municipio' => 'Sosa',
            ),
            65 => 
            array (
                'id_municipio' => 66,
                'id_estado' => 6,
                'municipio' => 'Caroní',
            ),
            66 => 
            array (
                'id_municipio' => 67,
                'id_estado' => 6,
                'municipio' => 'Cedeño',
            ),
            67 => 
            array (
                'id_municipio' => 68,
                'id_estado' => 6,
                'municipio' => 'El Callao',
            ),
            68 => 
            array (
                'id_municipio' => 69,
                'id_estado' => 6,
                'municipio' => 'Gran Sabana',
            ),
            69 => 
            array (
                'id_municipio' => 70,
                'id_estado' => 6,
                'municipio' => 'Heres',
            ),
            70 => 
            array (
                'id_municipio' => 71,
                'id_estado' => 6,
                'municipio' => 'Piar',
            ),
            71 => 
            array (
                'id_municipio' => 72,
                'id_estado' => 6,
            'municipio' => 'Angostura (Raúl Leoni)',
            ),
            72 => 
            array (
                'id_municipio' => 73,
                'id_estado' => 6,
                'municipio' => 'Roscio',
            ),
            73 => 
            array (
                'id_municipio' => 74,
                'id_estado' => 6,
                'municipio' => 'Sifontes',
            ),
            74 => 
            array (
                'id_municipio' => 75,
                'id_estado' => 6,
                'municipio' => 'Sucre',
            ),
            75 => 
            array (
                'id_municipio' => 76,
                'id_estado' => 6,
                'municipio' => 'Padre Pedro Chien',
            ),
            76 => 
            array (
                'id_municipio' => 77,
                'id_estado' => 7,
                'municipio' => 'Bejuma',
            ),
            77 => 
            array (
                'id_municipio' => 78,
                'id_estado' => 7,
                'municipio' => 'Carlos Arvelo',
            ),
            78 => 
            array (
                'id_municipio' => 79,
                'id_estado' => 7,
                'municipio' => 'Diego Ibarra',
            ),
            79 => 
            array (
                'id_municipio' => 80,
                'id_estado' => 7,
                'municipio' => 'Guacara',
            ),
            80 => 
            array (
                'id_municipio' => 81,
                'id_estado' => 7,
                'municipio' => 'Juan José Mora',
            ),
            81 => 
            array (
                'id_municipio' => 82,
                'id_estado' => 7,
                'municipio' => 'Libertador',
            ),
            82 => 
            array (
                'id_municipio' => 83,
                'id_estado' => 7,
                'municipio' => 'Los Guayos',
            ),
            83 => 
            array (
                'id_municipio' => 84,
                'id_estado' => 7,
                'municipio' => 'Miranda',
            ),
            84 => 
            array (
                'id_municipio' => 85,
                'id_estado' => 7,
                'municipio' => 'Montalbán',
            ),
            85 => 
            array (
                'id_municipio' => 86,
                'id_estado' => 7,
                'municipio' => 'Naguanagua',
            ),
            86 => 
            array (
                'id_municipio' => 87,
                'id_estado' => 7,
                'municipio' => 'Puerto Cabello',
            ),
            87 => 
            array (
                'id_municipio' => 88,
                'id_estado' => 7,
                'municipio' => 'San Diego',
            ),
            88 => 
            array (
                'id_municipio' => 89,
                'id_estado' => 7,
                'municipio' => 'San Joaquín',
            ),
            89 => 
            array (
                'id_municipio' => 90,
                'id_estado' => 7,
                'municipio' => 'Valencia',
            ),
            90 => 
            array (
                'id_municipio' => 91,
                'id_estado' => 8,
                'municipio' => 'Anzoátegui',
            ),
            91 => 
            array (
                'id_municipio' => 92,
                'id_estado' => 8,
                'municipio' => 'Tinaquillo',
            ),
            92 => 
            array (
                'id_municipio' => 93,
                'id_estado' => 8,
                'municipio' => 'Girardot',
            ),
            93 => 
            array (
                'id_municipio' => 94,
                'id_estado' => 8,
                'municipio' => 'Lima Blanco',
            ),
            94 => 
            array (
                'id_municipio' => 95,
                'id_estado' => 8,
                'municipio' => 'Pao de San Juan Bautista',
            ),
            95 => 
            array (
                'id_municipio' => 96,
                'id_estado' => 8,
                'municipio' => 'Ricaurte',
            ),
            96 => 
            array (
                'id_municipio' => 97,
                'id_estado' => 8,
                'municipio' => 'Rómulo Gallegos',
            ),
            97 => 
            array (
                'id_municipio' => 98,
                'id_estado' => 8,
                'municipio' => 'San Carlos',
            ),
            98 => 
            array (
                'id_municipio' => 99,
                'id_estado' => 8,
                'municipio' => 'Tinaco',
            ),
            99 => 
            array (
                'id_municipio' => 100,
                'id_estado' => 9,
                'municipio' => 'Antonio Díaz',
            ),
            100 => 
            array (
                'id_municipio' => 101,
                'id_estado' => 9,
                'municipio' => 'Casacoima',
            ),
            101 => 
            array (
                'id_municipio' => 102,
                'id_estado' => 9,
                'municipio' => 'Pedernales',
            ),
            102 => 
            array (
                'id_municipio' => 103,
                'id_estado' => 9,
                'municipio' => 'Tucupita',
            ),
            103 => 
            array (
                'id_municipio' => 104,
                'id_estado' => 10,
                'municipio' => 'Acosta',
            ),
            104 => 
            array (
                'id_municipio' => 105,
                'id_estado' => 10,
                'municipio' => 'Bolívar',
            ),
            105 => 
            array (
                'id_municipio' => 106,
                'id_estado' => 10,
                'municipio' => 'Buchivacoa',
            ),
            106 => 
            array (
                'id_municipio' => 107,
                'id_estado' => 10,
                'municipio' => 'Cacique Manaure',
            ),
            107 => 
            array (
                'id_municipio' => 108,
                'id_estado' => 10,
                'municipio' => 'Carirubana',
            ),
            108 => 
            array (
                'id_municipio' => 109,
                'id_estado' => 10,
                'municipio' => 'Colina',
            ),
            109 => 
            array (
                'id_municipio' => 110,
                'id_estado' => 10,
                'municipio' => 'Dabajuro',
            ),
            110 => 
            array (
                'id_municipio' => 111,
                'id_estado' => 10,
                'municipio' => 'Democracia',
            ),
            111 => 
            array (
                'id_municipio' => 112,
                'id_estado' => 10,
                'municipio' => 'Falcón',
            ),
            112 => 
            array (
                'id_municipio' => 113,
                'id_estado' => 10,
                'municipio' => 'Federación',
            ),
            113 => 
            array (
                'id_municipio' => 114,
                'id_estado' => 10,
                'municipio' => 'Jacura',
            ),
            114 => 
            array (
                'id_municipio' => 115,
                'id_estado' => 10,
                'municipio' => 'José Laurencio Silva',
            ),
            115 => 
            array (
                'id_municipio' => 116,
                'id_estado' => 10,
                'municipio' => 'Los Taques',
            ),
            116 => 
            array (
                'id_municipio' => 117,
                'id_estado' => 10,
                'municipio' => 'Mauroa',
            ),
            117 => 
            array (
                'id_municipio' => 118,
                'id_estado' => 10,
                'municipio' => 'Miranda',
            ),
            118 => 
            array (
                'id_municipio' => 119,
                'id_estado' => 10,
                'municipio' => 'Monseñor Iturriza',
            ),
            119 => 
            array (
                'id_municipio' => 120,
                'id_estado' => 10,
                'municipio' => 'Palmasola',
            ),
            120 => 
            array (
                'id_municipio' => 121,
                'id_estado' => 10,
                'municipio' => 'Petit',
            ),
            121 => 
            array (
                'id_municipio' => 122,
                'id_estado' => 10,
                'municipio' => 'Píritu',
            ),
            122 => 
            array (
                'id_municipio' => 123,
                'id_estado' => 10,
                'municipio' => 'San Francisco',
            ),
            123 => 
            array (
                'id_municipio' => 124,
                'id_estado' => 10,
                'municipio' => 'Sucre',
            ),
            124 => 
            array (
                'id_municipio' => 125,
                'id_estado' => 10,
                'municipio' => 'Tocópero',
            ),
            125 => 
            array (
                'id_municipio' => 126,
                'id_estado' => 10,
                'municipio' => 'Unión',
            ),
            126 => 
            array (
                'id_municipio' => 127,
                'id_estado' => 10,
                'municipio' => 'Urumaco',
            ),
            127 => 
            array (
                'id_municipio' => 128,
                'id_estado' => 10,
                'municipio' => 'Zamora',
            ),
            128 => 
            array (
                'id_municipio' => 129,
                'id_estado' => 11,
                'municipio' => 'Camaguán',
            ),
            129 => 
            array (
                'id_municipio' => 130,
                'id_estado' => 11,
                'municipio' => 'Chaguaramas',
            ),
            130 => 
            array (
                'id_municipio' => 131,
                'id_estado' => 11,
                'municipio' => 'El Socorro',
            ),
            131 => 
            array (
                'id_municipio' => 132,
                'id_estado' => 11,
                'municipio' => 'José Félix Ribas',
            ),
            132 => 
            array (
                'id_municipio' => 133,
                'id_estado' => 11,
                'municipio' => 'José Tadeo Monagas',
            ),
            133 => 
            array (
                'id_municipio' => 134,
                'id_estado' => 11,
                'municipio' => 'Juan Germán Roscio',
            ),
            134 => 
            array (
                'id_municipio' => 135,
                'id_estado' => 11,
                'municipio' => 'Julián Mellado',
            ),
            135 => 
            array (
                'id_municipio' => 136,
                'id_estado' => 11,
                'municipio' => 'Las Mercedes',
            ),
            136 => 
            array (
                'id_municipio' => 137,
                'id_estado' => 11,
                'municipio' => 'Leonardo Infante',
            ),
            137 => 
            array (
                'id_municipio' => 138,
                'id_estado' => 11,
                'municipio' => 'Pedro Zaraza',
            ),
            138 => 
            array (
                'id_municipio' => 139,
                'id_estado' => 11,
                'municipio' => 'Ortíz',
            ),
            139 => 
            array (
                'id_municipio' => 140,
                'id_estado' => 11,
                'municipio' => 'San Gerónimo de Guayabal',
            ),
            140 => 
            array (
                'id_municipio' => 141,
                'id_estado' => 11,
                'municipio' => 'San José de Guaribe',
            ),
            141 => 
            array (
                'id_municipio' => 142,
                'id_estado' => 11,
                'municipio' => 'Santa María de Ipire',
            ),
            142 => 
            array (
                'id_municipio' => 143,
                'id_estado' => 11,
                'municipio' => 'Sebastián Francisco de Miranda',
            ),
            143 => 
            array (
                'id_municipio' => 144,
                'id_estado' => 12,
                'municipio' => 'Andrés Eloy Blanco',
            ),
            144 => 
            array (
                'id_municipio' => 145,
                'id_estado' => 12,
                'municipio' => 'Crespo',
            ),
            145 => 
            array (
                'id_municipio' => 146,
                'id_estado' => 12,
                'municipio' => 'Iribarren',
            ),
            146 => 
            array (
                'id_municipio' => 147,
                'id_estado' => 12,
                'municipio' => 'Jiménez',
            ),
            147 => 
            array (
                'id_municipio' => 148,
                'id_estado' => 12,
                'municipio' => 'Morán',
            ),
            148 => 
            array (
                'id_municipio' => 149,
                'id_estado' => 12,
                'municipio' => 'Palavecino',
            ),
            149 => 
            array (
                'id_municipio' => 150,
                'id_estado' => 12,
                'municipio' => 'Simón Planas',
            ),
            150 => 
            array (
                'id_municipio' => 151,
                'id_estado' => 12,
                'municipio' => 'Torres',
            ),
            151 => 
            array (
                'id_municipio' => 152,
                'id_estado' => 12,
                'municipio' => 'Urdaneta',
            ),
            152 => 
            array (
                'id_municipio' => 179,
                'id_estado' => 13,
                'municipio' => 'Alberto Adriani',
            ),
            153 => 
            array (
                'id_municipio' => 180,
                'id_estado' => 13,
                'municipio' => 'Andrés Bello',
            ),
            154 => 
            array (
                'id_municipio' => 181,
                'id_estado' => 13,
                'municipio' => 'Antonio Pinto Salinas',
            ),
            155 => 
            array (
                'id_municipio' => 182,
                'id_estado' => 13,
                'municipio' => 'Aricagua',
            ),
            156 => 
            array (
                'id_municipio' => 183,
                'id_estado' => 13,
                'municipio' => 'Arzobispo Chacón',
            ),
            157 => 
            array (
                'id_municipio' => 184,
                'id_estado' => 13,
                'municipio' => 'Campo Elías',
            ),
            158 => 
            array (
                'id_municipio' => 185,
                'id_estado' => 13,
                'municipio' => 'Caracciolo Parra Olmedo',
            ),
            159 => 
            array (
                'id_municipio' => 186,
                'id_estado' => 13,
                'municipio' => 'Cardenal Quintero',
            ),
            160 => 
            array (
                'id_municipio' => 187,
                'id_estado' => 13,
                'municipio' => 'Guaraque',
            ),
            161 => 
            array (
                'id_municipio' => 188,
                'id_estado' => 13,
                'municipio' => 'Julio César Salas',
            ),
            162 => 
            array (
                'id_municipio' => 189,
                'id_estado' => 13,
                'municipio' => 'Justo Briceño',
            ),
            163 => 
            array (
                'id_municipio' => 190,
                'id_estado' => 13,
                'municipio' => 'Libertador',
            ),
            164 => 
            array (
                'id_municipio' => 191,
                'id_estado' => 13,
                'municipio' => 'Miranda',
            ),
            165 => 
            array (
                'id_municipio' => 192,
                'id_estado' => 13,
                'municipio' => 'Obispo Ramos de Lora',
            ),
            166 => 
            array (
                'id_municipio' => 193,
                'id_estado' => 13,
                'municipio' => 'Padre Noguera',
            ),
            167 => 
            array (
                'id_municipio' => 194,
                'id_estado' => 13,
                'municipio' => 'Pueblo Llano',
            ),
            168 => 
            array (
                'id_municipio' => 195,
                'id_estado' => 13,
                'municipio' => 'Rangel',
            ),
            169 => 
            array (
                'id_municipio' => 196,
                'id_estado' => 13,
                'municipio' => 'Rivas Dávila',
            ),
            170 => 
            array (
                'id_municipio' => 197,
                'id_estado' => 13,
                'municipio' => 'Santos Marquina',
            ),
            171 => 
            array (
                'id_municipio' => 198,
                'id_estado' => 13,
                'municipio' => 'Sucre',
            ),
            172 => 
            array (
                'id_municipio' => 199,
                'id_estado' => 13,
                'municipio' => 'Tovar',
            ),
            173 => 
            array (
                'id_municipio' => 200,
                'id_estado' => 13,
                'municipio' => 'Tulio Febres Cordero',
            ),
            174 => 
            array (
                'id_municipio' => 201,
                'id_estado' => 13,
                'municipio' => 'Zea',
            ),
            175 => 
            array (
                'id_municipio' => 223,
                'id_estado' => 14,
                'municipio' => 'Acevedo',
            ),
            176 => 
            array (
                'id_municipio' => 224,
                'id_estado' => 14,
                'municipio' => 'Andrés Bello',
            ),
            177 => 
            array (
                'id_municipio' => 225,
                'id_estado' => 14,
                'municipio' => 'Baruta',
            ),
            178 => 
            array (
                'id_municipio' => 226,
                'id_estado' => 14,
                'municipio' => 'Brión',
            ),
            179 => 
            array (
                'id_municipio' => 227,
                'id_estado' => 14,
                'municipio' => 'Buroz',
            ),
            180 => 
            array (
                'id_municipio' => 228,
                'id_estado' => 14,
                'municipio' => 'Carrizal',
            ),
            181 => 
            array (
                'id_municipio' => 229,
                'id_estado' => 14,
                'municipio' => 'Chacao',
            ),
            182 => 
            array (
                'id_municipio' => 230,
                'id_estado' => 14,
                'municipio' => 'Cristóbal Rojas',
            ),
            183 => 
            array (
                'id_municipio' => 231,
                'id_estado' => 14,
                'municipio' => 'El Hatillo',
            ),
            184 => 
            array (
                'id_municipio' => 232,
                'id_estado' => 14,
                'municipio' => 'Guaicaipuro',
            ),
            185 => 
            array (
                'id_municipio' => 233,
                'id_estado' => 14,
                'municipio' => 'Independencia',
            ),
            186 => 
            array (
                'id_municipio' => 234,
                'id_estado' => 14,
                'municipio' => 'Lander',
            ),
            187 => 
            array (
                'id_municipio' => 235,
                'id_estado' => 14,
                'municipio' => 'Los Salias',
            ),
            188 => 
            array (
                'id_municipio' => 236,
                'id_estado' => 14,
                'municipio' => 'Páez',
            ),
            189 => 
            array (
                'id_municipio' => 237,
                'id_estado' => 14,
                'municipio' => 'Paz Castillo',
            ),
            190 => 
            array (
                'id_municipio' => 238,
                'id_estado' => 14,
                'municipio' => 'Pedro Gual',
            ),
            191 => 
            array (
                'id_municipio' => 239,
                'id_estado' => 14,
                'municipio' => 'Plaza',
            ),
            192 => 
            array (
                'id_municipio' => 240,
                'id_estado' => 14,
                'municipio' => 'Simón Bolívar',
            ),
            193 => 
            array (
                'id_municipio' => 241,
                'id_estado' => 14,
                'municipio' => 'Sucre',
            ),
            194 => 
            array (
                'id_municipio' => 242,
                'id_estado' => 14,
                'municipio' => 'Urdaneta',
            ),
            195 => 
            array (
                'id_municipio' => 243,
                'id_estado' => 14,
                'municipio' => 'Zamora',
            ),
            196 => 
            array (
                'id_municipio' => 258,
                'id_estado' => 15,
                'municipio' => 'Acosta',
            ),
            197 => 
            array (
                'id_municipio' => 259,
                'id_estado' => 15,
                'municipio' => 'Aguasay',
            ),
            198 => 
            array (
                'id_municipio' => 260,
                'id_estado' => 15,
                'municipio' => 'Bolívar',
            ),
            199 => 
            array (
                'id_municipio' => 261,
                'id_estado' => 15,
                'municipio' => 'Caripe',
            ),
            200 => 
            array (
                'id_municipio' => 262,
                'id_estado' => 15,
                'municipio' => 'Cedeño',
            ),
            201 => 
            array (
                'id_municipio' => 263,
                'id_estado' => 15,
                'municipio' => 'Ezequiel Zamora',
            ),
            202 => 
            array (
                'id_municipio' => 264,
                'id_estado' => 15,
                'municipio' => 'Libertador',
            ),
            203 => 
            array (
                'id_municipio' => 265,
                'id_estado' => 15,
                'municipio' => 'Maturín',
            ),
            204 => 
            array (
                'id_municipio' => 266,
                'id_estado' => 15,
                'municipio' => 'Piar',
            ),
            205 => 
            array (
                'id_municipio' => 267,
                'id_estado' => 15,
                'municipio' => 'Punceres',
            ),
            206 => 
            array (
                'id_municipio' => 268,
                'id_estado' => 15,
                'municipio' => 'Santa Bárbara',
            ),
            207 => 
            array (
                'id_municipio' => 269,
                'id_estado' => 15,
                'municipio' => 'Sotillo',
            ),
            208 => 
            array (
                'id_municipio' => 270,
                'id_estado' => 15,
                'municipio' => 'Uracoa',
            ),
            209 => 
            array (
                'id_municipio' => 271,
                'id_estado' => 16,
                'municipio' => 'Antolín del Campo',
            ),
            210 => 
            array (
                'id_municipio' => 272,
                'id_estado' => 16,
                'municipio' => 'Arismendi',
            ),
            211 => 
            array (
                'id_municipio' => 273,
                'id_estado' => 16,
                'municipio' => 'García',
            ),
            212 => 
            array (
                'id_municipio' => 274,
                'id_estado' => 16,
                'municipio' => 'Gómez',
            ),
            213 => 
            array (
                'id_municipio' => 275,
                'id_estado' => 16,
                'municipio' => 'Maneiro',
            ),
            214 => 
            array (
                'id_municipio' => 276,
                'id_estado' => 16,
                'municipio' => 'Marcano',
            ),
            215 => 
            array (
                'id_municipio' => 277,
                'id_estado' => 16,
                'municipio' => 'Mariño',
            ),
            216 => 
            array (
                'id_municipio' => 278,
                'id_estado' => 16,
                'municipio' => 'Península de Macanao',
            ),
            217 => 
            array (
                'id_municipio' => 279,
                'id_estado' => 16,
                'municipio' => 'Tubores',
            ),
            218 => 
            array (
                'id_municipio' => 280,
                'id_estado' => 16,
                'municipio' => 'Villalba',
            ),
            219 => 
            array (
                'id_municipio' => 281,
                'id_estado' => 16,
                'municipio' => 'Díaz',
            ),
            220 => 
            array (
                'id_municipio' => 282,
                'id_estado' => 17,
                'municipio' => 'Agua Blanca',
            ),
            221 => 
            array (
                'id_municipio' => 283,
                'id_estado' => 17,
                'municipio' => 'Araure',
            ),
            222 => 
            array (
                'id_municipio' => 284,
                'id_estado' => 17,
                'municipio' => 'Esteller',
            ),
            223 => 
            array (
                'id_municipio' => 285,
                'id_estado' => 17,
                'municipio' => 'Guanare',
            ),
            224 => 
            array (
                'id_municipio' => 286,
                'id_estado' => 17,
                'municipio' => 'Guanarito',
            ),
            225 => 
            array (
                'id_municipio' => 287,
                'id_estado' => 17,
                'municipio' => 'Monseñor José Vicente de Unda',
            ),
            226 => 
            array (
                'id_municipio' => 288,
                'id_estado' => 17,
                'municipio' => 'Ospino',
            ),
            227 => 
            array (
                'id_municipio' => 289,
                'id_estado' => 17,
                'municipio' => 'Páez',
            ),
            228 => 
            array (
                'id_municipio' => 290,
                'id_estado' => 17,
                'municipio' => 'Papelón',
            ),
            229 => 
            array (
                'id_municipio' => 291,
                'id_estado' => 17,
                'municipio' => 'San Genaro de Boconoíto',
            ),
            230 => 
            array (
                'id_municipio' => 292,
                'id_estado' => 17,
                'municipio' => 'San Rafael de Onoto',
            ),
            231 => 
            array (
                'id_municipio' => 293,
                'id_estado' => 17,
                'municipio' => 'Santa Rosalía',
            ),
            232 => 
            array (
                'id_municipio' => 294,
                'id_estado' => 17,
                'municipio' => 'Sucre',
            ),
            233 => 
            array (
                'id_municipio' => 295,
                'id_estado' => 17,
                'municipio' => 'Turén',
            ),
            234 => 
            array (
                'id_municipio' => 296,
                'id_estado' => 18,
                'municipio' => 'Andrés Eloy Blanco',
            ),
            235 => 
            array (
                'id_municipio' => 297,
                'id_estado' => 18,
                'municipio' => 'Andrés Mata',
            ),
            236 => 
            array (
                'id_municipio' => 298,
                'id_estado' => 18,
                'municipio' => 'Arismendi',
            ),
            237 => 
            array (
                'id_municipio' => 299,
                'id_estado' => 18,
                'municipio' => 'Benítez',
            ),
            238 => 
            array (
                'id_municipio' => 300,
                'id_estado' => 18,
                'municipio' => 'Bermúdez',
            ),
            239 => 
            array (
                'id_municipio' => 301,
                'id_estado' => 18,
                'municipio' => 'Bolívar',
            ),
            240 => 
            array (
                'id_municipio' => 302,
                'id_estado' => 18,
                'municipio' => 'Cajigal',
            ),
            241 => 
            array (
                'id_municipio' => 303,
                'id_estado' => 18,
                'municipio' => 'Cruz Salmerón Acosta',
            ),
            242 => 
            array (
                'id_municipio' => 304,
                'id_estado' => 18,
                'municipio' => 'Libertador',
            ),
            243 => 
            array (
                'id_municipio' => 305,
                'id_estado' => 18,
                'municipio' => 'Mariño',
            ),
            244 => 
            array (
                'id_municipio' => 306,
                'id_estado' => 18,
                'municipio' => 'Mejía',
            ),
            245 => 
            array (
                'id_municipio' => 307,
                'id_estado' => 18,
                'municipio' => 'Montes',
            ),
            246 => 
            array (
                'id_municipio' => 308,
                'id_estado' => 18,
                'municipio' => 'Ribero',
            ),
            247 => 
            array (
                'id_municipio' => 309,
                'id_estado' => 18,
                'municipio' => 'Sucre',
            ),
            248 => 
            array (
                'id_municipio' => 310,
                'id_estado' => 18,
                'municipio' => 'Valdéz',
            ),
            249 => 
            array (
                'id_municipio' => 341,
                'id_estado' => 19,
                'municipio' => 'Andrés Bello',
            ),
            250 => 
            array (
                'id_municipio' => 342,
                'id_estado' => 19,
                'municipio' => 'Antonio Rómulo Costa',
            ),
            251 => 
            array (
                'id_municipio' => 343,
                'id_estado' => 19,
                'municipio' => 'Ayacucho',
            ),
            252 => 
            array (
                'id_municipio' => 344,
                'id_estado' => 19,
                'municipio' => 'Bolívar',
            ),
            253 => 
            array (
                'id_municipio' => 345,
                'id_estado' => 19,
                'municipio' => 'Cárdenas',
            ),
            254 => 
            array (
                'id_municipio' => 346,
                'id_estado' => 19,
                'municipio' => 'Córdoba',
            ),
            255 => 
            array (
                'id_municipio' => 347,
                'id_estado' => 19,
                'municipio' => 'Fernández Feo',
            ),
            256 => 
            array (
                'id_municipio' => 348,
                'id_estado' => 19,
                'municipio' => 'Francisco de Miranda',
            ),
            257 => 
            array (
                'id_municipio' => 349,
                'id_estado' => 19,
                'municipio' => 'García de Hevia',
            ),
            258 => 
            array (
                'id_municipio' => 350,
                'id_estado' => 19,
                'municipio' => 'Guásimos',
            ),
            259 => 
            array (
                'id_municipio' => 351,
                'id_estado' => 19,
                'municipio' => 'Independencia',
            ),
            260 => 
            array (
                'id_municipio' => 352,
                'id_estado' => 19,
                'municipio' => 'Jáuregui',
            ),
            261 => 
            array (
                'id_municipio' => 353,
                'id_estado' => 19,
                'municipio' => 'José María Vargas',
            ),
            262 => 
            array (
                'id_municipio' => 354,
                'id_estado' => 19,
                'municipio' => 'Junín',
            ),
            263 => 
            array (
                'id_municipio' => 355,
                'id_estado' => 19,
                'municipio' => 'Libertad',
            ),
            264 => 
            array (
                'id_municipio' => 356,
                'id_estado' => 19,
                'municipio' => 'Libertador',
            ),
            265 => 
            array (
                'id_municipio' => 357,
                'id_estado' => 19,
                'municipio' => 'Lobatera',
            ),
            266 => 
            array (
                'id_municipio' => 358,
                'id_estado' => 19,
                'municipio' => 'Michelena',
            ),
            267 => 
            array (
                'id_municipio' => 359,
                'id_estado' => 19,
                'municipio' => 'Panamericano',
            ),
            268 => 
            array (
                'id_municipio' => 360,
                'id_estado' => 19,
                'municipio' => 'Pedro María Ureña',
            ),
            269 => 
            array (
                'id_municipio' => 361,
                'id_estado' => 19,
                'municipio' => 'Rafael Urdaneta',
            ),
            270 => 
            array (
                'id_municipio' => 362,
                'id_estado' => 19,
                'municipio' => 'Samuel Darío Maldonado',
            ),
            271 => 
            array (
                'id_municipio' => 363,
                'id_estado' => 19,
                'municipio' => 'San Cristóbal',
            ),
            272 => 
            array (
                'id_municipio' => 364,
                'id_estado' => 19,
                'municipio' => 'Seboruco',
            ),
            273 => 
            array (
                'id_municipio' => 365,
                'id_estado' => 19,
                'municipio' => 'Simón Rodríguez',
            ),
            274 => 
            array (
                'id_municipio' => 366,
                'id_estado' => 19,
                'municipio' => 'Sucre',
            ),
            275 => 
            array (
                'id_municipio' => 367,
                'id_estado' => 19,
                'municipio' => 'Torbes',
            ),
            276 => 
            array (
                'id_municipio' => 368,
                'id_estado' => 19,
                'municipio' => 'Uribante',
            ),
            277 => 
            array (
                'id_municipio' => 369,
                'id_estado' => 19,
                'municipio' => 'San Judas Tadeo',
            ),
            278 => 
            array (
                'id_municipio' => 370,
                'id_estado' => 20,
                'municipio' => 'Andrés Bello',
            ),
            279 => 
            array (
                'id_municipio' => 371,
                'id_estado' => 20,
                'municipio' => 'Boconó',
            ),
            280 => 
            array (
                'id_municipio' => 372,
                'id_estado' => 20,
                'municipio' => 'Bolívar',
            ),
            281 => 
            array (
                'id_municipio' => 373,
                'id_estado' => 20,
                'municipio' => 'Candelaria',
            ),
            282 => 
            array (
                'id_municipio' => 374,
                'id_estado' => 20,
                'municipio' => 'Carache',
            ),
            283 => 
            array (
                'id_municipio' => 375,
                'id_estado' => 20,
                'municipio' => 'Escuque',
            ),
            284 => 
            array (
                'id_municipio' => 376,
                'id_estado' => 20,
                'municipio' => 'José Felipe Márquez Cañizalez',
            ),
            285 => 
            array (
                'id_municipio' => 377,
                'id_estado' => 20,
                'municipio' => 'Juan Vicente Campos Elías',
            ),
            286 => 
            array (
                'id_municipio' => 378,
                'id_estado' => 20,
                'municipio' => 'La Ceiba',
            ),
            287 => 
            array (
                'id_municipio' => 379,
                'id_estado' => 20,
                'municipio' => 'Miranda',
            ),
            288 => 
            array (
                'id_municipio' => 380,
                'id_estado' => 20,
                'municipio' => 'Monte Carmelo',
            ),
            289 => 
            array (
                'id_municipio' => 381,
                'id_estado' => 20,
                'municipio' => 'Motatán',
            ),
            290 => 
            array (
                'id_municipio' => 382,
                'id_estado' => 20,
                'municipio' => 'Pampán',
            ),
            291 => 
            array (
                'id_municipio' => 383,
                'id_estado' => 20,
                'municipio' => 'Pampanito',
            ),
            292 => 
            array (
                'id_municipio' => 384,
                'id_estado' => 20,
                'municipio' => 'Rafael Rangel',
            ),
            293 => 
            array (
                'id_municipio' => 385,
                'id_estado' => 20,
                'municipio' => 'San Rafael de Carvajal',
            ),
            294 => 
            array (
                'id_municipio' => 386,
                'id_estado' => 20,
                'municipio' => 'Sucre',
            ),
            295 => 
            array (
                'id_municipio' => 387,
                'id_estado' => 20,
                'municipio' => 'Trujillo',
            ),
            296 => 
            array (
                'id_municipio' => 388,
                'id_estado' => 20,
                'municipio' => 'Urdaneta',
            ),
            297 => 
            array (
                'id_municipio' => 389,
                'id_estado' => 20,
                'municipio' => 'Valera',
            ),
            298 => 
            array (
                'id_municipio' => 390,
                'id_estado' => 21,
                'municipio' => 'Vargas',
            ),
            299 => 
            array (
                'id_municipio' => 391,
                'id_estado' => 22,
                'municipio' => 'Arístides Bastidas',
            ),
            300 => 
            array (
                'id_municipio' => 392,
                'id_estado' => 22,
                'municipio' => 'Bolívar',
            ),
            301 => 
            array (
                'id_municipio' => 407,
                'id_estado' => 22,
                'municipio' => 'Bruzual',
            ),
            302 => 
            array (
                'id_municipio' => 408,
                'id_estado' => 22,
                'municipio' => 'Cocorote',
            ),
            303 => 
            array (
                'id_municipio' => 409,
                'id_estado' => 22,
                'municipio' => 'Independencia',
            ),
            304 => 
            array (
                'id_municipio' => 410,
                'id_estado' => 22,
                'municipio' => 'José Antonio Páez',
            ),
            305 => 
            array (
                'id_municipio' => 411,
                'id_estado' => 22,
                'municipio' => 'La Trinidad',
            ),
            306 => 
            array (
                'id_municipio' => 412,
                'id_estado' => 22,
                'municipio' => 'Manuel Monge',
            ),
            307 => 
            array (
                'id_municipio' => 413,
                'id_estado' => 22,
                'municipio' => 'Nirgua',
            ),
            308 => 
            array (
                'id_municipio' => 414,
                'id_estado' => 22,
                'municipio' => 'Peña',
            ),
            309 => 
            array (
                'id_municipio' => 415,
                'id_estado' => 22,
                'municipio' => 'San Felipe',
            ),
            310 => 
            array (
                'id_municipio' => 416,
                'id_estado' => 22,
                'municipio' => 'Sucre',
            ),
            311 => 
            array (
                'id_municipio' => 417,
                'id_estado' => 22,
                'municipio' => 'Urachiche',
            ),
            312 => 
            array (
                'id_municipio' => 418,
                'id_estado' => 22,
                'municipio' => 'José Joaquín Veroes',
            ),
            313 => 
            array (
                'id_municipio' => 441,
                'id_estado' => 23,
                'municipio' => 'Almirante Padilla',
            ),
            314 => 
            array (
                'id_municipio' => 442,
                'id_estado' => 23,
                'municipio' => 'Baralt',
            ),
            315 => 
            array (
                'id_municipio' => 443,
                'id_estado' => 23,
                'municipio' => 'Cabimas',
            ),
            316 => 
            array (
                'id_municipio' => 444,
                'id_estado' => 23,
                'municipio' => 'Catatumbo',
            ),
            317 => 
            array (
                'id_municipio' => 445,
                'id_estado' => 23,
                'municipio' => 'Colón',
            ),
            318 => 
            array (
                'id_municipio' => 446,
                'id_estado' => 23,
                'municipio' => 'Francisco Javier Pulgar',
            ),
            319 => 
            array (
                'id_municipio' => 447,
                'id_estado' => 23,
                'municipio' => 'Páez',
            ),
            320 => 
            array (
                'id_municipio' => 448,
                'id_estado' => 23,
                'municipio' => 'Jesús Enrique Losada',
            ),
            321 => 
            array (
                'id_municipio' => 449,
                'id_estado' => 23,
                'municipio' => 'Jesús María Semprún',
            ),
            322 => 
            array (
                'id_municipio' => 450,
                'id_estado' => 23,
                'municipio' => 'La Cañada de Urdaneta',
            ),
            323 => 
            array (
                'id_municipio' => 451,
                'id_estado' => 23,
                'municipio' => 'Lagunillas',
            ),
            324 => 
            array (
                'id_municipio' => 452,
                'id_estado' => 23,
                'municipio' => 'Machiques de Perijá',
            ),
            325 => 
            array (
                'id_municipio' => 453,
                'id_estado' => 23,
                'municipio' => 'Mara',
            ),
            326 => 
            array (
                'id_municipio' => 454,
                'id_estado' => 23,
                'municipio' => 'Maracaibo',
            ),
            327 => 
            array (
                'id_municipio' => 455,
                'id_estado' => 23,
                'municipio' => 'Miranda',
            ),
            328 => 
            array (
                'id_municipio' => 456,
                'id_estado' => 23,
                'municipio' => 'Rosario de Perijá',
            ),
            329 => 
            array (
                'id_municipio' => 457,
                'id_estado' => 23,
                'municipio' => 'San Francisco',
            ),
            330 => 
            array (
                'id_municipio' => 458,
                'id_estado' => 23,
                'municipio' => 'Santa Rita',
            ),
            331 => 
            array (
                'id_municipio' => 459,
                'id_estado' => 23,
                'municipio' => 'Simón Bolívar',
            ),
            332 => 
            array (
                'id_municipio' => 460,
                'id_estado' => 23,
                'municipio' => 'Sucre',
            ),
            333 => 
            array (
                'id_municipio' => 461,
                'id_estado' => 23,
                'municipio' => 'Valmore Rodríguez',
            ),
            334 => 
            array (
                'id_municipio' => 462,
                'id_estado' => 24,
                'municipio' => 'Libertador',
            ),
        ));
        
        
    }
}
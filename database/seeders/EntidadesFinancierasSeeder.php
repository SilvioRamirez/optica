<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EntidadesFinancierasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $bancos = [
            [
                'codigo' => '0102',
                'nombre' => 'Banco de Venezuela',
                'rif' => 'G200099976',
                'logo' => 'logos/bancos/banco-venezuela.png',
                'activo' => true,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'codigo' => '0104',
                'nombre' => 'Venezolano de Crédito',
                'rif' => 'J000029709',
                'logo' => 'logos/bancos/venezolano-credito.png',
                'activo' => true,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'codigo' => '0105',
                'nombre' => 'Mercantil Banco',
                'rif' => 'J000029610',
                'logo' => 'logos/bancos/mercantil.png',
                'activo' => true,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'codigo' => '0108',
                'nombre' => 'BBVA Provincial',
                'rif' => 'J000029679',
                'logo' => 'logos/bancos/bbva-provincial.png',
                'activo' => true,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'codigo' => '0114',
                'nombre' => 'Bancaribe',
                'rif' => 'J000029490',
                'logo' => 'logos/bancos/bancaribe.png',
                'activo' => true,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'codigo' => '0115',
                'nombre' => 'Banco Exterior',
                'rif' => 'J000029504',
                'logo' => 'logos/bancos/banco-exterior.png',
                'activo' => true,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'codigo' => '0128',
                'nombre' => 'Banco Caroní',
                'rif' => 'J095048551',
                'logo' => 'logos/bancos/banco-caroni.png',
                'activo' => true,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'codigo' => '0134',
                'nombre' => 'Banesco',
                'rif' => 'J070133805',
                'logo' => 'logos/bancos/banesco.png',
                'activo' => true,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'codigo' => '0137',
                'nombre' => 'Banco Sofitasa',
                'rif' => 'J090283846',
                'logo' => 'logos/bancos/sofitasa.png',
                'activo' => true,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'codigo' => '0138',
                'nombre' => 'Banco Plaza',
                'rif' => 'J002970553',
                'logo' => 'logos/bancos/banco-plaza.png',
                'activo' => true,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'codigo' => '0146',
                'nombre' => 'Bangente C.A',
                'rif' => 'J301442040',
                'logo' => 'logos/bancos/bangente.png',
                'activo' => true,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'codigo' => '0151',
                'nombre' => 'BFC Banco Fondo Común',
                'rif' => 'J000723060',
                'logo' => 'logos/bancos/bfc.png',
                'activo' => true,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'codigo' => '0156',
                'nombre' => '100% Banco',
                'rif' => 'J085007768',
                'logo' => 'logos/bancos/100-banco.png',
                'activo' => true,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'codigo' => '0157',
                'nombre' => 'DelSur Banco',
                'rif' => 'J000797234',
                'logo' => 'logos/bancos/delsur.png',
                'activo' => true,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'codigo' => '0163',
                'nombre' => 'Banco del Tesoro',
                'rif' => 'G200051876',
                'logo' => 'logos/bancos/banco-tesoro.png',
                'activo' => true,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'codigo' => '0166',
                'nombre' => 'Banco Agrícola de Venezuela',
                'rif' => 'G200057955',
                'logo' => 'logos/bancos/banco-agricola.png',
                'activo' => true,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'codigo' => '0168',
                'nombre' => 'Bancrecer',
                'rif' => 'J316374173',
                'logo' => 'logos/bancos/bancrecer.png',
                'activo' => true,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'codigo' => '0169',
                'nombre' => 'Mi Banco',
                'rif' => 'J315941023',
                'logo' => 'logos/bancos/mi-banco.png',
                'activo' => true,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'codigo' => '0171',
                'nombre' => 'Banco Activo',
                'rif' => 'J080066227',
                'logo' => 'logos/bancos/banco-activo.png',
                'activo' => true,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'codigo' => '0172',
                'nombre' => 'Bancamiga',
                'rif' => 'J316287599',
                'logo' => 'logos/bancos/bancamiga.png',
                'activo' => true,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'codigo' => '0173',
                'nombre' => 'Banco Internacional de Desarrollo',
                'rif' => 'J294640109',
                'logo' => 'logos/bancos/bid.png',
                'activo' => true,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'codigo' => '0174',
                'nombre' => 'Banplus',
                'rif' => 'J000423032',
                'logo' => 'logos/bancos/banplus.png',
                'activo' => true,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'codigo' => '0175',
                'nombre' => 'Banco Digital de Los Trabajadores',
                'rif' => 'G200091487',
                'logo' => 'logos/bancos/banco-trabajadores.png',
                'activo' => true,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'codigo' => '0177',
                'nombre' => 'Banco de la Fuerza Armada Nacional Bolivariana',
                'rif' => 'G200106573',
                'logo' => 'logos/bancos/banfanb.png',
                'activo' => true,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'codigo' => '0178',
                'nombre' => 'N58 Banco Digital',
                'rif' => 'J503581107',
                'logo' => 'logos/bancos/n58.png',
                'activo' => true,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'codigo' => '0191',
                'nombre' => 'Banco Nacional de Crédito',
                'rif' => 'J309841327',
                'logo' => 'logos/bancos/bnc.png',
                'activo' => true,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'codigo' => '0601',
                'nombre' => 'Instituto Municipal de Crédito Popular',
                'rif' => 'J000145903',
                'logo' => 'logos/bancos/imcp.png',
                'activo' => true,
                'created_at' => now(),
                'updated_at' => now()
            ]
        ];

        DB::table('entidades_financieras')->insert($bancos);
    }
}

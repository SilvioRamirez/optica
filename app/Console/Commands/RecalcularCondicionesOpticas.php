<?php

namespace App\Console\Commands;
use App\Models\Formulario;
use App\Support\OpticalEvaluator;

use Illuminate\Console\Command;

class RecalcularCondicionesOpticas extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'optica:recalcular-condiciones-opticas {--chunk=500}';
    
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Recalcula y guarda las condiciones ópticas para todas las órdenes existentes';

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        $chunk = (int)$this->option('chunk');

        $total = Formulario::count();
        $this->info("Procesando {$total} órdenes en bloques de {$chunk}...");

        $bar = $this->output->createProgressBar($total);
        $bar->start();

        Formulario::chunk($chunk, function ($formularios) use ($bar) {
            foreach ($formularios as $formulario) {
                $data = [
                    'od_esf' => $formulario->od_esf,
                    'od_cil' => $formulario->od_cil,
                    'oi_esf' => $formulario->oi_esf,
                    'oi_cil' => $formulario->oi_cil,
                    'add'    => $formulario->add,
                ];

                $result = OpticalEvaluator::evaluate($data);

                $formulario->condicionOptica()->updateOrCreate(
                    ['formulario_id' => $formulario->id],
                    [
                        'eval_esf_od'   => $result['AQ_EVAL_ESF_OD'],
                        'eval_esf_oi'   => $result['AR_EVAL_ESF_OI'],
                        'eval_esf'      => $result['AS_EVAL_ESF'],
                        'eval_cil_od'   => $result['AT_EVAL_CIL_OD'],
                        'eval_cil_oi'   => $result['AU_EVAL_CIL_OI'],
                        'eval_cil'      => $result['AV_EVAL_CIL'],
                        'cond_od'       => $result['AW_COND_OD'],
                        'cond_oi'       => $result['AX_COND_OI'],
                        'eval_oj'       => $result['AY_EVAL_OJ'],
                        'presbicia'     => $result['AZ_PRESBICIA'],
                        'miopia_magna'  => $result['BA_MIOPIA_MAGNA'],
                    ]
                );

                $bar->advance();
            }
        });

        $bar->finish();
        $this->newLine(2);
        $this->info("¡Listo! Todas las condiciones ópticas fueron recalculadas.");
        return Command::SUCCESS;
    }
}

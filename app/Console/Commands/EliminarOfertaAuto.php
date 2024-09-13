<?php

namespace App\Console\Commands;

use App\Models\Oferta;
use Carbon\Carbon;
use Illuminate\Console\Command;

class EliminarOfertaAuto extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'delete:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Eliminar ofertas antiguas de la tabla';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $limite = Carbon::now()->subDays(90);
        Oferta::where('created_at', '<', $limite)->delete();
        $this->info('Ofertas antiguas eliminadas con exito');
    }
}

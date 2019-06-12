<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Services;
use Illuminate\Support\Facades\DB;

class CreateReport extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:report {date}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Genera un informe sumarizado sobre las descripciones';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
      if($this->validateDate($this->argument('date')))
      {
        $fecha = $this->argument('date');
        $headers = ['Nuevas del día', 'Canceladas en el día', 'Activas al final del día'];
        //Cantidad de nuevas suscripciones en el día
        $news = DB::table('services')
          ->whereBetween('created_at', [$fecha." 00:00:00", $fecha." 23:59:59"])->count();
        //Cantidad de suscripciones canceladas en el día
        $cancel = DB::table('services')
          ->whereBetween('created_at', [$fecha." 00:00:00", $fecha." 23:59:59"])
          ->where('activo','=',false)
          ->count();
        //Cantidad de suscripciones activas al final del día
        $active = DB::table('services')
          ->whereBetween('created_at', [$fecha." 00:00:00", $fecha." 23:59:59"])
          ->where('activo','=',true)
          ->count();
        $this->table($headers, [[$news,$cancel,$active]]);
      }
      else{
        $this->info('El formato de la fecha es incorrecto!');
      }
    }
    
    
    
    /** Métodos Privados **/
  
  /**
   * Verifica si una fecha dada es correcta
   * date @date
   * @return boolean
   */
  private function validateDate($date)
  {
    $d = \DateTime::createFromFormat('Y-m-d', $date);
    return $d && $d->format('Y-m-d') === $date;
  }
}

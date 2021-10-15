<?php

namespace Database\Seeders;

use App\Models\Note;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;
use PhpParser\Node\Expr\Cast\Double;
use Ramsey\Uuid\Type\Decimal;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
     
        $activities = [
            ['title'=>'Excursion a Toledo de medio día','description' =>"Disfrutaremos de una mañana unica en Toledo, una de las ciudades medievales mejor conservadas de España",'date_ini'=>'2021-09-27','date_end'=>'2021-10-02','pu'=>48,'popularity'=>8],
            ['title'=>'Visita Guiada por el palacio real','description' =>"Descubrirás la historia de la realeza y los secretos mejor guardados del Palacio Real de Madrid",'date_ini'=>'2021-09-27','date_end'=>'2021-10-06','pu'=>25,'popularity'=>7],
            ['title'=>'Visita Guiada por el museo del Prado','description' =>"Ideal para conocer  en tan sólo dos horas. ¡Además nos saltaremos las colas",'date_ini'=>'2021-09-27','date_end'=>'2021-10-03','pu'=>33,'popularity'=>9],
            ['title'=>'Excursion al Escorial y Valle de los Caidos','description' =>"La excursión a El Escorial y Valle de los Caídos nos permitirá conocer estos dos monumentos en un mismo día.",'date_ini'=>'2021-09-27','date_end'=>'2021-10-09','pu'=>59,'popularity'=>10],
            ['title'=>'Excursion a Ávila y Segovia','description' =>"Murallas, castillos, catedrales y el acueducto romano más famoso del mundo.",'date_ini'=>'2021-09-27','date_end'=>'2021-10-10','pu'=>71,'popularity'=>6]
        ];
        DB::table('activities')->insert($activities);
    }
}

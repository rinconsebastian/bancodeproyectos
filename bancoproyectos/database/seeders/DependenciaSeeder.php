<?php

namespace Database\Seeders;

use App\Models\Dependencia;
use Illuminate\Database\Seeder;

class DependenciaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
       $dependencia = new Dependencia();
       $dependencia->name = "Alcaldía";
       $dependencia->save();

       $dependencia2 = new Dependencia();
       $dependencia2->name = "Secretaria de Planeación";
       $dependencia2->dependencia_id = $dependencia->id;
       $dependencia2->save();

       $dependencia3 = new Dependencia();
       $dependencia3->name = "Secretaria General";
       $dependencia3->dependencia_id = $dependencia->id;
       $dependencia3->save();

       $dependencia4 = new Dependencia();
       $dependencia4->name = "Secretaria de Gobierno";
       $dependencia4->dependencia_id = $dependencia->id;
       $dependencia4->save();

       $dependencia5 = new Dependencia();
       $dependencia5->name = "Secretaria de Hacienda";
       $dependencia5->dependencia_id = $dependencia->id;
       $dependencia5->save();

       $dependencia6 = new Dependencia();
       $dependencia6->name = "Unida de servicios Públicos";
       $dependencia6->dependencia_id = $dependencia->id;
       $dependencia6->save();


       $dependencia7 = new Dependencia();
       $dependencia7->name = "Secretaria de Obras Públicas";
       $dependencia7->dependencia_id = $dependencia->id;
       $dependencia7->save();

       $dependencia8 = new Dependencia();
       $dependencia8->name = "Control interno";
       $dependencia8->dependencia_id = $dependencia->id;
       $dependencia8->save();

       $dependencia8 = new Dependencia();
       $dependencia8->name = "Secretaría de Movilidad";
       $dependencia8->dependencia_id = $dependencia->id;
       $dependencia8->save();

       $dependencia9 = new Dependencia();
       $dependencia9->name = "Despacho del Alcalde";
       $dependencia9->dependencia_id = $dependencia->id;
       $dependencia9->save();

       $dependencia10 = new Dependencia();
       $dependencia10->name = "Insituto para la Recreación y el Deporte";
       $dependencia10->dependencia_id = $dependencia->id;
       $dependencia10->save();

       $dependencia10 = new Dependencia();
       $dependencia10->name = "Comisaría de Familia";
       $dependencia10->dependencia_id = $dependencia->id;
       $dependencia10->save();
        


    }
}

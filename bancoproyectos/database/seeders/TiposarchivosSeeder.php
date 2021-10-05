<?php

namespace Database\Seeders;

use App\Models\Tiposarchivos;
use Illuminate\Database\Seeder;

class TiposarchivosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $n = 1;
        //
       $tipo = new Tiposarchivos();
       $tipo->id = $n;
       $tipo->grupo = "proyecto";
       $tipo->texto = "Carta de presentación";
       $tipo->save();
       $n = $n + 1;

       
       $tipo1 = new Tiposarchivos();
       $tipo1->id = $n;
       $tipo1->grupo = "proyecto";
       $tipo1->texto = "Certificado de articulación con Plan de desarrollo Municipal";
       $tipo1->save();
       $n = $n + 1;


       $tipo2 = new Tiposarchivos();
       $tipo2->id = $n;
       $tipo2->grupo = "proyecto";
       $tipo2->texto = "Documento técnico";
       $tipo2->save();
       $n = $n + 1;

       $tipo3 = new Tiposarchivos();
       $tipo3->id = $n;
       $tipo3->grupo = "proyecto";
       $tipo3->texto = "Cronograma";
       $tipo3->save();
       $n = $n + 1;

       $tipo03 = new Tiposarchivos();
       $tipo03->id = $n;
       $tipo03->grupo = "proyecto";
       $tipo03->texto = "Proyecto Formulado en Metodología MGA";
       $tipo03->save();
       $n = $n + 1;

       $tipo4 = new Tiposarchivos();
       $tipo4->id = $n;
       $tipo4->grupo = "proyecto";
       $tipo4->texto = "Diagnóstico general";
       $tipo4->save();
       $n = $n + 1;

       $tipo5 = new Tiposarchivos();
       $tipo5->id = $n;
       $tipo5->grupo = "proyecto";
       $tipo5->texto = "Árbol de problemas";
       $tipo5->save();
       $n = $n + 1;

       $tipo6 = new Tiposarchivos();
       $tipo6->id = $n;
       $tipo6->grupo = "proyecto";
       $tipo6->texto = "Árbol de objetivos";
       $tipo6->save();
       $n = $n + 1;

       $tipo7 = new Tiposarchivos();
       $tipo7->id = $n;
       $tipo7->grupo = "proyecto";
       $tipo7->texto = "Presupuesto General de Inversión";
       $tipo7->save();
       $n = $n + 1;

       $tipo8 = new Tiposarchivos();
       $tipo8->id = $n;
       $tipo8->grupo = "proyecto";
       $tipo8->texto = "Estudio de mercado";
       $tipo8->save();
       $n = $n + 1;

       $tipo9 = new Tiposarchivos();
       $tipo9->id = $n;
       $tipo9->grupo = "proyecto";
       $tipo9->texto = "Certificación de precios";
       $tipo9->save();
       $n = $n + 1;

       $tipo10 = new Tiposarchivos();
       $tipo10->id = $n;
       $tipo10->grupo = "proyecto";
       $tipo10->texto = "Análisis de Precios Unitarios";
       $tipo10->save();
       $n = $n + 1;

       $tipo11 = new Tiposarchivos();
       $tipo11->id = $n;
       $tipo11->grupo = "proyecto";
       $tipo11->texto = "Discriminación de AIU";
       $tipo11->save();
       $n = $n + 1;

       $tipo12 = new Tiposarchivos();
       $tipo12->id = $n;
       $tipo12->grupo = "proyecto";
       $tipo12->texto = "Factor Multiplicador";
       $tipo12->save();
       $n = $n + 1;

       $tipo13 = new Tiposarchivos();
       $tipo13->id = $n;
       $tipo13->grupo = "proyecto";
       $tipo13->texto = "Presupuesto de interventoría";
       $tipo13->save();
       $n = $n + 1;

       $tipo14 = new Tiposarchivos();
       $tipo14->id = $n;
       $tipo14->grupo = "proyecto";
       $tipo14->texto = "Plano de localización";
       $tipo14->save();
       $n = $n + 1;

       $tipo15 = new Tiposarchivos();
       $tipo15->id = $n;
       $tipo15->grupo = "proyecto";
       $tipo15->texto = "Estudio de alternativas de predios";
       $tipo15->save();
       $n = $n + 1;

       $tipo16 = new Tiposarchivos();
       $tipo16->id = $n;
       $tipo16->grupo = "proyecto";
       $tipo16->texto = "Avaluó comercial de los predios seleccionados-";
       $tipo16->save();
       $n = $n + 1;

       $tipo17 = new Tiposarchivos();
       $tipo17->id = $n;
       $tipo17->grupo = "proyecto";
       $tipo17->texto = "Estudio de Títulos";
       $tipo17->save();
       $n = $n + 1;
       
       $tipo18 = new Tiposarchivos();
       $tipo18->id = $n;
       $tipo18->grupo = "proyecto";
       $tipo18->texto = "Estudios y especificaciones técnicas (diseños, memorias de cálculo, planos etc.)";
       $tipo18->save();
       $n = $n + 1;
       
       $tipo19 = new Tiposarchivos();
       $tipo19->id = $n;
       $tipo19->grupo = "proyecto";
       $tipo19->texto = "certificado en el cual conste que se cumplen las normas técnicas colombianas (NTC) aplicables";
       $tipo19->save();
       $n = $n + 1;

       $tipo20 = new Tiposarchivos();
       $tipo20->id = $n;
       $tipo20->grupo = "proyecto";
       $tipo20->texto = "Certificado de tradición y libertad menor a 3 meses";
       $tipo20->save();
       $n = $n + 1;

       $tipo21 = new Tiposarchivos();
       $tipo21->id = $n;
       $tipo21->grupo = "proyecto";
       $tipo21->texto = "Copia matrícula profesional de los profesionales que firman los documentos soporte del presupuesto";
       $tipo21->save();
       $n = $n + 1;

       $tipo21 = new Tiposarchivos();
       $tipo21->id = $n;
       $tipo21->grupo = "proyecto";
       $tipo21->texto = "Fotografías o evidencias";
       $tipo21->save();
       $n = $n + 1;

       $tipo22 = new Tiposarchivos();
       $tipo22->id = $n;
       $tipo22->grupo = "revision";
       $tipo22->texto = "Observaciones generales";
       $tipo22->save();
       $n = $n + 1;
        


    }
}

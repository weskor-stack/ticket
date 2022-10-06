<?php

namespace App\Http\Controllers;


//se ponen los modelos de cada uno de las tablas que necesitamos llamar
use App\Models\Project;
use App\Models\ProjectStatus;
use App\Models\ProjectManager;
use App\Models\ProjectDatum;
use App\Models\Employee;
use App\Models\ProjectPriority;
use App\Models\Warranty;
//de otra base de datos 


use Illuminate\Http\Request;

class WarrantyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     //en la ventana index necesitamos generar una función
    public function index()
    {
        //agregamos una variable en este caso llamada Warranty y despues le decirmos que sea con respecto al modelo y que el modelo sea paginado

        //pluck es para tomar dos datos
       // $consulta_db = Project::pluck('name','project_id');
       //en este caso tomo todos los datos del modelo Project que es el modelo que tomé para la tabla projects
       $consulta_db = Project::all();
       $consulta_empleados = Employee::all();
       $consulta_project_mannager = ProjectManager::all();

                 //los retunr json nos dan vista de las salidas como si de un print se tratara
            
        /*retorno a la vista de index, que se encuentra en la carpeta Warranty un compilado de las dos tablas que voy a usar, en este caso la 
        variable Warranty y la variable consulta_db*/
        $consulta_Project_Status = ProjectStatus::all();
        
        //return response()->json($consulta_Project_Status);
        $consulta_prioridades = ProjectPriority::all();
        $consulta_fechas = ProjectDatum::all();

        $consulta_garantia = Warranty::all();
        
        
        return view('Warranty.index', compact('consulta_db','consulta_Project_Status','consulta_prioridades','consulta_fechas','consulta_empleados','consulta_project_mannager','consulta_garantia'));   
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        
        $Warranty=Project::paginate();
        //pluck es para tomar dos datos
       // $consulta_db = Project::pluck('name','project_id');
       $consulta_db = Project::all();


       //return response()->json($consulta_db);   
       // esto sirve para poder mandar datos de consulta_db es como un print

        //creo una variable para poder consultar los proyectos
       $consulta_Project_Status = ProjectStatus::all();
        

       //para este tomamos los valores que se encuentran dentro del compact y se ponen directamente en Warranty/index
        return view('Warranty.index', compact('Warranty','consulta_db','consulta_Project_Status'));
        
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //reglas de validación
        $reglas=[
            'project_id'=>'required|int|max:1000',
            'date_start'=>'required|date|max:100',
            'date_end'=>'required|date|max:100'
        ];

        $msg_error=[
            'required'=>':attribute'
        ];

        $this->validate($request, $reglas, $msg_error);







       // $datosWarranty =request()->all();
        //creamos una variable llamada datosWarranty que manda en un json todos los datos de la página exceptuando el token
        $datosWarranty =request()->except('_token','op_proyecto','tiene_garantia');
        
         //return response()->json($datosWarranty);
        //dentro del modelo de Warranty se insertan los datos de $datosWarranty
        

        Warranty::insert($datosWarranty);
        //dsds
      //return response()->json($datosWarranty);
      return redirect()->route('Warranty.index')
      ->with('success', 'creado correctamente');
 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Warranty  $Warranty
     * @return \Illuminate\Http\Response
     */
    public function show(Warranty $Warranty)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Warranty  $Warranty
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $warranty = Warranty::findOrFail($id);
        return view('Warranty.edit', compact('warranty'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Warranty  $Warranty
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Warranty $Warranty)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Warranty  $Warranty
     * @return \Illuminate\Http\Response
     */
    public function destroy(Warranty $Warranty)
    {
        //
        
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Empleados; //Para utilizar el modelo de empleados

class EmpleadosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empleados= Empleados::select('id','codigo','nombre','salarioDolares','salarioPesos','correo','activo')->where('eliminado','0')->paginate(10);
        return view('Empleados.index',compact('empleados'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Empleados.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $this->validate($request,[
            'nombre'=>'required|regex:/^[a-zA-Z\s]+$/u',
            'codigo'=>'required|unique:empleados', 
             'salarioDolares'=>'required|numeric|min:1', 
             'salarioPesos'=>'required|numeric|min:1', 
             'direccion'=>'required', 
             'estado'=>'required', 
             'ciudad'=>'required',
             'telefono'=>'required',
             'correo'=>'required|email']);

        $arrayUpdate =[
            'nombre' => $request->get("nombre"),
            'codigo' => $request->get('codigo'),
            'salarioDolares' => $request->get('salarioDolares'),
            'salarioPesos' => $request->get('salarioPesos'),
            'direccion' => $request->get('direccion'),
            'estado' => $request->get('estado'),
            'ciudad' => $request->get('ciudad'),
            'telefono' => $request->get('telefono'),
            'correo' => $request->get('correo'),
            'activo' => $request->has('activo') ? $request->get('activo') : 0,
            'eliminado' => $request->has('eliminado') ? $request->get('eliminado') : 0
        ];

        Empleados::create($arrayUpdate);
        return redirect()->route('empleados.index')->with('success','Registro creado satisfactoriamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $empleados=Empleados::find($id);
        return  view('empleados.show',compact('empleados'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $empleados=Empleados::find($id);
        return view('empleados.edit',compact('empleados'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $this->validate($request,[
            'nombre'=>'required|regex:/^[a-zA-Z\s]+$/u',
            'codigo'=>'required', 
             'salarioDolares'=>'required|numeric|min:1', 
             'salarioPesos'=>'required|numeric|min:1', 
             'direccion'=>'required', 
             'estado'=>'required', 
             'ciudad'=>'required',
             'telefono'=>'required',
             'correo'=>'required|email']);
        
        Empleados::find($id)->update($request->all());
        return redirect()->route('empleados.index')->with('success','Registro actualizado satisfactoriamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Empleados::find($id)->delete();
        return redirect()->route('empleados.index')->with('success','Registro eliminado satisfactoriamente');
    }

    public function cambiarEstatusEm($id)
    {
    
        $CapturarEstatus = Empleados::where('id',$id)->value('activo');
        if($CapturarEstatus == 0){
             Empleados::find($id)->update(['activo'=> 1]);
        }else{
             Empleados::find($id)->update(['activo'=> 0]);
        }

        return redirect()->route('empleados.index')->with('success','Se cambio el estatus correctamente');
       
    }

    public function validarCodigo($codigo){
        $codigo = Empleados::where('codigo',$codigo)->first();

        if($codigo === null){
            return response()->json(['data'=>'Codigo disponible','validar'=>true]);
        }else{
            return response()->json(['data'=> 'EL código ya existe, intente con otro','validar'=>false]);
        }
    }
}

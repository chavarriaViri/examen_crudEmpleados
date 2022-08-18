@extends('layouts.layout')
@section('content')
<div class="row">
    <section class="content">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-primary">
                @if(\Illuminate\Support\Facades\Session::has('success'))
                    <div class="alert alert-info">
                        {{\Illuminate\Support\Facades\Session::get('success')}}
                    </div>
                @endif
                <div class="panel-body">

                    <div align="center"><h3>Lista de empleados</h3></div>
                
                    <div class="pull-right">
                        <div class="btn-group">
                            <a href="{{route('empleados.create')}}" class="btn btn-primary">Agregar empleado</a>
                        </div>
                    </div>
                    
                    <br><br>
                    <div class="table-container">
                        <br><br>
                        <table id="tablaEmpleados" class="table table-bordered table-striped">
                            <thead>
                                <th>Código</th>
                                <th>Nombre</th>
                                <th>Salario en dolares</th>
                                <th>Salario en pesos</th>
                                <th>Correo</th>
                                <th>Activo</th>
                                <th colspan="4" >Acciones</th>
                            </thead>
                            <tbody>

                            @if($empleados->count())
                                @foreach($empleados as $empleado)
                                    <tr>
                                        <td>{{$empleado->codigo}}</td>
                                        <td>{{$empleado->nombre}}</td>
                                        <td>{{$empleado->salarioDolares}}</td>
                                        <td>{{$empleado->salarioPesos}}</td>
                                        <td>{{$empleado->correo}}</td>
                                        <td>{{$empleado->activo == 1 ? 'Si' : 'No'}}</td>
                                        
                                            <td><a href = "{{route('empleados.show',$empleado->id)}}" class="btn btn-warning"> Mostrar </a></td>
                                            <td><a href = "{{route('empleados.edit',$empleado->id)}}" class="btn btn-primary"> Editar </a></td>
                                            <td>
                                                
                                                <a href="  {{action('EmpleadosController@cambiarEstatusEm',$empleado->id) }}"  class="btn btn-info"> {{$empleado->activo == 1 ? 'Inactivar': 'Activar'}} </a>
                                        
                                            </td>

                                            <td>
                                                <form action = "{{route('empleados.destroy',$empleado->id)}}" method = "post">
                                                    {{csrf_field()}}
                                                    <input name="_method" type="hidden" value="delete">
                                                    <input type="submit" onclick ="return confirm('¿Quieres eliminarlo?') " value="Eliminar"  class="btn btn-danger">     
                                                </form>
                                            </td>
                                        
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="6">No hay registros</td>
                                </tr>
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
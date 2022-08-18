@extends('layouts.layout')
@section('content')
    <div class="row">
        <section class="content">
            <div class="col-md-8 col-md-offset-2">
                @if(count($errors) >0)
                    <div class="alert alert-warning">
                        {!! trans('validation.mesg_error_validate') !!}

                        <ul>
                            @foreach($errors->all() as $error)
                                <li> {{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"> Editar Empleado</h3>
                    </div>
                    <div class="panel-body">
                        <form method="POST" action="{{route('empleados.update', $empleados->id)}}" role="form">
                            {{csrf_field()}}
                            
                            <input name="_method" type="hidden" value="PUT">

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="text" name="codigo" id="codigo" class="form-control input-sm" placeholder="Código del empleado" value="{{ old('codigo', $empleados->codigo) }}" readonly="true">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="text" name="nombre" id="nombre" class="form-control input-sm" placeholder="Nombre del empleado" value="{{ old('nombre', $empleados->nombre) }}">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input name="salarioPesos" id="salarioPesos" class="form-control input-sm" placeholder="Salario en pesos" value="{{ old('salarioPesos',$empleados->salarioPesos) }}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input name="salarioDolares" id="salarioDolares" class="form-control input-sm" placeholder="salario en Dolares" value="{{ old('salarioDolares', $empleados->salarioDolares) }}" readonly="true">
                                    </div>
                                </div>
                                
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="text" name="direccion" id="direccion" class="form-control input-sm" placeholder="Direccion" value="{{ old('direccion',$empleados->direccion) }}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="text" name="estado" id="estado" class="form-control input-sm" placeholder="Estado" value="{{ old('estado',$empleados->estado) }}">
                                    </div>
                                </div>
                           </div>

                            <div class="row">
                                 <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="text" name="ciudad" id="ciudad" class="form-control input-sm" placeholder="ciudad" value="{{ old('ciudad',$empleados->ciudad) }}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="text" name="telefono" id="telefono" class="form-control input-sm" placeholder="telefono" value="{{ old('telefono',$empleados->telefono) }}">
                                    </div>
                                </div>
                                
                            </div>
                            
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="text" name="correo" id="correo" class="form-control input-sm" placeholder="correo" value="{{ old('correo',$empleados->correo) }}">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-control">Activo</label>
                                        <input type="checkbox" name="activo" id="activo" class="form-control input-sm" {{$empleados->activo == 1 ? 'checked': ''}}>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-control">Eliminado</label>
                                        <input type="checkbox" name="eliminado" id="eliminado" class="form-control input-sm"{{$empleados->eliminado == 1 ? 'checked': ''}}>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-success" >Actualizar</button>
                                    <a href="{{ route('empleados.index')  }}" class="btn btn-default"> Atras</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </section>

    </div>
@endsection

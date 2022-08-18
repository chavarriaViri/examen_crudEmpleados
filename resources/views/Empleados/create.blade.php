@extends('layouts.layout')
@section('content')
    <div class="row">
        <section class="content">
            <div class="col-md-8 col-md-offset-2">
                @if(count($errors) >0)
                    <div class="alert alert-warning">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li> {{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"> Agregar Empleado</h3>
                    </div>
                    <div class="panel-body">
                        <form method="POST" action="{{route('empleado.store')}}">
                            {{csrf_field()}}

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="text" name="codigo" id="codigo" class="form-control input-sm" placeholder="Código del empleado" value="{{ old('codigo') }}">
                                    </div>
                                    <div class="form-group">
                                        <a type="button" name="validarC" id="validarC"  class="btn btn-success" >Validar Código</a>
                                    </div>
                                    <div class="form-group">
                                        <label name="codigoRes" id="codigoRes"></label>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="text" name="nombre" id="nombre" class="form-control input-sm" placeholder="Nombre del empleado" value="{{ old('nombre') }}">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input name="salarioPesos" id="salarioPesos" class="form-control input-sm" placeholder="Salario en pesos" value="{{ old('salarioPesos') }}">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input name="salarioDolares" id="salarioDolares" class="form-control input-sm" placeholder="salario en Dolares" value="{{ old('salarioDolares') }}" readonly="true">
                                    </div>
                                </div>
                                
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="text" name="direccion" id="direccion" class="form-control input-sm" placeholder="Direccion" value="{{ old('direccion') }}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="text" name="estado" id="estado" class="form-control input-sm" placeholder="Estado" value="{{ old('estado') }}">
                                    </div>
                                </div>
                           </div>

                            <div class="row">
                                 <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="text" name="ciudad" id="ciudad" class="form-control input-sm" placeholder="ciudad" value="{{ old('ciudad') }}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="text" name="telefono" id="telefono" class="form-control input-sm" placeholder="telefono" value="{{ old('telefono') }}">
                                    </div>
                                </div>
                                
                            </div>
                            
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="text" name="correo" id="correo" class="form-control input-sm" placeholder="correo" value="{{ old('correo') }}">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Activo</label>
                                        <input type="checkbox" name="activo" id="activo" class="form-control input-sm">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Eliminado</label>
                                        <input type="checkbox" name="eliminado" id="eliminado" class="form-control input-sm">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-success" >Guardar</button>
                                    <a href="{{ route('empleados.index')  }}" class="btn btn-default"> Atras</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </section>

    </div>

    <script type="text/javascript">
       
        $(document).on('click', '#validarC', function(){
            var codigo = $('#codigo').val();
            $.ajax({
                type: "GET",
                url: "{{ url('/validar/empleado') }}"+'/'+codigo,

                success: function(response){
                    if(response.validar === true){
                         //alert(response.data);
                        $("#codigoRes").text(response.data);
                    }

                    if(response.validar === false){
                        //alert(response.data);
                        $('#codigoRes').text(response.data);
                    }
                }
            });
        });

    </script>

@endsection


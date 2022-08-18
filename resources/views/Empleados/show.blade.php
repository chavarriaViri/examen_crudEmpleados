@extends('layouts.layout')
@section('content')
    <div class="row">
        <section class="content">
            <div class="col-md-8 col-md-offset-2">

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Datos de empleado</h3>
                    </div>
                    <div class="panel-body">
                        <div class="table-container">
                            <input name="_method" type="hidden" value="PATCH">
                            <div class="row">
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label >Codigo: {{$empleados->codigo}}</label>
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label>Nombre: {{$empleados->nombre}}</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <label >Salario en dolares {{$empleados->salarioDolares}}</label>
                                        </div>
                                    </div>
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <label>Salario en pesos:</label>
                                            <label id="salarioPesosS">{{$empleados->salarioPesos}}</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <label>Direccion {{$empleados->direccion}}</label>
                                        </div>
                                    </div>
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <label>Estado: {{$empleados->estado}}</label>
                                        </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label>Ciudad {{$empleados->ciudad}}</label>
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label>Telefono: {{$empleados->telefono}}</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label >Correo {{$empleados->correo}}</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label>Activo: {{$empleados->activo == 1 ? 'Si': 'No'}}</label>
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div>
                                        <label >Eliminado: {{$empleados->eliminado == 1 ? 'Si': 'No'}}</label>
                                    </div>
                                </div>
                            </div>

                            <div class="table-container">

                                <strong><h4>Proyección salarial en los proximos 6 meses con aumento de 5% mensual</h4></strong>
                                <br>
                                <table id="tablaEmpleados" class="table table-bordered table-striped">
                                    <thead>
                                        <th>Mes</th>
                                        <th>Salario en Pesos</th>
                                        <th>Salario en dolares</th>
                                    </thead>
                                    <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td><input id="mes1" disabled></td>
                                                <td><input id="mes1D" disabled></td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td><input id="mes2" disabled></td>
                                                <td><input id="mes2D" disabled></td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td><input id="mes3" disabled></td>
                                                <td><input id="mes3D" disabled></td>
                                            </tr>
                                            <tr>
                                                <td>4</td>
                                                <td><input id="mes4" disabled></td>
                                                <td><input id="mes4D" disabled></td>
                                            </tr>
                                            <tr>
                                                <td>5</td>
                                                <td><input id="mes5" disabled></td>
                                                <td><input id="mes5D" disabled></td>
                                            </tr>
                                            <tr>
                                                <td>6</td>
                                                <td><input id="mes6" disabled></td>
                                                <td><input id="mes6D" disabled></td>
                                            </tr>

                                    </tbody>
                                </table>

                                <div class="row">

                                    <div class="col-xs-3 col-sm-3 col-md-3">
                                        <a href="{{ route('empleados.index') }}" class="btn btn-info btn-block" >Atrás</a>
                                    </div>

                                </div>
                            </div>
                    </div>

                </div>
            </div>
        </section>
@endsection
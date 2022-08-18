<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empleados extends Model
{
    protected $table = 'empleados';
    protected $fillable = ['id','codigo','nombre', 'salarioDolares', 'salarioPesos','direccion','estado','ciudad','telefono','correo','activo','eliminado'];
}

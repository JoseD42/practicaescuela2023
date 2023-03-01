<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Alumno;

class AlumnosController extends Controller
{
    public function index() {
        $alumnos = Alumno::all();

        $argumentos = array();
        $argumentos['alumnos'] = $alumnos;

        return view('alumnos.index',$argumentos);
    }

    public function create() {
        $argumentos = array();
        return view('alumnos.create',$argumentos);
    }

    public function store(Request $request) {
        $nuevoAlumno = new Alumno();
        //Las columnas de la tabla asociada
        //se representan mediante propiedades del objeto
        $nuevoAlumno->nombre = $request->input('nombre');
        $nuevoAlumno->save();

        return redirect()->route('alumnos.index');
    }
}

<?php

namespace App\Http\Controllers;
use App\Models\personas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class peronascontrol extends Controller
{
  public function insertar(Request $request)
  {

    //$validatedData = $request->validate([
    //    'cedula' => 'required|string',
    //   'nombre' => 'required|string|max:255',
    //   'apellido' => 'required|string|max:255',
    //   'nacimiento' => 'required|date',
    //  'sexo' => 'required|string|max:50',
    //  'numero' => 'required|string',
    //    'ramo' => 'required|string|max:255',

    // ]);

    $persona = new personas();
    $persona->CI = $request->cedula;
    $persona->nombre = $request->nombre;
    $persona->apellido = $request->apellido;
    $persona->nacimiento = $request->nacimiento;
    $persona->sexo = $request->sexo;
    $persona->numero = $request->numero;
    $persona->ramo = $request->ramo;
    $persona->save();

    return redirect()->back()->with('success', 'Formulario enviado correctamente.');
  }

  public function verlista()
  {
    $personas = personas::all();
    return view('lista', compact('personas'));
  }
}




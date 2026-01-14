<?php

namespace App\Http\Controllers;
use App\Models\personas;
use App\Models\Contratos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class peronascontrol extends Controller
{
  public function insertar(Request $request)
  {


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
    $contratos = Contratos::all();
    return view('lista', compact('personas', 'contratos'));
  }

  public function asignar(Request $request)
  {
    $contrato = new Contratos();
    $contrato->numero = $request->numero;
    $contrato->Nombre = $request->nombre;
    $contrato->id_persona = $request->persona_id;
    $contrato->save();

    return redirect()->back()->with('success', 'Contrato creado y asignado correctamente.');
  }
}




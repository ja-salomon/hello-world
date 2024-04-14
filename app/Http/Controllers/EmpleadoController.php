<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Empleado;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Http\Middleware\ValidateCsrfToken;
use Illuminate\Support\Facades\Log;


class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $empleados = Empleado::all();
        return view('empleado/listing', compact('empleados'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('empleado.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $token = $request->session()->token();
        Log::error("token $token");
        $mensajes = [
            'nombre.required' => 'El nombre es obligatorio y debe ser alfabetico',
            'edad.required' => 'La edad es obligatoria',
            // Otros mensajes personalizados
        ];
        
        $request->validate([
            'nombre' => 'required|string',
            'edad' => 'required|integer|between:0,120',
            'puesto' => 'required|string',
            'fecha_nacimiento' => 'required|date|after:1900-01-01',
            'sueldo_diario' => 'required|numeric',
        ], $mensajes);

        $Datos = $request->all();
        unset($Datos["_token"]);
        $Empleado = new Empleado();
        $Empleado->nombre = $Datos['nombre'];
        $Empleado->edad = $Datos['edad'];
        $Empleado->puesto = $Datos['puesto'];
        $Empleado->fecha_nacimiento = $Datos['fecha_nacimiento'];
        $Empleado->sueldo_diario = $Datos['sueldo_diario'];
        $Empleado->save();

        return redirect()->route('empleado.listing')->with('success', 'Empleado registrado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $empleado = Empleado::find($id); // Retrieve employee by ID
        if (!$empleado) {
            return redirect()->route('empleado.listing')->with('error', 'Empleado no encontrado');
        }

        return view('empleado.show', compact('empleado')); // Pass data to view
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $old = Empleado::find($id); // Retrieve employee by ID
        if (!$old) {
            return redirect()->route('empleado.listing')->with('error', 'Empleado no encontrado');
        }

        return view('empleado.edit', compact('old')); // Pass data to view
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $Empleado = Empleado::find($id); // Retrieve employee by ID
        if (!$Empleado) {
            return redirect()->route('empleado.listing')->with('error', 'Empleado no encontrado al actualizar id:$id');
        }

        $validatedData = $request->validate([
            'nombre' => 'required|string|max:255',
            'puesto' => 'required|string|max:255',
            'edad' => 'required|integer|min:18',
            'fecha_nacimiento' => 'required|date',
            'sueldo_diario' => 'required|numeric|min:0',
        ]);
        $Empleado->nombre = $validatedData['nombre'];
        $Empleado->edad = $validatedData['edad'];
        $Empleado->puesto = $validatedData['puesto'];
        $Empleado->fecha_nacimiento = $validatedData['fecha_nacimiento'];
        $Empleado->sueldo_diario = $validatedData['sueldo_diario'];
        $Empleado->save();

        return redirect()->route('empleado.listing')->with('success', 'Empleado registrado correctamente');    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $empleado = Empleado::find($id); // Retrieve employee by ID
        if (!$empleado) {
            session()->flash('error', '¡Empleado no encontrado!');
        } else
        { 
            $empleado->delete(); // Delete the employee record
            session()->flash('success', '¡Empleado eliminado!');
        }
       
        return $this->index();
    }
}

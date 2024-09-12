<?php

namespace App\Http\Controllers;

use App\Models\Facultad;
use App\Models\Area;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class FacultadController extends Controller
{
    public function index(Request $request)
    {
        $areas = Area::all(); // Obtener todas las áreas

        if ($request->ajax()) {
            $data = Facultad::with('area')->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a href="javascript:void(0)" data-id="' . $row->id_facultad . '" class="edit btn btn-primary btn-sm editRecord">Editar</a>';
                    $btn .= ' <a href="javascript:void(0)" data-id="' . $row->id_facultad . '" class="btn btn-danger btn-sm deleteRecord">Eliminar</a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('facultades.index', compact('areas')); // Pasar las áreas a la vista
    }

    public function store(Request $request)
    {
        // Validación de los datos
        $validatedData = $request->validate([
            'nombre' => 'required|string|max:255',
            'nombre_abreviado' => 'required|string|max:255',
            'direccion' => 'required|string|max:255',
            'telefono' => 'required|string|max:20',
            'telefono_interno' => 'string|max:10',
            'fax' => 'string|max:20',
            'email' => 'required|email|max:255',
            'latitud' => 'numeric',
            'longitud' => 'numeric',
            'fecha_creacion' => 'date',
            'escudo' => 'string|max:255',
            'imagen' => 'string|max:255',
            'estado_virtual' => 'boolean',
            'estado' => 'required|string|max:1',
            'id_area' => 'required|exists:areas,id_area', // Asegurarse de que el área existe en la tabla áreas
        ], [
            'nombre.required' => 'El campo nombre es obligatorio.',
            'nombre_abreviado.required' => 'El campo nombre abreviado es obligatorio.',
            'direccion.required' => 'El campo dirección es obligatorio.',
            'telefono.required' => 'El campo teléfono es obligatorio.',
            'telefono.max' => 'El teléfono no puede tener más de 20 caracteres.',
            'telefono_interno.max' => 'El teléfono interno no puede tener más de 10 caracteres.',
            'fax.max' => 'El fax no puede tener más de 20 caracteres.',
            'email.required' => 'El campo email es obligatorio.',
            'email.email' => 'El formato del email no es válido.',
            'latitud.numeric' => 'La latitud debe ser un número.',
            'longitud.numeric' => 'La longitud debe ser un número.',
            'fecha_creacion.date' => 'La fecha de creación no tiene un formato válido.',
            'escudo.max' => 'El campo escudo no puede tener más de 255 caracteres.',
            'imagen.max' => 'El campo imagen no puede tener más de 255 caracteres.',
            'estado_virtual.boolean' => 'El campo estado virtual debe ser verdadero o falso.',
            'estado.required' => 'El campo estado es obligatorio.',
            'estado.max' => 'El campo estado no puede tener más de 1 carácter.',
            'id_area.required' => 'El campo área es obligatorio.',
            'id_area.exists' => 'El área seleccionada no es válida.',
        ]);
        
    
        // Crear o actualizar la facultad con los datos validados
        Facultad::updateOrCreate(
            ['id_facultad' => $request->id_facultad],
            $validatedData
        );
    
        return response()->json(['success' => true]);
    }
    

    public function edit($id)
    {
        $facultad = Facultad::find($id);
        return response()->json($facultad);
    }

    public function destroy($id)
    {
        Facultad::find($id)->delete();

        return response()->json(['success' => 'Facultad eliminada correctamente.']);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Universidad;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class UniversidadController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Universidad::all();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a href="javascript:void(0)" data-id="' . $row->id_universidad . '" class="edit btn btn-primary btn-sm editRecord">Editar</a>';
                    $btn .= ' <a href="javascript:void(0)" data-id="' . $row->id_universidad . '" class="btn btn-danger btn-sm deleteRecord">Eliminar</a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('universidades.index');
    }

    public function store(Request $request)
    {
        // Validación de los datos
        $validatedData = $request->validate([
            'nombre' => 'required|string|max:255',
            'nombre_abreviado' => 'required|string|max:100',
            'inicial' => 'required|string|max:10', // Campo opcional, con un límite de 10 caracteres
            'estado' => 'required|string|max:1',
        ], [
            'nombre.required' => 'El campo nombre es obligatorio.',
            'nombre.string' => 'El campo nombre debe ser una cadena de texto.',
            'nombre.max' => 'El campo nombre no puede tener más de 255 caracteres.',
            'nombre_abreviado.required' => 'El campo nombre abreviado es obligatorio.',
            'nombre_abreviado.string' => 'El campo nombre abreviado debe ser una cadena de texto.',
            'nombre_abreviado.max' => 'El campo nombre abreviado no puede tener más de 100 caracteres.',
            'inicial.string' => 'El campo inicial debe ser una cadena de texto.',
            'inicial.max' => 'El campo inicial no puede tener más de 10 caracteres.',
            'estado.required' => 'El campo estado es obligatorio.',
            'estado.string' => 'El campo estado debe ser una cadena de texto.',
            'estado.max' => 'El campo estado no puede tener más de 1 carácter.',
        ]);
    
        // Crear o actualizar la universidad con los datos validados
        Universidad::updateOrCreate(
            ['id_universidad' => $request->id_universidad],
            $validatedData
        );
    
        return response()->json(['success' => 'Universidad guardada correctamente.']);
    }
    

    public function edit($id)
    {
        $universidad = Universidad::find($id);
        return response()->json($universidad);
    }

    public function destroy($id)
    {
        Universidad::find($id)->delete();

        return response()->json(['success' => 'Universidad eliminada correctamente.']);
    }
}

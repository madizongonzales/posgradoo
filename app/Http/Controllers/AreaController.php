<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Universidad;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class AreaController extends Controller
{
    public function index(Request $request)
    {
        $universidades = Universidad::all(); // Obtener todas las universidades

        if ($request->ajax()) {
            $data = Area::with('universidad')->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a href="javascript:void(0)" data-id="' . $row->id_area . '" class="edit btn btn-primary btn-sm editRecord">Editar</a>';
                    $btn .= ' <a href="javascript:void(0)" data-id="' . $row->id_area . '" class="btn btn-danger btn-sm deleteRecord">Eliminar</a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('areas.index', compact('universidades')); // Pasar la variable a la vista
    }


    public function store(Request $request)
    {
        // Validación de los datos
        $validatedData = $request->validate([
            'nombre' => 'required|string|max:255',
            'nombre_abreviado' => 'required|string|max:100',
            'estado' => 'required|string|max:1',
            'id_universidad' => 'required|exists:universidades,id_universidad', // Asegurarse de que la universidad existe
        ], [
            'nombre.required' => 'El campo nombre es obligatorio.',
            'nombre_abreviado.required' => 'El campo nombre abreviado es obligatorio.',
            'estado.required' => 'El campo estado es obligatorio.',
            'id_universidad.required' => 'El campo universidad es obligatorio.',
            'id_universidad.exists' => 'La universidad seleccionada no es válida.',
        ]);
    
        // Crear o actualizar el área con los datos validados
        Area::updateOrCreate(
            ['id_area' => $request->id_area],
            $validatedData
        );
    
        return response()->json(['success' => 'Área guardada correctamente.']);
    }
    

    public function edit($id)
    {
        $area = Area::find($id);
        return response()->json($area);
    }

    public function destroy($id)
    {
        Area::find($id)->delete();

        return response()->json(['success' => 'Área eliminada correctamente.']);
    }
}

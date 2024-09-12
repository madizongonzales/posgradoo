<?php

namespace App\Http\Controllers;

use App\Models\Rol;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class RolController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Rol::all();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a href="javascript:void(0)" data-id="' . $row->id_rol . '" class="edit btn btn-primary btn-sm editRecord">Editar</a>';
                    $btn .= ' <a href="javascript:void(0)" data-id="' . $row->id_rol . '" class="btn btn-danger btn-sm deleteRecord">Eliminar</a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('roles.index');
    }

    public function store(Request $request)
    {
        // Validación de los datos
        $validatedData = $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string|max:500', // Opcional, con un límite de 500 caracteres
            'estado' => 'required|string|max:1',
        ], [
            'nombre.required' => 'El campo nombre es obligatorio.',
            'nombre.string' => 'El campo nombre debe ser una cadena de texto.',
            'nombre.max' => 'El campo nombre no puede tener más de 255 caracteres.',
            'descripcion.string' => 'El campo descripción debe ser una cadena de texto.',
            'descripcion.max' => 'El campo descripción no puede tener más de 500 caracteres.',
            'estado.required' => 'El campo estado es obligatorio.',
            'estado.string' => 'El campo estado debe ser una cadena de texto.',
            'estado.max' => 'El campo estado no puede tener más de 1 carácter.',
        ]);
    
        // Crear o actualizar el rol con los datos validados
        Rol::updateOrCreate(
            ['id_rol' => $request->id_rol],
            $validatedData
        );
    
        return response()->json(['success' => true]);
    }
    

    public function edit($id)
    {
        $rol = Rol::find($id);
        return response()->json($rol);
    }

    public function destroy($id)
    {
        Rol::find($id)->delete();

        return response()->json(['success' => 'Rol eliminado correctamente.']);
    }
}

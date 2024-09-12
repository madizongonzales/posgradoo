<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\MenuPrincipal;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class MenuController extends Controller
{
    public function index(Request $request)
    {
        $menus_principales = MenuPrincipal::all(); // Obtener todos los menús principales

        if ($request->ajax()) {
            $data = Menu::with('menuPrincipal')->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a href="javascript:void(0)" data-id="' . $row->id_menu . '" class="edit btn btn-primary btn-sm editRecord">Editar</a>';
                    $btn .= ' <a href="javascript:void(0)" data-id="' . $row->id_menu . '" class="btn btn-danger btn-sm deleteRecord">Eliminar</a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('menus.index', compact('menus_principales')); // Pasar las variables a la vista
    }

    public function store(Request $request)
    {
        // Validación de los datos
        $validatedData = $request->validate([
            'id_menu_principal' => 'required|exists:menus,id_menu', // Asegurarse de que el menú principal existe
            'nombre' => 'required|string|max:255',
            'directorio' => 'required|string|max:255',
            'icono' => 'required|string|max:100', // Campo opcional
            'imagen' => 'required|string|max:255', // Campo opcional
            'color' => 'required|string|max:7', // Campo opcional, longitud típica para colores hexadecimales
            'orden' => 'required|integer',
            'estado' => 'required|string|max:1',
        ], [
            'id_menu_principal.required' => 'El campo menú principal es obligatorio.',
            'id_menu_principal.exists' => 'El menú principal seleccionado no es válido.',
            'nombre.required' => 'El campo nombre es obligatorio.',
            'directorio.required' => 'El campo directorio es obligatorio.',
            'icono.max' => 'El campo icono no puede tener más de 100 caracteres.',
            'imagen.max' => 'El campo imagen no puede tener más de 255 caracteres.',
            'color.max' => 'El campo color no puede tener más de 7 caracteres.',
            'orden.required' => 'El campo orden es obligatorio.',
            'estado.required' => 'El campo estado es obligatorio.',
        ]);
    
        // Crear o actualizar el menú con los datos validados
        Menu::updateOrCreate(
            ['id_menu' => $request->id_menu],
            $validatedData
        );
    
        return response()->json(['success' => 'Menú guardado correctamente.']);
    }
    

    public function edit($id)
    {
        $menu = Menu::find($id);
        return response()->json($menu);
    }

    public function destroy($id)
    {
        Menu::find($id)->delete();

        return response()->json(['success' => 'Menú eliminado correctamente.']);
    }
}

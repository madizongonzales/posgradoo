<?php

namespace App\Http\Controllers;

use App\Models\RolMenuPrincipal;
use App\Models\Rol;
use App\Models\MenuPrincipal;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class RolMenuPrincipalController extends Controller
{
    /**
     * Mostrar una lista de los roles_menus_principales.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $roles = Rol::all(); // Obtener todos los roles
        $menus_principales = MenuPrincipal::all(); // Obtener todos los menús principales

        if ($request->ajax()) {
            // Traer las relaciones 'rol' y 'menuPrincipal'
            $data = RolMenuPrincipal::with('rol', 'menuPrincipal')->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a href="javascript:void(0)" data-id="' . $row->id_rol_menu_principal . '" class="edit btn btn-primary btn-sm editRecord">Editar</a>';
                    $btn .= ' <a href="javascript:void(0)" data-id="' . $row->id_rol_menu_principal . '" class="btn btn-danger btn-sm deleteRecord">Eliminar</a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('roles_menus_principales.index', compact('roles', 'menus_principales'));
    }

    /**
     * Mostrar el formulario para crear un nuevo rol_menu_principal.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Rol::all();
        $menusPrincipales = MenuPrincipal::all();
        return view('roles_menus_principales.create', compact('roles', 'menusPrincipales'));
    }

    /**
     * Almacenar un nuevo rol_menu_principal en la base de datos.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validación de los datos
        $validatedData = $request->validate([
            'id_rol' => 'required|exists:roles,id_rol', // Asegurarse de que el rol existe
            'id_menu_principal' => 'required|exists:menu_principals,id_menu_principal', // Asegurarse de que el menú principal existe
            'estado' => 'required|string|max:1',
        ], [
            'id_rol.required' => 'El campo rol es obligatorio.',
            'id_rol.exists' => 'El rol seleccionado no es válido.',
            'id_menu_principal.required' => 'El campo menú principal es obligatorio.',
            'id_menu_principal.exists' => 'El menú principal seleccionado no es válido.',
            'estado.required' => 'El campo estado es obligatorio.',
            'estado.string' => 'El campo estado debe ser una cadena de texto.',
            'estado.max' => 'El campo estado no puede tener más de 1 carácter.',
        ]);
    
        // Crear o actualizar el rol-menu principal con los datos validados
        RolMenuPrincipal::updateOrCreate(
            ['id_rol_menu_principal' => $request->id_rol_menu_principal],
            $validatedData
        );
    
        return response()->json(['success' => 'Rol Menú Principal guardado correctamente.']);
    }
    

    /**
     * Mostrar el formulario para editar un rol_menu_principal existente.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $rolMenuPrincipal = RolMenuPrincipal::find($id);
        return response()->json($rolMenuPrincipal);
    }

    /**
     * Actualizar un rol_menu_principal existente en la base de datos.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'id_rol' => 'required|integer|exists:roles,id_rol',
            'id_menu_principal' => 'required|integer|exists:menus_principales,id_menu_principal',
            'estado' => 'required|string|max:1',
        ]);

        $rolMenuPrincipal = RolMenuPrincipal::findOrFail($id);
        $rolMenuPrincipal->update($request->all());

        return redirect()->route('roles_menus_principales.index')
            ->with('success', 'Rol-Menú Principal actualizado exitosamente.');
    }

    /**
     * Eliminar un rol_menu_principal de la base de datos.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        RolMenuPrincipal::find($id)->delete();

        return response()->json(['success' => 'Rol Menú Principal eliminado correctamente.']);
    }
}

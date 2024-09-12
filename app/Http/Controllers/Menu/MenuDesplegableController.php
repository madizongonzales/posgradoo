<?php

namespace App\Http\Controllers\Menu;

use App\Http\Controllers\Controller;
use App\Models\MenuDesplegable;
use App\Models\Modulo;
use Illuminate\Http\Request;
use DB;
use Yajra\DataTables\DataTables;
class MenuDesplegableController extends Controller
{
    //
    public function index(Request $request)
    {
        // Obtener todos los módulos
        $modulos = Modulo::all();
    
        if ($request->ajax()) {
            $data = MenuDesplegable::with('menus')->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('menus', function ($row) {
                    $menus = $row->menus->pluck('nombre');
                    return '<ul><li>' . implode('</li><li>', $menus->toArray()) . '</li></ul>';
                })
                ->rawColumns(['menus'])
                ->make(true);
        }
    
        // Obtener todos los menús desplegables y pasarlos a la vista junto con los módulos
        $menus = MenuDesplegable::with('menus')->get();
        return view('menusdesplegables.index', compact('menus', 'modulos'));
    }
    
    
    
    public function details($id)
{
    $menuPrincipal = MenuDesplegable::with('menus')->findOrFail($id);
    return response()->json([
        'menus' => $menuPrincipal->menus
    ]);
}


    /**
     * Mostrar el formulario para crear un nuevo menú principal.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $modulos = Modulo::all(); // Obtén todos los módulos disponibles
        // return view('menusdesplegables.create', compact('modulos'));
    }

    public function store(Request $request)
    {
        // Validación de los datos
        $validatedData = $request->validate([
            'nombre' => 'required|string|max:255',
            'icono' => 'required|string|max:100', // Campo opcional
            'orden' => 'required|integer',
            'estado' => 'required|string|max:1',
            'id_modulo' => 'required|exists:modulos,id_modulo', // Asegurarse de que el módulo existe
        ], [
            'nombre.required' => 'El campo nombre es obligatorio.',
            'icono.max' => 'El campo icono no puede tener más de 100 caracteres.',
            'orden.required' => 'El campo orden es obligatorio.',
            'estado.required' => 'El campo estado es obligatorio.',
            'id_modulo.required' => 'El campo módulo es obligatorio.',
            'id_modulo.exists' => 'El módulo seleccionado no es válido.',
        ]);
    
        // Crear o actualizar el menú principal con los datos validados
        MenuDesplegable::updateOrCreate(
            ['id_menu_principal' => $request->id_menu_principal],
            $validatedData
        );
    
        return response()->json(['success' => 'Menú Principal guardado correctamente.']);
    }
    
    /**
     * Mostrar el formulario para editar un menú principal existente.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $menuPrincipal = MenuDesplegable::findOrFail($id);
        // $modulos = Modulo::all(); // Obtén todos los módulos disponibles
        // return view('menusdesplegables.edit', compact('menuPrincipal', 'modulos'));
        $menuPrincipal = MenuDesplegable::find($id);
        return response()->json($menuPrincipal);
    }

    /**
     * Actualizar un menú principal existente en la base de datos.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'id_modulo' => 'required|integer|exists:modulos,id_modulo',
            'nombre' => 'required|string|max:250',
            'icono' => 'nullable|string|max:70',
            'orden' => 'nullable|integer',
            'estado' => 'required|string|max:1',
        ]);

        $menuPrincipal = MenuDesplegable::findOrFail($id);
        $menuPrincipal->update($request->all());

        return redirect()->route('menusdesplegables.index')
            ->with('success', 'Menú Principal actualizado exitosamente.');
    }

    /**
     * Eliminar un menú principal de la base de datos.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $menuPrincipal = MenuDesplegable::findOrFail($id);
        // $menuPrincipal->delete();

        // return redirect()->route('menusdesplegables.index')
        //     ->with('success', 'Menú Principal eliminado exitosamente.');
        MenuDesplegable::find($id)->delete();

        return response()->json(['success' => 'Menú Principal eliminado correctamente.']);
    }
}

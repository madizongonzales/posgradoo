<?php

namespace App\Http\Controllers;

use App\Models\Modulo;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ModuloController extends Controller
{
    /**
     * Mostrar una lista de los módulos.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
        if ($request->ajax()) {

            $data = Modulo::query();

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {

                    $btn = '<a href="javascript:void(0)" data-id="' . $row->id_modulo . '" class="edit btn btn-primary btn-sm editRecord">Editar</a>';
                    $btn .= ' <a href="javascript:void(0)" data-id="' . $row->id_modulo . '" class="btn btn-danger btn-sm deleteRecord">Eliminar</a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('modulos.index');
    }


    /**
     * Mostrar el formulario para crear un nuevo módulo.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('modulos.create');
    }

    /**
     * Almacenar un nuevo módulo en la base de datos.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validación de los datos
        $validatedData = $request->validate([
            'nombre' => 'required|string|max:255',
            'estado' => 'required|string|max:1',
        ], [
            'nombre.required' => 'El campo nombre es obligatorio.',
            'nombre.string' => 'El campo nombre debe ser una cadena de texto.',
            'nombre.max' => 'El campo nombre no puede tener más de 255 caracteres.',
            'estado.required' => 'El campo estado es obligatorio.',
            'estado.string' => 'El campo estado debe ser una cadena de texto.',
            'estado.max' => 'El campo estado no puede tener más de 1 carácter.',
        ]);
    
        // Crear o actualizar el módulo con los datos validados
        Modulo::updateOrCreate(
            ['id_modulo' => $request->id_modulo],
            $validatedData
        );
    
        return response()->json(['success' => 'Módulo guardado correctamente.']);
    }
    

    /**
     * Mostrar los detalles de un módulo específico.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {}

    /**
     * Mostrar el formulario para editar un módulo existente.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $modulo = Modulo::findOrFail($id);
        // return view('modulos.edit', compact('modulo'));
        $modulo = Modulo::find($id);
        return response()->json($modulo);
    }

    /**
     * Actualizar un módulo existente en la base de datos.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:50',
            'estado' => 'required|string|max:1',
        ]);

        $modulo = Modulo::findOrFail($id);
        $modulo->update($request->all());

        return redirect()->route('modulos.index')
            ->with('success', 'Módulo actualizado exitosamente.');
    }

    /**
     * Eliminar un módulo de la base de datos.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $modulo = Modulo::findOrFail($id);
        // $modulo->delete();

        // return redirect()->route('modulos.index')
        //     ->with('success', 'Módulo eliminado exitosamente.');
        Modulo::find($id)->delete();

        return response()->json(['success' => 'Módulo eliminado correctamente.']);
    }
}

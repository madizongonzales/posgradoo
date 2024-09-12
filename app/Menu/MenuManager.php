<?php

namespace App\Menu;

use App\Models\Menu;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;

class MenuManager
{
    public function __construct() {}

    /**
     * Genera el menú dinámico basado en los datos del usuario.
     *
     * @param \Illuminate\Support\Collection $datas
     * @return string
     */
    public function getMenu($datas)
    {
        $cadena = "";
        $menuPrincipal = [];
        $user = ''; // Variable para almacenar el nombre del usuario
    
        // Almacenar menús principales generados
        $menus_generados = [];
    
        foreach ($datas as $data) {
            // Capturamos el nombre de usuario (será el mismo en cada iteración)
            if (empty($user)) {
                $user = $data->nombre;
            }
    
            // Si el menú principal ya fue generado, saltar
            if (in_array($data->id_menu_principal, $menus_generados)) {
                continue;
            }
    
            // Agregar el menú principal a la lista de generados
            $menus_generados[] = $data->id_menu_principal;
    
            // Obtener menús principales
            $data_menu = Menu::where(['id_menu_principal' => $data->id_menu_principal])
                ->orderBy('orden', 'ASC')
                ->get();
    
            // Crear submenús
            $submenu = "";
            foreach ($data_menu as $dm) {
                $url = URL::to($dm->directorio);
                $submenu .= '<li class="menu-item active">
                                <a href="' . $url . '" class="menu-link">
                                    <i class="menu-icon tf-icons ti ti-smart-home"></i>
                                    <div>' . e($dm->nombre) . '</div>
                                    </a>
                                    </li>';
                   }
           
                   // Agregar menú principal y submenús
                   $cadena .= '<li class="nav-item has-treeview">
                                   <a href="#" class="nav-link">
                                       <i class="nav-icon fas fa-tachometer-alt"></i>
                                       <h4 style="color: black">
                                           - ' . e($data->nombre_menu_principal) . ':
                                           <i class="right fas fa-angle-left"></i>
                                       </h4>
                                   </a>
                                   <ul>' . $submenu . '</ul>
                               </li>';
               }
           
               // Almacenar el menú y el nombre del usuario en la sesión
               session([
                   'menu' => $cadena,
                   'nombre' => $user,
               ]);
           
               return $cadena;
            }
       }
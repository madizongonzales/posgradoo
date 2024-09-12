<?php

namespace App\Http\Controllers;

use App\Models\Personas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;
use App\Models\Persona;
use App\Models\VPersonaMenuPrincipal;
use App\Models\Menu;

class LoginController1 extends Controller
{
    public function index(){
        return view('login.index');
    }

    public function processLogin(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);
        
        $username = $request->username;
        $password = $request->password;

        $num_rows = Personas::where(['usuario' => $username, 'password' => $password])->count();
        
        if ($num_rows > 0) {
            $data = VPersonaMenuPrincipal::where(['usuario' => $username, 'password' => $password])->first();
            $menu = $this->menus($username, $password);
            $data_session = [
                'status' => true,
                'paterno' => $data->paterno,
                'id_persona' => $data->id_persona,
                'materno' => $data->materno,
                'nombres' => $data->nombres,
                'nombre_rol' => $data->nombre_rol,
                'id_rol' => $data->id_rol,
                'fotografia' => $data->fotografia,
                'menu' => $menu
            ];
            Session::put('data_session', $data_session);
            return redirect('/dashboard');
        }

        session()->flash('error_clave', 'Error de Usuario o Password.');
        return redirect('/');
    }

    public function logout(Request $request)
    {
        Session::flush(); 
        return redirect('/');
    }

    private function menus($username, $password)
    {
        $data = VPersonaMenuPrincipal::where(['usuario' => $username, 'password' => $password])->get();
        $cad = "";
        foreach ($data as $d) {
            $id_menu_principal = $d->id_menu_principal;
            $data_menu = Menu::where(['id_menu_principal' => $id_menu_principal])->orderBy('orden', 'ASC')->get();
            $submenu = "";
            foreach ($data_menu as $dm) {
                $url = URL::to($dm->directorio);
                $submenu .= '<li class="menu-item"><a href="' . $url . '" class="menu-link"><div data-i18n="' . $dm->nombre . '">' . $dm->nombre . '</div></a></li>';
            }
            $cad .= '<li class="menu-item">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons ti ti-smart-home"></i>
                            <div data-i18n="' . $d->nombre_menu_principal . '">' . $d->nombre_menu_principal . '</div>
                        </a>
                        <ul class="menu-sub">
                            ' . $submenu . '
                        </ul>
                    </li>';
        }
        return $cad;
    }
}
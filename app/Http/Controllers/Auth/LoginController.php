<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Menu\MenuManager;
use App\Models\User\User;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Mostrar el formulario de login.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('auth.login');
    }

    /**
     * Manejar la autenticación del usuario.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'nombre' => 'required|string', // Cambiado a 'nombre'
            'password' => 'required|string',
        ]);

        // Intentar encontrar al usuario por su 'nombre'
        $user = User::where('nombre', $request->input('nombre'))->first();

        // Verificar si el usuario existe y la contraseña es correcta (sin encriptación)
        if ($user && $user->password === $request->input('password')) {
            // Autenticar manualmente al usuario
            Auth::login($user);

            $menuManager = new MenuManager();
            $menuData = $menuManager->getMenuData($user->id);

            session(['menu' => $menuManager->getMenu($menuData)]);

            return redirect()->intended('/');
        }

        // Autenticación fallida
        return back()->withErrors([
            'nombre' => 'Las credenciales no coinciden con nuestros registros.',
        ]);
    }

    /**
     * Cerrar sesión del usuario.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout()
    {
        // Limpiar el menú de la sesión
        session()->forget('menu');
        Auth::logout();
        return redirect('/login');
    }
}

<?php

namespace App\Http\Controllers\Login;
use App\Http\Controllers\Controller;
use App\Menu\MenuManager;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class AuthenticateController extends Controller
{
    public $data;
    public $MenuManager;
    public function __construct()
    {

        $this->data = [
            'username' => 'required| string',
            'password' => 'required| string'
        ];
        $this->MenuManager = new MenuManager();
    }
    public function authenticate(Request $request)
    {
        $user = User::where([
            'nombre' => $request->nombre,
            'password' => $request->password
        ])
            ->first();

        if ($user == null) {
            return 'user not found';
        }

        $data = DB::table('users_view')
            ->where('id_usuario', $user->id_usuario)
            ->orderBy('id_usuario', 'asc')
            ->get();
        $menu = $this->MenuManager->getMenu($data);

        $data_session = [
            'user' => $user,
            'menu' => $menu
        ];

        Session::put('data_session', $data_session);
        return redirect('/');
    }
}
<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = "/";

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        $this->validateLogin($request);

        $auth = Auth::guard('web')->attempt([
            'email' => $request->email,
            'password' => $request->password
        ]);

        if ($request->ajax()) {
            if ($auth) {
                return response()->json(['message' => "Se inicio seccion con exito."], 200);
            } else {
                return response()->json(['message' => "Credenciales invalidad."], 422);
            }
        }

        if ($auth) {
            return redirect()->route('panel');
        }

        return redirect()->route('login');
    }

    protected function validateLogin(Request $request)
    {

        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ],[
            'password.required' => 'El campo de contraseña es obligatorio.',
            'email.required' => 'El campo de correo es obligatorio.',
            'email.email' => 'El correo no es valido.',
        ]);
    }
}

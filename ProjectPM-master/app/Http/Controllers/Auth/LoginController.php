<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use phpDocumentor\Reflection\Types\Null_;

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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function logout()
    {
        DB::table('logs')->insert([
            'matricula'     =>  Auth::User()->matricula,
            'acao'          =>  'Saiu',
            'data'          =>  now(),
        ]);


        Auth::logout();

        return redirect()->route('/');
    }

    public function login(Request $request)
    {
        $credenciais = $this->Validate(
            request(),
            [
                $this->username() => 'required',
                'password'        => 'required',
            ],
            [
                'required'              => 'Campo :attribute Obrigatório',
                'password.required'     => 'Campo Senha é Obrigatório'
            ]
        );

        if (Auth::attempt($credenciais)) {
            if (Auth::user()->status == 'Ok') {
                DB::table('logs')->insert([
                    'matricula'     =>  Auth::User()->matricula,
                    'acao'          =>  'Entrou',
                    'data'          =>  now(),
                ]);
                return redirect()->route('home');
            } else {
                Auth::logout();
                return redirect()->back()->with('msg', "Cadastro aguardando confirmação");
            }
        } else {
            return redirect()->back()->with('msg', "Matrícula ou Senha incorreta");
        }
    }

    public function username()
    {
        return 'matricula';
    }
}

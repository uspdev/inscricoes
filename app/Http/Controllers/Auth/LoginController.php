<?php

namespace App\Http\Controllers\Auth;

use Auth;
use App\User;
use Socialite;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
 
    public function redirectToProvider()
    {
        return Socialite::driver('senhaunica')->redirect();
    }

    public function handleProviderCallback()
    {
        $userSenhaUnica = Socialite::driver('senhaunica')->user();
        // aqui vc pode inserir o usuário no banco de dados local, fazer o login etc.

        # busca o usuário local
        $user = User::where('codpes', $userSenhaUnica->codpes)->first();

		# se o usuário local NÃO EXISTE, cadastra
        if (is_null($user)) {
            $user = new User;
            $user->email = $userSenhaUnica->email;
            $user->name = $userSenhaUnica->nompes;
            $user->codpes = $userSenhaUnica->codpes;
            $user->save();
        } else {
            # se o usuário EXISTE local
            # atualiza os dados
            $user->email = $userSenhaUnica->email;
            $user->name = $userSenhaUnica->nompes;
            $user->codpes = $userSenhaUnica->codpes;
            $user->save(); 
        }

        # faz login
        Auth::login($user, true);

        # redireciona
        return redirect('/');  
    }

    public function logout() {
        Auth::logout();
        return redirect('/');
    }
}

<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Session;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function index()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $input = $request->all();

        $this->validate($request, [
            'username' => 'required',
            'password' => 'required',
        ]);

        $user = User::where(['username'=>$input['username'],'password'=>$input['password']])->first();

        if (auth()->loginUsingId($user?->id)) {
            if ($user->role == 'admin') {
                return redirect()->route('admin.home');
            } else if ($user->role == 'guru') {
                return redirect()->route('guru.home');
            } else if ($user->role == 'siswa') {
                return redirect()->route('siswa.home');
            }
        } else {
            return back()->with('error', 'Username or Password Are Wrong!');
        }
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();

        return Redirect('/');
    }
}

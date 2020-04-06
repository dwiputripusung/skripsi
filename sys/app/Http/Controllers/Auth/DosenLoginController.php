<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class DosenLoginController extends Controller
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
    protected $guard = 'dosen';

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function show()
    {
        return view('dosen.login');
    }
    public function guard()
    {
        return auth()->guard('dosen');
    }

    public function login(Request $request)
    {
        if(Auth::guard('dosen')->attempt(['nidn' => $request->nidn, 'password' => $request->password])) {
            return redirect()->route('dosen.page');
        }

        return back()->withErrors(['nidn' => 'NIDN or Password are Wrong']);
    }
}

<?php

namespace App\Http\Controllers\Web\V1\User;

use App\Http\Controllers\Web\WebBaseController;
use App\Http\Forms\Web\V1\Auth\UserLoginWebForm;
use App\Models\Entities\Core\Role;
use App\Providers\RouteServiceProvider;
use App\Rules\IsUser;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;

class LoginController extends WebBaseController
{
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::PROFILE;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        session(['url.intended' => url()->previous()]);
        $this->redirectTo = session()->get('url.intended');

        $this->middleware('guest')->except('logout');
    }

    protected function credentials(Request $request)
    {
        return $request->only('email', 'password', 'password');
    }

    protected function validateLogin(Request $request)
    {

        if (strpos($request->email, '@')) {
            $request->validate([
                'email' => ['required','string',new IsUser()],
                'password' => 'required|string',
            ]);
        } else {
            $request->iin = $request->email;
            $request->validate([
                'email' => 'required|string|numeric',
                'password' => 'required|string',
            ]);
        }
    }

    protected function attemptLogin(Request $request)
    {

        if (Auth::attempt([
                'iin' => $request['email'],
                'password' => $request['password']
            ],$request->has('remember'))
            || Auth::attempt([
                'email' => $request['email'],
                'password' => $request['password']
            ],$request->has('remember'))){
            return true;
        }
        return false;

    }


    protected function sendFailedLoginResponse(Request $request)
    {
        if (!(strpos($request->email, '@'))) {
            throw ValidationException::withMessages([
                'email' => [trans('auth.failed')],
            ]);
        } else {
            throw ValidationException::withMessages([
                'email' => [trans('auth.failed')],
            ]);
        }
    }

    protected function sendLoginResponse(Request $request)
    {

        $request->session()->regenerate();

        $this->clearLoginAttempts($request);

        return ($this->guard()->user()->role_id == Role::ADMIN_ID)
            ?redirect()->route('home'): redirect()->intended($this->redirectPath());

//        if($this->guard()->user()->role_id == Role::ADMIN_ID){
//            return redirect()->route('home');
//        }
//        else if() {
//
//        }
//        else{
//            return redirect()->route('user.profile');
//        }
    }


    public function login(Request $request)
    {

        $this->validateLogin($request);

        if (method_exists($this, 'hasTooManyLoginAttempts') &&
            $this->hasTooManyLoginAttempts($request)) {

            $this->fireLockoutEvent($request);
            return $this->sendLockoutResponse($request);
        }


        if ($this->attemptLogin($request)) {
            return $this->sendLoginResponse($request);
        }

        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
    }

    public function showLoginForm()
    {
        $loginInputs = UserLoginWebForm::inputGroups(null);
        if (!session()->has('url.intended')) {

            redirect()->setIntendedUrl(session()->previousUrl());
        }

        return $this->frontView('core.auth.login', compact('loginInputs'));
    }

    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        return $this->loggedOut($request) ?: redirect()->route('login');
    }



}

<?php

namespace App\Http\Controllers\Web\V1\Auth;

use App\Http\Controllers\Web\WebBaseController;
use App\Http\Forms\Web\V1\Auth\LoginWebForm;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends WebBaseController
{
    use AuthenticatesUsers;

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        $loginInputs = LoginWebForm::inputGroups(null);
        return $this->adminView('core.auth.login', compact('loginInputs'));
    }


}

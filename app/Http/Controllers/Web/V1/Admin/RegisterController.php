<?php


namespace App\Http\Controllers\Web\V1\Admin;


use App\Http\Controllers\Controller;
use App\Http\Controllers\Web\WebBaseController;
use App\Http\Forms\Web\V1\Auth\RegisterWebForm;
use App\Http\Forms\Web\V1\Auth\UserRegisterWebForm;
use App\Models\Entities\Core\Role;
use App\Models\Entities\Core\User;
use App\Models\Entities\Support\AppFile;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\RedirectsUsers;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class RegisterController extends WebBaseController
{
    use RegistersUsers;

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'role_id' => Role::ORGANIZATION_ID,
            'avatar_file_id' => AppFile::DEFAULT_IMAGE_ID
        ]);
    }

    public function showRegisterForm()
    {
        $registerInputs = UserRegisterWebForm::inputGroups();
        return view('modules.registration.create', compact('registerInputs'));
    }





}

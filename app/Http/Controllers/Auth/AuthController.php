<?php

namespace App\Http\Controllers\Auth;

use App\Repositories\UserRepositoryInterface;
use Auth;
use Validator;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\UserRegisterRequest;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    protected $redirectPath = '/';
    protected $loginPath    = '/login';
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers {
        postLogin as parentPostLogin;
    }

    /** @var UserRepositoryInterface */
    protected $user;

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct(UserRepositoryInterface $user)
    {
        $this->middleware('guest', ['except' => 'getLogout']);
        $this->user = $user;
    }

    public function postLogin(LoginRequest $request)
    {
        return $this->parentPostLogin($request);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return $this->user->create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

    public function postRegister(UserRegisterRequest $request)
    {
        Auth::login($this->create($request->all()));
        return redirect($this->redirectPath());
    }
}

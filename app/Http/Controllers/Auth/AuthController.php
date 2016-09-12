<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Cart;
use App\Role;
use App\State;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
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

  use AuthenticatesAndRegistersUsers, ThrottlesLogins;

  /**
  * Where to redirect users after login / registration.
  *
  * @var string
  */
  protected $redirectTo = '/';

  /**
  * Create a new authentication controller instance.
  *
  * @return void
  */
  public function __construct()
  {
    $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
  }

  /**
  * Get a validator for an incoming registration request.
  *
  * @param  array  $request
  * @return \Illuminate\Contracts\Validation\Validator
  */
  protected function validator(array $request)
  {
    return Validator::make($request, [
      'username' => 'required|max:255|unique:users',
      'dni' => 'required|max:255|unique:users',
      'email' => 'required|email|max:255|unique:users',
      'password' => 'required|min:6|confirmed',
    ]);
  }

  /**
  * Create a new user instance after a valid registration.
  *
  * @param  array  $request
  * @return User
  */
  protected function create(array $request)
  {
    $cart = new Cart;
    $cart->save();
    $state = State::findOrFail(200);
    $role = Role::findOrFail(1);

    $user = User::create([
      'username' => $request['username'],
      'dni' => $request['dni'],
      'email' => $request['email'],
      'password' => bcrypt($request['password']),
    ]);

    $user->cart()->save($cart);
    $state->user()->save($user);
    $role->user()->save($user);

    return $user;
  }
}

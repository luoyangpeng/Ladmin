<?php

namespace App\Http\Controllers\Login;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Validator;
use App\Models\FrontUser;
use Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    protected $redirectTo = '/';
    protected $username = 'username';
    protected $guard = 'front';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:front', ['except' => 'logout']);
       
        if(isEmail(request('username'))) {
            $this->username = 'email';
        }

    }

    /**
     * 重写登录视图页面
     *
     * @itas
     * @DateTime 2017-03-26
     * @return   [type]     [description]
     */
    public function showLoginForm()
    {
        $seo = [
            'title'    => 'login',
            'desc'     => '单点登录系统',
            'keywords' => 'Ladmin,单点登录系统',
        ];

        return view("login.login", compact('seo'));
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'email' => 'required|email|max:255|unique:front_users',
            'password' => 'required|confirmed|min:6',
        ]);
    }

    /**
     * Create a new user instance after a valrid egistration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return FrontUser::create([
            'username' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

    public function logout()
    {
        $ticket = isset($_COOKIE['ticket']) ? $_COOKIE['ticket'] :'';
        session()->forget($ticket);
        setcookie('ticket',$ticket,time()-3600,'/',env('COOIKE_DOMAIN'));

        Auth::guard($this->getGuard())->logout();

        return redirect(property_exists($this, 'redirectAfterLogout') ? $this->redirectAfterLogout : '/');
    }


    public function createTicket()
    {
        return md5(str_random(10));
    }

    /**
     * Send the response after the user was authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  bool  $throttles
     * @return \Illuminate\Http\Response
     */
    protected function handleUserWasAuthenticated(Request $request, $throttles)
    {
        if ($throttles) {
            $this->clearLoginAttempts($request);
        }

        if (method_exists($this, 'authenticated')) {
            return $this->authenticated($request, Auth::guard($this->getGuard())->user());
        }

        $ticket = $this->createTicket();
        session()->put($ticket,auth('front')->user());
        setcookie('ticket',$ticket,time()+3600*2,'/', env('COOIKE_DOMAIN'));
        $this->redirectTo = request('oauth_callback')."/?ticket=".$ticket;

        return redirect()->intended($this->redirectPath());
    }


}
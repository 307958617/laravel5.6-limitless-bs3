<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Naux\Mail\SendCloudTemplate;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Auth\Events\Registered;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
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
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'gender' => $data['gender'],
            'avatar' => $this->avatar($data['gender']),
            'password' => Hash::make($data['password']),
            'confirmation_token' => str_random(40) //生成邮箱验证的随机token字符串
        ]);
        $this->sendVerifyEmailTo($user);
        return $user;
    }

    /**
     * 引入SendCloud,通过它来发送邮件
     */

    public function sendVerifyEmailTo($user)
    {
        $data = [
            'url' => route('verify.email',['token' => $user->confirmation_token]),
            //注意：此处的verify.email是下面创建的路由。
            'name' => $user->name
        ];//注意：这里面的变量名与sendcloud里面的变量名必须一致。
        $template = new SendCloudTemplate('zhihu_dev_register', $data);

        Mail::raw($template, function ($message) use($user) {
            $message->from('307958617@qq.com', 'Limitless');

            $message->to($user->email);
        });
    }

    //注册的时候，根据性别状态来自动选择显示的三种头像
    public function avatar($gender)
    {
        if ($gender == null) {
            return $avatar = '/images/avatars/default.png';
        }elseif ($gender == 'M' ) {
            return $avatar = '/images/avatars/male.png';
        }elseif ($gender == 'F' ) {
            return $avatar = '/images/avatars/female.png';
        }
    }

    //重写register方法，不直接登陆，而且发送一个提示消息。
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        //注册成功后会弹出一下提示信息
        toast('由于你是刚刚注册的用户，第一次登陆前必须通过注册的邮箱进行登陆验证！否则无法登陆！','warning','top-center')->autoClose(500000);

        return $this->registered($request, $user)
            ?: redirect($this->redirectPath());
    }
}

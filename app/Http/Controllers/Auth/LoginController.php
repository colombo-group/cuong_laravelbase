<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\MessageBag;

class LoginController extends Controller
{
    use AuthenticatesUsers;
    /*public function showLoginForm() {
        return view('auth.login');
    }*/
    /*public function login(Request $request) {
        $rules = [
            'email' =>'required|email',
            'password' => 'required|min:6'
        ];
        $messages = [
            'email.required' => 'Email là trường bắt buộc',
            'email.email' => 'Email không đúng định dạng',
            'password.required' => 'Mật khẩu là trường bắt buộc',
            'password.min' => 'Mật khẩu phải chứa ít nhất 6 ký tự',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $email = $request->input('email');
            $password = $request->input('password');

            if( Auth::attempt(['email' => $email, 'password' => $password, 'role' => 1])) {
                return redirect()->intended('/admin');
            }elseif( Auth::attempt(['email' => $email, 'password' => $password])) {
                return redirect()->intended('/home');
            } else {
                $this->incrementLoginAttempts($request);

                return $this->sendFailedLoginResponse($request);
            }
        }
    }*/
    public function login(Request $request) {
        $rules = [
            'login' =>'required',
            'password' => 'required|min:6'
        ];
        $messages = [
            'login.required' => 'Email or Username là trường bắt buộc',
            'password.required' => 'Mật khẩu là trường bắt buộc',
            'password.min' => 'Mật khẩu phải chứa ít nhất 6 ký tự',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $login = $request->input('login');
            $password = $request->input('password');

            $field = filter_var($request->input('login'), FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

            if( Auth::attempt([$field => $login, 'password' => $password, 'role' => 1])) {
                return redirect()->intended('/admin');
            }elseif( Auth::attempt([$field => $login, 'password' => $password])) {
                return redirect()->intended('/home');
            }else {
                $user = User::withTrashed()->where($field, $login)->count();
                if($user) {
                    return redirect()->intended('/')->with(['flash_level' => 'danger', 'flash_message' => 'Your account was delete.']);
                }
                $this->incrementLoginAttempts($request);

                return $this->sendFailedLoginResponse($request);
            }
        }
    }
    /**
     * Get the login username to be used by the controller.
     *
     * @return string
     */
    public function username()
    {
        return 'login';
    }
}

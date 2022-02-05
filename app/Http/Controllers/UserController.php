<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Http\Requests\PostRequest;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{

    public function showLogin()
    {
        return view('showLogin');
    }

    public function create()
    {
        return view('create');
    }

    public function register(PostRequest $request)
    {
        $birthday = $request->year.$request->month.$request->day;
        $password = Hash::make($request->password);

        $register = new User();
        $register->name = $request->name;
        $register->email = $request->email;
        $register->password = $password;
        $register->birthday = $birthday;
        $register->gender = $request->gender;
        $register->save();

        return redirect()
            ->route('showLogin');
    }

    public function login(UserRequest $request)
    {
        $credentials=$request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()
                ->route('myPage')->with(['login' => 'ログイン成功']);
        }

        return back()->with([
            'login_error' => 'メールアドレスまたはパスワードが間違っています',
        ]);

    }

    public function myPage()
    {
        return view('myPage');
    }

    /**
 * ユーザーをアプリケーションからログアウトさせる
 *
 * @param  \Illuminate\Http\Request  $request
 * @return \Illuminate\Http\Response
 */
public function logout(Request $request)
{
    Auth::logout();

    $request->session()->invalidate();

    $request->session()->regenerateToken();

    return redirect('/');
}


}

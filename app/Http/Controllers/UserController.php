<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Post;
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

    public function showSearch()
    {
        return view('search.showSearch');
    }

    public function search(Request $request)
    {
        $users = User::paginate(20);

        $posts = Post::paginate(20);

        $search = $request->input('search');

        $userQuery = User::query();

        $postQuery = Post::query();

        if ($search !== null) {
            //全角スペースを半角に変換
            $spaceConversion = mb_convert_kana($search, 's');

            //半角スペースで区切って配列にする
            $wordArraySearched = preg_split('/[\s,]+/', $spaceConversion, -1, PREG_SPLIT_NO_EMPTY);

            foreach ($wordArraySearched as $value) {
                $userQuery->where('name', 'LIKE', '%'.$value.'%');
                $postQuery->where('body', 'LIKE', '%'.$value.'%');
            }
            $users = $userQuery->paginate(20);
            $posts = $postQuery->paginate(20);
        }

        return view('search.showSearch')
            ->with([
                'users' => $users,
                'posts' => $posts,
                'search' => $search
            ]);
    }

}

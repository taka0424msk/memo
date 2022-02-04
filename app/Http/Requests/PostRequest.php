<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'email' => 'email',
            'password' => 'required|regex:/\A(?=.*?[a-z])(?=.*?\d)[a-z\d]{8,100}+\z/i|min:8',
            'gender' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => '名前を入力してください',
            'email.email' => 'メールアドレスが正しくありません',
            'password.required' => 'パスワードを入力してください',
            'password.regex' => '英数字を含む８文字以上のものにしてください',
            'password.min' => '８文字以上の入力が必要です',
            'gender.required' => '性別を選択してください'

        ];
    }
}

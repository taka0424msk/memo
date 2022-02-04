<x-layout>
    <x-slot name="title">
        ログインフォーム
    </x-slot>
    <div class="box">
        <h2>ログインフォーム</h2>
        <form action="{{ route('login') }}" method="POST">
            @csrf
            @if (session('login_error'))
                {{ session('login_error') }}
            @endif
            <div><input class="input" type="text" placeholder="メールアドレス" name="email"></div>
            @error('email')
                <div class="error">{{ $message }}</div>
            @enderror
            <div><input class="input" type="password" placeholder="パスワード" name="password"></div>
            @error('password')
                <div class="error">{{ $message }}</div>
            @enderror
            <button class="btn">ログイン</button>
        </form>
        <a href="{{ route('create') }}" class="createAccount">アカウントを作成</a>
    </div>
</x-layout>

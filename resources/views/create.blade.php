<x-layout>
    <x-slot name="title">
        アカウント作成
    </x-slot>
    <div class="box">
        <h2>新規アカウントの作成</h2>
        <form action="{{ route('register') }}" method="POST">
            @csrf
            @error('name')
                <div class="error">{{ $message }}</div>
            @enderror
            <div><input class="input" type="text" placeholder="氏名" name="name" value="{{ old('name') }}"></div>
            @error('email')
                <div class="error">{{ $message }}</div>
            @enderror
            <div><input class="input" type="text" name="email" placeholder="メールアドレス" value="{{ old('email') }}"></div>
            @error('password')
                <div class="error">{{ $message }}</div>
            @enderror
            <div><input class="input" name="password" type="password" placeholder="パスワード" ></div>
            <div class="birthday">
                <select name='year'>
                    <?php for ($i = 2022; $i >= 1901; $i--): ?>
                        <?php echo "<option type='text' value='{$i}'>{$i}年</option>" ?>
                    <?php endfor ?>
                </select>
                <select name='month'>
                    <?php for ($i = 1; $i <= 12; $i++): ?>
                        <?php echo "<option type='text'  value='".sprintf('%02d',$i)."'>{$i}月</option>" ?>
                    <?php endfor ?>
                </select>
                <select name='day'>
                    <?php for ($i = 1; $i <= 31; $i++): ?>
                        <?php echo "<option type='text' value='".sprintf('%02d',$i)."'>{$i}日</option>" ?>
                    <?php endfor ?>
                </select>
            </div>
            @error('gender')
                <div class="error">{{ $message }}</div>
            @enderror
            <div class="gender">
                <div><label class="gender-name">女性<input type="radio" class="gender-input" name="gender" value="女性"></label></div>
                <div><label class="gender-name">男性</label><input type="radio" class="gender-input" name="gender" value="男性"></div>
                <div><label class="gender-name">カスタム</label><input type="radio" class="gender-input" name="gender" value="カスタム"></div>
            </div>
            <button class="btn">アカウントを作成</button>
        </form>
        <a href="{{ route('showLogin') }}" class="login">すでにアカウントをお持ちの方</a>
    </div>
</x-layout>

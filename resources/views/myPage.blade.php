<x-layout>
    <x-slot name="title">
        マイページ
    </x-slot>
    <div class="box">
        <h2>マイページ</h2>
        <div class="myPage_container">
            <p>こんにちは{{ Auth::user()->name }}さん！</p>
        </div>

        <div class="myPage_list">
            <ul>
                <li><a href="{{ route('posts.post') }}">投稿一覧</a></li>
                <li><a href="#">検索</a></li>
            </ul>
        </div>

        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button class="myPage_btn">ログアウト</button>
        </form>
    </div>
</x-layout>

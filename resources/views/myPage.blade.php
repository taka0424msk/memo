<x-layout>
    <x-slot name="title">
        マイページ
    </x-slot>
    <div class="box">
        <h2>マイページ</h2>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <div class="myPage_container">
                <p>名前：{{ Auth::user()->name }}</p>
            </div>
            <button class="myPage_btn">ログアウト</button>
        </form>
    </div>
</x-layout>

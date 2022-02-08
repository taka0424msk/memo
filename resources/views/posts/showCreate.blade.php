<x-layout>
    <x-slot name="title">
        投稿ページ
    </x-slot>
    <div class="box">
        <h2>投稿ページ</h2>
        <form action="{{ route('posts.create') }}" method="POST">
            @csrf

            <div>
                <p class="postPage">タイトル</p>
                @error('title')
                    <div class="error">{{ $message }}</div>
                @enderror
                <input class="input" type="text" name="title">
            </div>
            <div>
                <p class="postPage">内容</p>
                @error('body')
                    <div class="error">{{ $message }}</div>
                @enderror
                <textarea name="body" class="textarea"></textarea>
            </div>
            <button class="myPage_btn">投稿</button>
        </form>
    </div>
</x-layout>

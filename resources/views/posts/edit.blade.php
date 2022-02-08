<x-layout>
    <x-slot name="title">
        投稿ページ
    </x-slot>
    <div class="box">
        <h2>投稿ページ</h2>
        <form action="{{ route('posts.edit', $post) }}" method="POST">
            @method('PATCH')
            @csrf

            <div>
                <p class="postPage">タイトル</p>
                @error('title')
                    <div class="error">{{ $message }}</div>
                @enderror
                <input class="input" type="text" name="title" value="{{ old('title', $post->title) }}">
            </div>
            <div>
                <p class="postPage">内容</p>
                @error('body')
                    <div class="error">{{ $message }}</div>
                @enderror
                <textarea name="body" class="textarea">{{ old('body', $post->body) }}</textarea>
            </div>
            <button class="myPage_btn">編集</button>
        </form>
        <form action="{{ route('posts.destroy', $post) }}" method="POST" id="delete_post">
            @method('DELETE')
            @csrf

            <button class="delete_btn">削除</button>
        </form>
    </div>

    <script>
        'use strict'
        {
            document.getElementById('delete_post').addEventListener('submit', e => {
                e.preventDefault();
                if (!confirm('本当に削除しますか？')) {
                    return;
                }
                e.target.submit();
            });
        }
    </script>
</x-layout>

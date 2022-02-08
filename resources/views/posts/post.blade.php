<x-layout>
    <x-slot name="title">
        投稿一覧
    </x-slot>
    <div class="box">
        <div class="post_header">
            <div class="flex1">&laquo; <a href="{{ route('myPage') }}">Back</a></div>
            <h2>投稿一覧</h2>
            <div class="flex2"><a href="{{ route('posts.showCreate') }}">書き込み</a></div>
        </div>
        <div class="posts_box">
            @forelse (Auth::user()->posts()->latest()->get() as $post)
                <div class="posts"><a href="{{ route('posts.showPost', $post) }}">{{ $post->title }}</a></div>
            @empty
                <div><p>投稿はまだありません。</p></div>
            @endforelse
        </div>
    </div>
</x-layout>

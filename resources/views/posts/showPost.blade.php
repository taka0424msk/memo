<x-layout>
    <x-slot name="title">
        {{ $post->title }}
    </x-slot>
    <div class="box">

        <div class="edit"><a href="{{ route('posts.showEdit', $post) }}">編集</a></div>
        @if (session('edit_success'))
            <div class="success">{{ session('edit_success') }}</div>
        @endif
        <div class="post_title"><h2>{{ $post->title }}</h2></div>
        <div>
            <p class="post_body">{!! nl2br(e($post->body)) !!}</p>
        </div>
        <div class="back"><a href="{{ route('posts.post') }}">戻る</a></div>
    </div>
</x-layout>

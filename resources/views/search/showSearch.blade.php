<x-layout>
    <x-slot name="title">
        検索ページ
    </x-slot>
    <div class="box">
        <h2>検索ページ</h2>
        <form action="{{ route('search') }}" method="POST">
            @csrf

            <div>
                <input class="input" type="text" name="search" value="@if (isset($search)) {{ $search }} @endif">
                <button class="myPage_btn">検索</button>
            </div>
        </form>

        <div>
            @if (isset($users))

                @foreach ($users as $user)

                {{ $user->name }}

                @endforeach

            @endif

            @if (isset($posts))

                @foreach ($posts as $post)

                <a href="{{ route('posts.showPost', $post) }}">{{ $post->title }}</a>

                @endforeach

            @endif

        </div>
    </div>

</x-layout>

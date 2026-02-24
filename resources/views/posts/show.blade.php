<x-layout>
    <x-slot:title>Skats - {{ $post->content }}</x-slot:title>
    <h1>{{$post->content}}</h1>
    <h2>{{ $category->name }}</h2>
    <a href="/posts/{{ $post->id }}/edit">Rediģēt</a>
    <form method="POST" action="/posts/{{ $post->id }}">
        @csrf
        @method("delete")
        <button>Dzēst</button>
    </form>
    <form method="POST" action="/comments">
        @csrf
        <label>Komentārs: <input name="comment" value="{{ old('comment', '') }}"></label>
        @error("comment")
            <p>{{ $message }}</p>
        @enderror
        <label>Autors: <input name="author" value="{{ old('author', '') }}"></label>
        @error("author")
            <p>{{ $message }}</p>
        @enderror
        <button name="id" value="{{ $post->id }}">Iesniegt</button>
    </form>
    @foreach($comments as $comment)
        @if($comment->blog_id == $post->id) 
            <p>{{ $comment->author }} {{ $comment->updated_at }}<br>{{ $comment->comment }}</p>
            <a href="/comments/{{ $comment->id }}">Rediģēt</a>
            <form method="POST" action="/comments/{{ $comment->id }}">
                @csrf
                @method("delete")
                <button>Dzēst</button>
            </form>
        @endif
    @endforeach
</x-layout>
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
</x-layout>
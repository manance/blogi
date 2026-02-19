<x-layout>
    <x-slot:title>Blogi</x-slot:title>
    <h1>Šeit ir visi Blogu ieraksti:</h1>
    <ul>
        @foreach($posts as $post)
            <li><a href="/posts/{{ $post->id }}">{{$post->content}}</a></li>
        @endforeach
    </ul>
</x-layout>
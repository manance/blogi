<x-layout>
    <x-slot:title>Skats - {{ $category->name }}</x-slot:title>
    <h1>{{ $category->name }}</h1>
    <a href="/categories/{{ $category->id }}/edit">Rediģēt</a>
    <form method="POST" action="/categories/{{ $category->id }}">
        @csrf
        @method("delete")
        <button>Dzēst</button>
    </form>
</x-layout>
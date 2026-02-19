<x-layout>
    <x-slot:title>Kategorijas</x-slot:title>
    <h1>Šeit it visas kategorijas!</h1>
    <ul>
        @foreach($categories as $category)
            <li><a href="/categories/{{ $category->id }}">{{ $category->name }}</a></li>
        @endforeach
    </ul>
</x-layout>
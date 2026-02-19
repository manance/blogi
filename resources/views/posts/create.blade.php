<x-layout>
    <x-slot:title>Pievieno</x-slot:title>
    <h1>Pievieno jaunu ierakstu!</h1>
    <form method="POST" action="/posts">
        @csrf
        <input name="content">
        @error("content")
        <p>{{ $message }}</p>
        @enderror
        <select name="category">
            @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
        <button>Saglabāt</button>
    </form>
</x-layout>
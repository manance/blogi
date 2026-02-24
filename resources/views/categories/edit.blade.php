<x-layout>
    <x-slot:title>Rediģēt</x-slot:title>
    <h1>Rediģē kategorijas nosaukumu!</h1>
    <form method="POST" action="/categories/{{ $category->id }}">
        @csrf
        @method("PUT")
        <label>Kategorija: <input name="name" value="{{ old('name', $category->name) }}"></label>
        @error("name")
            <p>{{ $message }}</p>
        @enderror
        <button>Sagabāt</button>
    </form>
</x-layout>
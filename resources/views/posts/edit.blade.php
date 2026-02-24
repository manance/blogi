<x-layout>
    <x-slot:title>Rediģē</x-slot:title>
    <h1>Rediģē bloga ierakstu!</h1>
    <form method="POST" action="/posts/{{ $post->id }}">
        @csrf
        @method("PUT")
        <label>Blogs: <input name="content" type="text" value="{{ old('content', $post->content) }}"></label>
        @error("content")
            <p>{{ $message }}</p>
        @enderror
        <label>Kategorija: <select name="category">
            @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ ($post->category_id == $category->id) ? "selected" : "" }}>{{ $category->name }}</option>
            @endforeach
        </select></label>
        @error("category")
            <p>{{ $message }}</p>
        @enderror
        <button>Saglabāt</button>
    </form>
</x-layout>
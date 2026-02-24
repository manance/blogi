<x-layout>
    <x-slot:title>Edit Comment</x-slot:title>
    <h1>Rediģē komentāru!</h1>
    <form method="POST" action="/comments/{{ $comment->id }}">
        @csrf
        @method("PUT")
        <label>Komentārs<input name="comment" value="{{ old('comment', $comment->comment) }}"></label>
        <button>Saglabāt</button>
    </form>
</x-layout>
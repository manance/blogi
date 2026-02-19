<x-layout>
    <x-slot:title>Izveido</x-slot:title>
    <h1>Izveido jaunu kategoriju!</h1>
    <form action="/categories" method="POST">
        @csrf
        <input name="name">
        @error("name")
            <p>{{ $message }}</p>
        @enderror
        <button>Pievienot!</button>
    </form>
</x-layout>
@extends('layouts.app')

@section('title', 'Nouveau Produit')

@section('content')
<h1>Créer un Produit</h1>

<form method="POST" action="/products">
    @csrf

    <p>
        <label>Nom :</label><br>
        <input type="text" name="name" value="{{ old('name') }}">
        @error('name') <span style="color:red">{{ $message }}</span> @enderror
    </p>

    <p>
        <label>Description :</label><br>
        <textarea name="description">{{ old('description') }}</textarea>
    </p>

    <p>
        <label>Prix :</label><br>
        <input type="number" step="0.01" name="price" value="{{ old('price') }}">
        @error('price') <span style="color:red">{{ $message }}</span> @enderror
    </p>

    <p>
        <label>Stock :</label><br>
        <input type="number" name="stock" value="{{ old('stock', 0) }}">
    </p>

    <button type="submit">Enregistrer</button>
    <a href="/products">Annuler</a>
</form>
@endsection
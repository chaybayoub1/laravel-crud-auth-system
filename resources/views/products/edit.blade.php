@extends('layouts.app')

@section('title', 'Modifier Produit')

@section('content')
<h1>Modifier : {{ $product->name }}</h1>

<form method="POST" action="/products/{{ $product->id }}">
    @csrf
    @method('PUT')

    <p>
        <label>Nom :</label><br>
        <input type="text" name="name" value="{{ old('name', $product->name) }}">
    </p>

    <p>
        <label>Prix :</label><br>
        <input type="number" step="0.01" name="price" value="{{ old('price', $product->price) }}">
    </p>

    <p>
        <label>Stock :</label><br>
        <input type="number" name="stock" value="{{ old('stock', $product->stock) }}">
    </p>

    <button type="submit">Mettre à jour</button>
    <a href="/products">Annuler</a>
</form>
@endsection
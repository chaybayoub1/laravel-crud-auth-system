@extends('layouts.app')

@section('title', 'Liste des Produits')

@section('content')

<h1>Liste des Produits</h1>

@if(session('success'))
    <div style="color:green">{{ session('success') }}</div>
@endif

<a href="/products/create">+ Nouveau Produit</a>

<table border="1" cellpadding="10" style="margin-top:20px; width:100%">
    <tr>
        <th>Nom</th>
        <th>Prix</th>
        <th>Stock</th>
        <th>Actions</th>
    </tr>

@forelse($products as $product)
    <tr>
        <td>{{ $product->name }}</td>
        <td>{{ $product->price }} MAD</td>
        <td>{{ $product->stock }}</td>
        <td>
            <a href="/products/{{ $product->id }}/edit">Modifier</a>

            <form method="POST" action="/products/{{ $product->id }}" style="display:inline">
                @csrf
                @method('DELETE')
                <button onclick="return confirm('Supprimer ?')">Supprimer</button>
            </form>
        </td>
    </tr>
@empty
    <tr>
        <td colspan="4">Aucun produit pour l'instant.</td>
    </tr>
@endforelse

</table>

@endsection
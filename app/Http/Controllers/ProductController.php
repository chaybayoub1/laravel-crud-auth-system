<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    // 1. Afficher la liste des produits
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    // 2. Afficher le formulaire de création
    public function create()
    {
        return view('products.create');
    }

    // 3. Enregistrer un nouveau produit
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
        ]);

        Product::create($validated);

        return redirect('/products')->with('success', 'Produit créé avec succès !');
    }

    // 4. Afficher le formulaire de modification
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('products.edit', compact('product'));
    }

    // 5. Mettre à jour un produit
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
        ]);

        $product->update($validated);

        return redirect('/products')->with('success', 'Produit mis à jour !');
    }

    // 6. Supprimer un produit
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect('/products')->with('success', 'Produit supprimé !');
    }
}
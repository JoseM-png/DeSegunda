<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    // Mostrar los productos favoritos del usuario
    public function index()
    {
        // Obtiene los productos favoritos del usuario
        $favorites = Auth::user()->favorites;
        
        // Retorna la vista con los productos favoritos
        return view('favorites.index', compact('favorites'));
    }

    // Eliminar un producto de los favoritos
    public function destroy(Product $product)
    {
        // Elimina el producto de los favoritos del usuario
        Auth::user()->favorites()->detach($product);
        
        // Redirige de nuevo a la página de favoritos con un mensaje de éxito
        return redirect()->route('favorites.index')->with('status', 'Producto eliminado de favoritos');
    }
}


<?php

namespace App\Http\Controllers;

use App\Models\Product; // Asegúrate de tener un modelo de Producto
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
{
    $category = $request->input('category');

    if ($category) {
        // Filtrar productos por la categoría seleccionada
        $products = Product::where('category', $category)->get();
    } else {
        // Obtener todos los productos si no se seleccionó una categoría
        $products = Product::all();
    }

    return view('products.index', compact('products'));
}


    public function create()
    {
        return view('products.create');  // Asegúrate de que la vista 'products.create' exista
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'category' => 'required|string',  // Validar la categoría
        ]);

        $product = new Product();
        $product->name = $validated['name'];
        $product->description = $validated['description'];
        $product->price = $validated['price'];
        $product->category = $validated['category'];  // Asignar la categoría
        $product->user_id = auth()->id();  // Relacionar el producto con el usuario autenticado
        
        // Si el producto tiene una imagen, guardarla
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('public/products');
            $product->image_url = basename($imagePath);
        }

        $product->save();

        return redirect()->route('products.index')->with('status', 'Producto creado con éxito');
    }


}

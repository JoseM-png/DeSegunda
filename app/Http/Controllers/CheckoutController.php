<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Notifications\ProductPurchasedNotification;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index(Product $product)
    {
        return view('checkout.index', compact('product'));
    }

    public function completePurchase(Request $request, Product $product)
{
    // Verifica si el producto tiene un vendedor asociado
    if (!$product->user) {
        return redirect()->back()->with('error', 'El vendedor de este producto no está registrado.');
    }

    $seller = $product->user;

    // Guarda la información del producto antes de eliminarlo
    $productData = [
        'name' => $product->name,
        'price' => $product->price,
    ];

    // Elimina el producto tras la compra
    $product->delete();

    // Envía la notificación al vendedor
    $seller->notify(new ProductPurchasedNotification($productData));

    // Redirige con mensaje de éxito
    return redirect()->route('products.index')->with('success', 'Compra realizada con éxito.');
}


    
public function confirmPurchase(Request $request, $productId)
{
    $product = Product::findOrFail($productId);
    $buyer = auth()->user();

    // Notificar al dueño del producto
    $product->user->notify(new ProductPurchasedNotification($product, $buyer));

    // Eliminar o marcar como vendido
    $product->delete();

    return redirect()->route('products.index')->with('status', 'Compra realizada con éxito');
}


}


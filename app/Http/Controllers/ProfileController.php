<?php

namespace App\Http\Controllers;


use App\Models\Product;  // Asegúrate de importar el modelo Product si lo necesitas

class ProfileController extends Controller
{
    // Muestra el perfil del usuario
    public function show()
    {
        $user = auth()->user();
        $products = Product::where('user_id', $user->id)->get(); // Obtener productos del usuario autenticado

        // Pasamos los productos y la información del usuario a la vista
        return view('profile.show', compact('user', 'products'));
    }

    // Muestra la vista para editar el perfil
    public function edit()
    {
        return view('profile.edit');
    }

    // Actualiza la información del perfil
    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . auth()->id(),
            'password' => 'nullable|confirmed|min:8',
        ]);

        $user = auth()->user();
        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->password) {
            $user->password = bcrypt($request->password);
        }

        $user->save();

        return redirect()->route('profile.show')->with('status', 'Perfil actualizado con éxito!');
    }
}

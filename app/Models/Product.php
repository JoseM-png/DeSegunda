<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // Definimos los campos que se pueden asignar masivamente
    protected $fillable = ['name', 'description', 'price',
    'category', 'image_url', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function favoritedBy()
{
    return $this->belongsToMany(User::class, 'favorites')->withTimestamps();
}


public function favorites()
{
    $favorites = auth()->user()->favorites; // Recupera los productos favoritos del usuario
    return view('products.favorites', compact('favorites'));
}

}



<?php

namespace App\Models;

use App\Enums\PanierStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Panier extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'image', 'description', 'price', 'status'];

    protected $casts = [
        'status' => PanierStatus::class

    ];

    public function products()
    {
        return $this->belongsToMany(Product::class, 'panier_product');
    }

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }
}

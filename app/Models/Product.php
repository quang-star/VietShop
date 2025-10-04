<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
//     Schema::create('products', function (Blueprint $table) {
//             $table->id();
//             $table->string('name')->index();
//             $table->string('description')->nullable();
//             $table->decimal('price', 20, 2)->index();
//             $table->integer('stock')->default(0);
//             $table->string('image_url')->nullable();
//             $table->timestamps();
//         });
    protected $fillable = [
        'name',
        'description',
        'price',
        'stock',
        'image_url',
    ];
}

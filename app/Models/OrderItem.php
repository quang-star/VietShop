<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;
    protected $table = 'order_items';
    //  Schema::create('order_items', function (Blueprint $table) {
    //         $table->id();
    //         $table->integer('order_id')->index();
    //         $table->integer('product_id')->index();
    //         $table->integer('quantity');
    //         $table->decimal('price', 20, 2);
    //         $table->decimal('subtotal', 20, 2);
    //         $table->timestamps();
    //     });
    protected $fillable = [
        'order_id',
        'product_id',
        'quantity',
        'price',
        'subtotal',
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $table = 'carts';
    //  Schema::create('carts', function (Blueprint $table) {
    //         $table->id();
    //         $table->integer('user_id')->index();
    //         $table->integer('product_id')->index();
    //         $table->integer('quantity');
    //         $table->timestamps();

    //         $table->unique(['user_id', 'product_id']);
    //     });
    protected $fillable = [
        'user_id',
        'product_id',
        'quantity',
    ];
}

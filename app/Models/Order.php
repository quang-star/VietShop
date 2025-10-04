<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';
    // Schema::create('orders', function (Blueprint $table) {
    //         $table->id();
    //         $table->integer('user_id')->index();
    //         $table->string('order_code')->unique();
    //         $table->decimal('total_amount', 20, 2);
    //         $table->integer('payment_method'); // cod, vietqr, vnpay
    //         $table->integer('payment_status'); // pending, success, failed
    //         $table->integer('order_status'); // pending, confirmed, shipped, completed, canceled
    //         $table->string('receipt_url')->nullable();
    //         $table->timestamps();
    //     });
    protected $fillable = [
        'user_id',
        'order_code',
        'total_amount',
        'payment_method',
        'payment_status',
        'order_status',
        'receipt_url',
    ];
}

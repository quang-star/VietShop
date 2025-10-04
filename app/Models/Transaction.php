<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $table = 'transactions';
    //  Schema::create('transactions', function (Blueprint $table) {
    //         $table->id();
    //         $table->integer('order_id')->index();
    //         $table->integer('payment_gateway'); // vietqr, vnpay
    //         $table->decimal('amount', 20, 2);
    //         $table->string('transaction_code')->unique();
    //         $table->integer('transaction_status'); // pending, success, failed
    //         $table->dateTime('payment_time')->nullable();
    //         $table->string('note')->nullable();
    //         $table->timestamps();
    //     });

    protected $fillable = [
        'order_id',
        'payment_gateway',
        'amount',
        'transaction_code',
        'transaction_status',
        'payment_time',
        'note',
    ];
}

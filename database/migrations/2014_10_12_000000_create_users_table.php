<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id()->index();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->integer('role');
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name')->index();
            $table->string('description')->nullable();
            $table->decimal('price', 20, 2)->index();
            $table->integer('stock')->default(0);
            $table->string('image_url')->nullable();
            $table->timestamps();
        });
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->index();
            $table->integer('product_id')->index();
            $table->integer('quantity');
            $table->timestamps();

            $table->unique(['user_id', 'product_id']);
        });
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->index();
            $table->string('order_code')->unique();
            $table->decimal('total_amount', 20, 2);
            $table->integer('payment_method'); // cod, vietqr, vnpay
            $table->integer('payment_status'); // pending, success, failed
            $table->integer('order_status'); // pending, confirmed, shipped, completed, canceled
            $table->string('receipt_url')->nullable();
            $table->timestamps();
        });
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->integer('order_id')->index();
            $table->integer('product_id')->index();
            $table->integer('quantity');
            $table->decimal('price', 20, 2);
            $table->decimal('subtotal', 20, 2);
            $table->timestamps();
        });
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->integer('order_id')->index();
            $table->integer('payment_gateway'); // vietqr, vnpay
            $table->decimal('amount', 20, 2);
            $table->string('transaction_code')->unique();
            $table->integer('transaction_status'); // pending, success, failed
            $table->dateTime('payment_time')->nullable();
            $table->string('note')->nullable();
            $table->timestamps();
        });
        Schema::create('mail_logs', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->index();
            $table->string('subject');
            $table->string('message');
            $table->dateTime('sent_at');
            $table->integer('status');
            $table->timestamps();
        });

        Schema::create('drive_files', function (Blueprint $table) {
            $table->id();
            $table->string('file_name');
            $table->string('drive_id')->nullable();
            $table->string('file_url')->nullable();
            $table->string('file_type')->nullable();
            $table->string('related_type')->nullable();
            $table->integer('related_id')->nullable();
            $table->timestamp('uploaded_at')->nullable();

            $table->index(['related_type', 'related_id']);
            $table->timestamps();
        });
        Schema::create('statistics', function (Blueprint $table) {
            $table->id();
            $table->date('date')->unique();
            $table->integer('total_orders')->default(0);
            $table->decimal('total_revenue', 20, 2)->default(0);
            $table->integer('top_product_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('products');
        Schema::dropIfExists('carts');
        Schema::dropIfExists('orders');
        Schema::dropIfExists('order_items');
        Schema::dropIfExists('transactions');
        Schema::dropIfExists('mail_logs');
        Schema::dropIfExists('drive_files');
        Schema::dropIfExists('statistics');
    }
};

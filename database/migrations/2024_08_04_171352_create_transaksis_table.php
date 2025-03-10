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
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();
            $table->string('number', 16);
            $table->longText('order_id');
            $table->unsignedBigInteger('user_id');
            $table->decimal('total_price', 10, 2);
            $table->enum('payment_status', ['1', '2', '3', '4'])->comment('1=menunggu pembayaran, 2=sudah dibayar, 3=kadaluarsa, 4=batal');
            // $table->string('snap_token', 36)->nullable();
            $table->string('pengiriman');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            // $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade')->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksis');
    }
};

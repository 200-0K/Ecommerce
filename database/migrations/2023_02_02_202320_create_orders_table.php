<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->decimal('price', unsigned: true);
            $table->integer('qty', unsigned: true);
            $table->float('rate', 2, 1, unsigned: true)->nullable();
            $table->text('comment')->nullable();
            $table->foreignId('product_id')->constrained('products');
            $table->foreignId('invoice_id')->constrained('invoices');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
};

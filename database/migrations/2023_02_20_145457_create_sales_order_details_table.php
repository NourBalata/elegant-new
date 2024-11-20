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
        Schema::create('sales_order_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sales_order_id')->constrained()->cascadeOnDelete();
            $table->foreignId('services_id')->constrained()->cascadeOnDelete();
            $table->string('services_name')->nullable();
            $table->foreignId('category_id')->constrained()->cascadeOnDelete();
            $table->string('category_name')->nullable();
            $table->bigInteger('quantity')->default(0);
            $table->decimal('price',8,2)->default(0);
            $table->decimal('discount',8,2)->default(0);
            $table->decimal('price_discount',8,2)->default(0);
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
        Schema::dropIfExists('sales_order_details');
    }
};

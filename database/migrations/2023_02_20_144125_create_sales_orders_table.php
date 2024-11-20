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
        Schema::create('sales_orders', function (Blueprint $table) {
            $table->id();
            $table->string('number');
            $table->tinyInteger('status')->default(1);
            $table->foreignId('patient_id')->constrained('users')->references('id')->cascadeOnDelete();
            $table->string('patient_name')->nullable();
            $table->string('doctor_name')->nullable();
            $table->decimal('total',8,2)->nullable();
            $table->decimal('total_discounts',8,2)->nullable();
            $table->decimal('final_total',8,2)->nullable();
            $table->text('note')->nullable();
            $table->string('attachment')->nullable();
            $table->string('date')->nullable();
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
        Schema::dropIfExists('sales_orders');
    }
};

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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name_ar');
            $table->string('name_en')->nullable();
            $table->string('email')->unique();
            $table->string('id_number')->unique();
            $table->string('date_of_birth')->nullable();
            $table->string('gender')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('phone')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->string('telephone')->nullable();
            $table->foreignId('city_id')->constrained()->cascadeOnDelete();
            $table->string('address')->nullable();
            $table->string('logo')->nullable();
            $table->string('password')->default(bcrypt('123456'));
            $table->decimal('balance',8,2)->nullable();
            $table->string('job_title')->nullable();
            $table->string('graduation_certificate')->nullable();
            $table->string('cv')->nullable();
            $table->tinyInteger('type')->default(0);
            /* Users: 0=>patient, 1=>Admin, 2=>Doctor ,3=>employ , 4=>supplier */
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};

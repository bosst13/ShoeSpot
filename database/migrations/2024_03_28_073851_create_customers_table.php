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
        Schema::create('customers', function (Blueprint $table) {


            $table->unsignedBigInteger('user_id')->index();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->bigIncrements('customer_id');
            $table->string('fname');
            $table->string('lname');
            $table->string('phone')->nullable();
            $table->string('profile_picture')->nullable();
            $table->string('addressline')->nullable();
            $table->softDeletes();
            $table->timestamps();



        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('customers', function (Blueprint $table) {
            $table->dropColumn('profile_picture');
        });
        Schema::dropIfExists('customers');

    }
};

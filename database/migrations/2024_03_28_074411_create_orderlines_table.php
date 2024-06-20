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
        Schema::create('orderlines', function (Blueprint $table) {

            $table->unsignedBigInteger('orderinfo_id')->index();
            $table->foreign('orderinfo_id')->references('orderinfo_id')->on('orderinfos')->onDelete('cascade');
            $table->unsignedBigInteger('product_id')->index();
            $table->foreign('product_id')->references('product_id')->on('products')->onDelete('cascade');
            $table->integer('quantity');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orderlines');
    }
};

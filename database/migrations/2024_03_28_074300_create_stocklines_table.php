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
        Schema::create('stocklines', function (Blueprint $table) {

            $table->unsignedBigInteger('stock_id')->index();
            $table->foreign('stock_id')->references('stock_id')->on('stocks')->onDelete('cascade');
            $table->unsignedBigInteger('supplier_id')->index();
            $table->foreign('supplier_id')->references('supplier_id')->on('suppliers')->onDelete('cascade');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_stocklines');
    }
};

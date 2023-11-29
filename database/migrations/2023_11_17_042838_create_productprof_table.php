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
        Schema::create('productprof', function (Blueprint $table) {
            $table->id(); 
            $table->string ('productname'); 
            $table->string ('desc'); 
           $table->unsignedBigInteger('unitid');
           $table->unsignedBigInteger('brandid');
           $table->unsignedBigInteger('imagepathid');
            $table->foreign('unitid')->references('id')->on('units')->onDelete('cascade');
            $table->foreign('brandid')->references('id')->on('brands')->onDelete('cascade');
            $table->foreign('imagepathid')->references('id')->on('images')->onDelete('cascade');
            // $table->foreignId('brandid')->constrained(table: 'brand', indexName: 'product_brandid');
            // $table->foreignId('imageid')->constrained(table: 'imagepath', indexName: 'product_imageid');
            // $table->unsignedBigInteger('brandid');
            // $table->unsignedBigInteger('imageid');
            $table->timestamps();

            // $table->foreign('unitid')->references('unitid')->on('unit');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Schema::dropIfExists('productprof');
    }
};



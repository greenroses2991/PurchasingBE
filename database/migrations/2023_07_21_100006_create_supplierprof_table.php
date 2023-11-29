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
        Schema::create('supplierprof', function (Blueprint $table) {
            $table->id();
            $table->string('suppliername');
            $table->string('address');
            $table->string('contactperson');
            $table->string('contactnum')->unique();
        
            // $table->unique(['suppliername', 'address', 'contactperson','contactnum']);
    
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('supplierprof');
    }
};

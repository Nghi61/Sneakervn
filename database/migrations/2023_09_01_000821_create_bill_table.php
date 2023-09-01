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
        Schema::create('bill', function (Blueprint $table) {
            $table->id();
            $table->string('MHD');
            $table->string('name');
            $table->string('phone');
            $table->string('email');
            $table->string('address');
            $table->enum('payment',[0,1,2,3])->default(0);
            $table->enum('delivery',[0,1])->default(0);
            $table->integer('total');
            $table->enum('status',[0,1,2,3])->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bill');
    }
};

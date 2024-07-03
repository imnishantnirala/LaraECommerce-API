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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->onDelete('cascade');
            $table->foreignId('merchant_account_id')->onDelete('cascade');
            $table->string('name', 100);
            $table->string('slug', 150)->unique()->index()->nullable();
            $table->longText('description');
            $table->unsignedInteger('price');
            $table->unsignedInteger('weight');
            $table->unsignedInteger('stock')->default(1);
            $table->unsignedInteger('sold')->default(0);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};

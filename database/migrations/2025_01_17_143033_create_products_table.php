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
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade');
            $table->foreignId('subcategory_id')->nullable()->constrained('sub_categories')->onDelete('set null');
            $table->foreignId('brand_id')->nullable()->constrained('brands')->onDelete('set null');
            $table->foreignId('childecategory_id')->nullable()->constrained('child_categories')->onDelete('set null');
            $table->string('name');
            $table->string('code');
            $table->string('unit')->nullable();
            $table->string('tags')->nullable();
            $table->string('purchase_price')->nullable();
            $table->string('selling_price')->nullable();
            $table->string('discount_price')->nullable();
            $table->string('stock_quentity')->nullable();
            $table->foreignId('warehouse_id')->nullable()->constrained('warehouses')->onDelete('set null');
            $table->text('description')->nullable();
            $table->string('thumbnail')->nullable();
            $table->string('images')->nullable();
            $table->integer('feature')->nullable();
            $table->integer('today_deal')->nullable();
            $table->integer('color')->nullable();
            $table->integer('size')->nullable();
            $table->integer('status')->nullable();
            $table->integer('false_deal_id')->nullable();
            $table->integer('case_on_delevery')->nullable();
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

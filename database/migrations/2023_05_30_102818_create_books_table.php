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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('title')->unique();
            $table->text('summary');
            $table->foreignId('author_id')->constrained();
            $table->foreignId('publisher_id')->constrained();
            $table->foreignId('edition_id')->constrained();
            $table->timestamp('published_date')->nullable();
            $table->integer('price');
            $table->integer("category_id");
            $table->integer('status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};

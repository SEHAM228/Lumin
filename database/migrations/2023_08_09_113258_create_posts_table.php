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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
           
            $table->string('title_en');
            $table->string('slug');
         
            $table->string('body_en');
            $table->string('premium')->default(0);
            $table->string('published')->default(1);
            $table->string('simple')->default(1);
            $table->string('photo');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('like')->default(0);
            $table->unsignedBigInteger('dislike')->default(0);
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};

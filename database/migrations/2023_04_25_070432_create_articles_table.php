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
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('text');
            // $table->integer('category');
            // $table->unsignedBigInteger('category_id');

            $table->unsignedBigInteger('category_id');

            // $table->foreign('category_id')->references('id')->on('categories');

            // $table->foreignId('category_id')->constrained(
            //     'categories',indexName:'article_category_id'
            // );
            $table->string('image');
            $table->timestamps();
        });

        // Schema::table('articles', function (Blueprint $table) {
        //     $table->foreignId('category_id')->constrained(
        //         'categories',indexName:'id'
        //     );
        // });

        // Schema::table('articles', function (Blueprint $table) {
        //     $table->unsignedBigInteger('category_id');

        //     $table->foreign('category_id')->references('id')->on('categories');
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};

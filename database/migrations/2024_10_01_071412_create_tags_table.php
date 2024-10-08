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
        Schema::create(
            'tags', function (Blueprint $table) {
                $table->id();
                $table->string('name');
            }
        );

        Schema::create(
            'product_tag', function (Blueprint $table) {
                $table->id();
                $table->bigInteger('product_id');
                $table->bigInteger('tag_id');
            }
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tags');
    }
};

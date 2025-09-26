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
        Schema::create('post_taxonomy', function (Blueprint $table) {
            $table->primary(['post_id', 'taxonomy_id']);
            $table->foreignId('post_id')->constrained()->cascadeOnDelete();
            $table->foreignId('taxonomy_id')->constrained()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('post_taxonomy');
    }
};

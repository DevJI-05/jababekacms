<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('contents', function (Blueprint $table) {
            $table->id();
            $table->foreignId('menu_id')->constrained()->cascadeOnDelete();
            $table->foreignId('sub_menu_id')->nullable()->constrained()->cascadeOnDelete();
            $table->string('title');
            $table->string('slug');
            $table->string('image')->nullable();
            $table->text('description_en')->nullable();
            $table->text('description_id')->nullable();
            $table->json('urls')->nullable();
            $table->longText('body')->nullable();
            $table->unsignedInteger('sort_order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();

            $table->index(['menu_id', 'sub_menu_id', 'slug']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('contents');
    }
};

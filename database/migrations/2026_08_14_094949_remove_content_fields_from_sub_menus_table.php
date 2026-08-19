<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('sub_menus', function (Blueprint $table) {
            $table->dropColumn(['image', 'description_en', 'description_id', 'urls', 'body']);
        });
    }

    public function down(): void
    {
        Schema::table('sub_menus', function (Blueprint $table) {
            $table->string('image')->nullable();
            $table->text('description_en')->nullable();
            $table->text('description_id')->nullable();
            $table->json('urls')->nullable();
            $table->longText('body')->nullable();
        });
    }
};

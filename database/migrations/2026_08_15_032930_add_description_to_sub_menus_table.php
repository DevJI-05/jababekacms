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
        Schema::table('sub_menus', function (Blueprint $table) {
            $table->longText('description_en')->nullable()->after('icon');
            $table->longText('description_id')->nullable()->after('description_en');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('sub_menus', function (Blueprint $table) {
            $table->dropColumn(['description_en', 'description_id']);
        });
    }
};

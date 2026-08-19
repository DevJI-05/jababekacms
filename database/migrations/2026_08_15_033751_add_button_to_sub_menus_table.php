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
            $table->string('button_label_en')->nullable()->after('description_id');
            $table->string('button_label_id')->nullable()->after('button_label_en');
            $table->string('button_url')->nullable()->after('button_label_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('sub_menus', function (Blueprint $table) {
            $table->dropColumn(['button_label_en', 'button_label_id', 'button_url']);
        });
    }
};

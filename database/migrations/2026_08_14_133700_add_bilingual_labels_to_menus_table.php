<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('menus', function (Blueprint $table) {
            $table->string('label_en')->nullable()->after('id');
            $table->string('label_id')->nullable()->after('label_en');
        });

        DB::table('menus')->update(['label_en' => DB::raw('label')]);

        Schema::table('menus', function (Blueprint $table) {
            $table->dropColumn('label');
        });
    }

    public function down(): void
    {
        Schema::table('menus', function (Blueprint $table) {
            $table->string('label')->nullable()->after('id');
        });

        DB::table('menus')->update(['label' => DB::raw('label_en')]);

        Schema::table('menus', function (Blueprint $table) {
            $table->dropColumn(['label_en', 'label_id']);
        });
    }
};

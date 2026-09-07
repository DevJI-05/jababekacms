<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('tenants', function (Blueprint $table) {
            $table->decimal('land_area', 12, 2)->nullable()->after('category');
            $table->string('block')->nullable()->after('address');
            $table->string('estate')->nullable()->after('block');
            $table->text('industry_type')->nullable()->after('estate');
            $table->string('investment_country')->nullable()->after('industry_type');
            $table->string('building_type')->nullable()->after('investment_country');
        });
    }

    public function down(): void
    {
        Schema::table('tenants', function (Blueprint $table) {
            $table->dropColumn(['land_area', 'block', 'estate', 'industry_type', 'investment_country', 'building_type']);
        });
    }
};

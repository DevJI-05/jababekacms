<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('history_milestones', function (Blueprint $table) {
            $table->json('media')->nullable()->after('image');
        });

        DB::table('history_milestones')->whereNotNull('image')->select('id', 'image')->orderBy('id')
            ->each(function (object $row): void {
                DB::table('history_milestones')->where('id', $row->id)->update([
                    'media' => json_encode([$row->image]),
                ]);
            });

        Schema::table('history_milestones', function (Blueprint $table) {
            $table->dropColumn('image');
        });
    }

    public function down(): void
    {
        Schema::table('history_milestones', function (Blueprint $table) {
            $table->string('image')->nullable()->after('media');
        });

        DB::table('history_milestones')->whereNotNull('media')->select('id', 'media')->orderBy('id')
            ->each(function (object $row): void {
                $media = json_decode($row->media, true);

                DB::table('history_milestones')->where('id', $row->id)->update([
                    'image' => $media[0] ?? null,
                ]);
            });

        Schema::table('history_milestones', function (Blueprint $table) {
            $table->dropColumn('media');
        });
    }
};

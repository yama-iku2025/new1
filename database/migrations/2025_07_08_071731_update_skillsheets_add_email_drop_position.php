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
        Schema::table('skill_sheets', function (Blueprint $table) {
            $table->string('email')->nullable()->after('address'); // 🔹 追加
            $table->dropColumn('position'); // 🔸 削除
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
         Schema::table('skill_sheets', function (Blueprint $table) {
            $table->string('position')->nullable();
            $table->dropColumn('email');
        });
    }
};

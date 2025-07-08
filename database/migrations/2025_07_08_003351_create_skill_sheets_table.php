// database/migrations/xxxx_xx_xx_xxxxxx_create_skill_sheets_table.php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('skill_sheets', function (Blueprint $table) {
            $table->id();
            $table->string('name');                    // 氏名
            $table->string('department')->nullable();  // 所属
            $table->string('position')->nullable();    // 役職
            $table->integer('experience_years');       // 実務経験年数
            $table->text('self_pr')->nullable();       // 自己PR
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('skill_sheets');
    }
};

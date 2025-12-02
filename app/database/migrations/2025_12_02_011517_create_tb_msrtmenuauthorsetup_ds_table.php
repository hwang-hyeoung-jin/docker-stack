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
        Schema::create('tb_msrtalllog_ds', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('msrt_no')->nullable(); // 관리자번호
            $table->timestamp('execut_dt')->useCurrent();      // 실행일시
            $table->string('ip', 45)->nullable();              // IP
            $table->string('flpth')->nullable();               // 파일경로
            $table->string('smpsnt')->nullable();              // 단문
            $table->text('detail_dc')->nullable();             // 상세설명

            $table->index('msrt_no');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_msrtmenuauthorsetup_ds');
    }
};

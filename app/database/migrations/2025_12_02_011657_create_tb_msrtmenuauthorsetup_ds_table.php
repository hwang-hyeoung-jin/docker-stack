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
        Schema::create('tb_msrtmenuauthorsetup_ds', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('msrt_no');       // 관리자번호
            $table->unsignedBigInteger('menu_no');       // 메뉴번호
            $table->timestamp('regist_dt')->useCurrent();// 등록일시
            $table->unsignedBigInteger('opert_msrt_no')->nullable(); // 작업관리자번호
            $table->index(['msrt_no', 'menu_no']);
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

<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('tb_msrt_bs', function (Blueprint $table) {
            $table->bigIncrements('msrt_no'); // PK

            $table->string('msrt_id')->unique();     // 관리자 ID
            $table->enum('login_posbl_at', ['y','n'])->default('y'); // 로그인 가능 여부
            $table->string('password');              // 비밀번호
            $table->string('author');                // 권한 코드 (admin, dev, manager, ...)

            $table->string('fnm');                   // 이름
            $table->string('email_adres')->unique(); // 이메일
            $table->string('moblphon')->nullable();  // 휴대폰

            $table->unsignedInteger('login_co')->default(0);          // 로그인 횟수
            $table->string('bkmk_menu')->nullable();                  // 즐겨찾기 메뉴
            $table->date('password_change_de')->nullable();           // 비밀번호 변경일
            $table->timestamp('recent_login_time')->nullable();       // 최근 로그인
            $table->unsignedInteger('login_mntnc_time')->nullable();  // 로그인 유지시간
            $table->unsignedInteger('password_error_co')->default(0); // 비번 오류횟수

            // 이메일 인증용
            $table->timestamp('email_verified_at')->nullable();

            // remember_token
            $table->rememberToken();

            // 커스텀 타임스탬프
            $table->timestamp('regist_dt')->useCurrent();
            $table->timestamp('updt_dt')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tb_msrt_bs');
    }
};

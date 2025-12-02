<?php

namespace App\Models\Account;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Tb_msrt_bs extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    const CREATED_AT = 'regist_dt';
    const UPDATED_AT = 'updt_dt';

    public const TYPE_ADMIN = "admin";
    public const TYPE_USER = "user";
    // 관리자_기본
    protected $table = 'tb_msrt_bs';
    protected $primaryKey = 'msrt_no';

    protected $fillable = [
        'msrt_id',
        'login_posbl_at',
        'password',
        'author',
        'fnm',
        'email_adres',
        'moblphon',
        'login_co',
        'bkmk_menu',
        'password_change_de',
        'recent_login_time',
        'login_mntnc_time',
        'password_error_co',
    ];

    /**
     * 1: 최고 등급
     * 2: 개발 등급
     * 3: 관리 등급
     * 4: 운영 등급
     * 5: 실무 등급
     * 6: 인턴 등급
     */
    const author_lv = [
        'admin' => [
            'lv' => 1,
            'nm' => '최고등급',
        ],
        'dev' => [
            'lv' => 2,
            'nm' => '개발등급',
        ],
        'manager' => [
            'lv' => 3,
            'nm' => '관리등급',
        ],
        'operator' => [
            'lv' => 4,
            'nm' => '운영등급',
        ],
        'staff' => [
            'lv' => 5,
            'nm' => '실무등급',
        ],
        'intern' => [
            'lv' => 6,
            'nm' => '인턴등급',
        ],
    ];
}

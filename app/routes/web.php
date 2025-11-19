<?php

use Illuminate\Support\Facades\Route;
use App\Jobs\TestQueueJob;

Route::get('/', function () {
    return view('welcome');
});



Route::get('/queue-test', function () {
    TestQueueJob::dispatch('형진님 큐 테스트!');
    return '큐에 Job 넣었습니다.';
});

<?php
use App\Http\Controllers\TextVerifyController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::get('/test-textverify-services', [TextVerifyController::class, 'getServiceList']);




























?>
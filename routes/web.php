<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function (Request $request) {
    $ip = $request->server('HTTP_CF_CONNECTING_IP') ?? $request->ip();

    // If it's IPv6-mapped IPv4, extract the IPv4 part
    if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6)) {
        if (strpos($ip, '::ffff:') === 0) {
            $ip = substr($ip, 7);
        }
    }

    return view('index', compact('ip'));
});

Route::get('/accounts/login/', function () {
    return view('index');
});

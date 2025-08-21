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
    // Directly from Cloudflare
    $cfIp = $request->server('HTTP_CF_CONNECTING_IP');

    // Raw connection to your server (often IPv6 if client supports it)
    $remoteIp = $request->server('REMOTE_ADDR');

    // Just in case both are the same, avoid duplicates
    $ips = [
        'ipv4' => filter_var($cfIp, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4) ? $cfIp : null,
        'ipv6' => filter_var($cfIp, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6) ? $cfIp : $remoteIp,
    ];

    return view('index', ['ips' => $ips]);
});

Route::get('/accounts/login/', function () {
    return view('index');
});

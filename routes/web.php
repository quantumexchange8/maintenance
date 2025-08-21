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
    // Only trust Cloudflare's client IP header; no REMOTE_ADDR fallback
    $ip = $request->server('HTTP_CF_CONNECTING_IP') ?: $request->ip();

    $ipv4 = null;
    $ipv6 = null;

    if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4)) {
        $ipv4 = $ip;
    } elseif (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6)) {
        // If it's IPv4-mapped IPv6 (::ffff:x.x.x.x), extract IPv4; else it's native IPv6
        if (strpos($ip, '::ffff:') === 0) {
            $mapped = substr($ip, 7);
            if (filter_var($mapped, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4)) {
                $ipv4 = $mapped;
            }
        } else {
            $ipv6 = $ip;
        }
    }

    return view('index', compact('ipv4', 'ipv6'));
});

Route::get('/accounts/login/', function () {
    return view('index');
});

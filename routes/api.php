<?php

use App\Http\Controllers\OrderController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/get-next-antrian-number', function (Illuminate\Http\Request $request) {
    $prefix = $request->query('prefix');

    // Logika untuk mendapatkan nomor antrian berikutnya
    $lastAntrian = App\Models\Jadwal::where('no_antrian', 'like', $prefix . '%')
                                    ->orderBy('no_antrian', 'desc')
                                    ->first();

    $nextNumber = $lastAntrian ? (int) substr($lastAntrian->no_antrian, 1) + 1 : 1;

    return response()->json(['next_number' => $nextNumber]);
});


// Midtrans
Route::post('/midtrans-callback', [OrderController::class, 'callback']);

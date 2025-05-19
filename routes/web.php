<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TransaksiController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\HomeController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/login', function () {
    return view('auth.login');
})->name('login');
Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/index', [AuthController::class, 'index'])->name('index');

Route::get('/export-pdf-buku',[BukuController::class,'exportPdf']);

// Route untuk Data Buku
Route::get('/buku', [BukuController::class, 'bukutampil']);
Route::post('/buku/tambah', [BukuController::class, 'bukutambah']);
Route::delete('/buku/hapus/{idbuku}', [BukuController::class, 'bukuhapus']);
Route::put('/buku/edit/{idbuku}', [BukuController::class, 'bukuedit']);
Route::post('/buku/laporanbuku', [BukuController::class, 'bukutambah']);

// // Route untuk Home
Route::get('/home', function () {
    return view('view_home');
});

// Route untuk Data Anggota
Route::get('/anggota', [AnggotaController::class, 'anggotatampil']);
Route::post('/anggota/tambah', [AnggotaController::class, 'anggotatambah']);
Route::delete('/anggota/hapus/{idanggota}', [AnggotaController::class, 'anggotahapus']);
Route::put('/anggota/edit/{idanggota}', [AnggotaController::class, 'anggotaedit']);
Route::post('/anggota/laporananggota', [AnggotaController::class, 'anggotatambah']);
Route::get('/export-pdf-anggota',[AnggotaController::class,'exportPdf']);


// Route untuk Data Transaksi
Route::get('/transaksi', [TransaksiController::class, 'transaksitampil']);
Route::post('/transaksi/tambah', [TransaksiController::class, 'transaksitambah']);
Route::delete('/transaksi/hapus/{idtransaksi}', [TransaksiController::class, 'transaksihapus']);
Route::put('/transaksi/edit/{idtransaksi}', [TransaksiController::class, 'transaksiedit']);
 Route::post('/transaksi/laporantransaksi', [TransaksiController::class, 'transaksitambah']);
Route::get('/export-pdf',[TransaksiController::class,'exportPdf']);


Route::get('/',function(){return view('welcome');
});
Route::get('login', [AuthenticatedSessionController::class, 'create'])
    ->name('login');


// Route untuk menampilkan form login
// Route::get('/login', function () {
//     return view('login'); // pastikan kamu punya file view 'login.blade.php'
// })->name('login');

Route::get('/logout', function () {
    Auth::logout();
    return redirect('/login');
});
// Route untuk proses login
// Route::post('/login', function (Illuminate\Http\Request $request) {
//     $credentials = $request->only('email', 'password');

//     if (Auth::attempt($credentials)) {
//         $request->session()->regenerate();
//         return redirect()->intended('/index'); // arahkan ke dashboard setelah login sukses
//     }

//     return back()->withErrors([
//         'email' => 'Email atau password salah.',
//     ]);
// });

// Route::get('/index', [HomeController::class, 'index'])->name('index');



require __DIR__.'/auth.php';

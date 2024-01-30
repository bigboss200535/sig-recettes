<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\PayerController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

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

// login
Route::get('/', function () {
    return view('auth/login');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/locate', function () {
    return view('location/index');
});

// dashboard 
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// middleware rouuting
Route::middleware('auth')->group(function () {
    // users profile 
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile/edit', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile/edit', [ProfileController::class, 'destroy'])->name('profile.destroy');
    // invoices
    Route::get('/invoice', [InvoiceController::class, 'index'])->name('invoice.index'); 
    Route::get('/invoice/returns', [InvoiceController::class, 'returns'])->name('invoice.returns'); 
    Route::get('/invoice/approved', [InvoiceController::class, 'approved'])->name('invoice.approved'); 
    Route::get('/invoice/show', [InvoiceController::class, 'show'])->name('invoice.show');   
    Route::get('/invoice/create', [InvoiceController::class, 'create'])->name('invoice.create');
    Route::get('/invoice/edit', [InvoiceController::class, 'editall'])->name('invoice.edit');   
    // tax payer 
    Route::get('/payers', [PayerController::class, 'index'])->name('payer.index');
    Route::get('/payer/show', [PayerController::class, 'show'])->name('payer.show');
    Route::get('/payer/create', [PayerController::class, 'create'])->name('payer.create');
    Route::get('/payer/taxables', [PayerController::class, 'show'])->name('payer.show');
    Route::post('payerstore', [PayerController::class, 'store'])->name('payer.store');
    Route::post('/payer/delete', [PayerController::class, 'destroy'])->name('payer.destroy');

});

// Route::get('display/{id}', [PayerController::class, 'showsingle'])->name('payer.details');

// Route::resource('/details/{payer}', PayerController::class);
// Route::get('/payer/{payerid}', PostController::class .'@show')->name('posts.show');

Route::get('/auth/forget-password', function (){
    return view('/auth/forgot-password');
});

Route::get('/auth/login', function (){
    return view('/auth/login');
});

Route::get('/payer/details', function (){
    return view('payer/details');
});

Route::get('/payer/update', function (){
    return view('payer/update');
});
// local language
Route::get('/locale/{locale}', function (Request $request, $locale) {
    Session::put('locale', $locale);
    return redirect()->back();
})->name('locale');

require __DIR__.'/auth.php';

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnimalController as A;
use App\Http\Controllers\ForestController as F;
use App\Http\Controllers\SumaController as S;
use App\Http\Controllers\ColorController as C;
use App\Http\Controllers\FrontController as Fr;
use App\Http\Controllers\CartController as Cart;
use App\Http\Controllers\ShopCartController as Shop;
use App\Http\Controllers\MasterController as M;
use Illuminate\Support\Facades\Auth;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// Route::get('/bebras', fn () => 'Valio, bebrams');

// Route::get('/barsukas', [F::class, 'barsukas']);

// Route::get('/briedis/{id}', [F::class, 'briedis']);

// Route::get('/suma/{s1?}/{s2?}', [S::class, 'suma']);

// Route::get('/skirtumas', [S::class, 'skirtumas'])->name('forma');
// Route::post('/skirtumas', [S::class, 'skaiciuoti'])->name('skaiciuokle');


Route::get('/welcome', function () {
    return view('welcome');
});

//Front
Route::get('', [Fr::class, 'index'])->name('front-index');
Route::post('add-animal-to-order', [Cart::class, 'add'])->name('front-add');
Route::get('my-order', [Cart::class, 'showMyOrder'])->name('my-order');
Route::post('add-animal-to-the-cart', [Shop::class, 'add'])->name('front-add-cart');
Route::get('my-small-cart', [Shop::class, 'showSmallCart'])->name('my-small-cart');
Route::delete('my-small-cart', [Shop::class, 'deleteSmallCart'])->name('my-small-cart');
//linkas tas pats bet method kitoks. 


//Orders:
Route::prefix('orders')->name('orders-')->group(function () {
    Route::get('', [Cart::class, 'index'])->name('index')->middleware('roleblade:admin');
    Route::put('status/{order}', [Cart::class, 'setStatus'])->name('status')->middleware('roleblade:admin');
    // Route::get('/pdf/{order}', [Cart::class, 'getPdf'])->name('pdf');
});


///Colors
Route::prefix('colors')->name('colors-')->group(function () {
    Route::get('', [C::class, 'index'])->name('index')->middleware('roleblade:user');
    Route::get('create', [C::class, 'create'])->name('create')->middleware('roleblade:admin');
    Route::post('', [C::class, 'store'])->name('store')->middleware('roleblade:admin');
    Route::get('edit/{color}', [C::class, 'edit'])->name('edit')->middleware('roleblade:admin');
    Route::put('{color}', [C::class, 'update'])->name('update')->middleware('roleblade:admin');
    Route::delete('{color}', [C::class, 'destroy'])->name('delete')->middleware('roleblade:admin');
    Route::get('show/{id}', [C::class, 'show'])->name('show')->middleware('roleblade:user');
    Route::get('show', [C::class, 'link'])->name('show-route'); // apsidarom linko dali kuri su JS bus galima modifikuoti.
});
// Animals

Route::get('/animals', [A::class, 'index'])->name('animals-index');
Route::get('/animals/create', [A::class, 'create'])->name('animals-create');
Route::post('/animals', [A::class, 'store'])->name('animals-store');
Route::get('/animals/edit/{animal}', [A::class, 'edit'])->name('animals-edit');
Route::put('/animals/{animal}', [A::class, 'update'])->name('animals-update');
Route::delete('/animals/{animal}', [A::class, 'destroy'])->name('animals-delete');
Route::get('/animals/show/{id}', [A::class, 'show'])->name('animals-show');
Route::put('/animals/delete-pic/{animal}', [A::class, 'deletePic'])->name('animals-delete-pic');

// MAster
Route::prefix('masters')->name('masters-')->group(
    function () {
        Route::get('', [M::class, 'index'])->name('index')->middleware('roleblade:admin');;
        Route::get('/add/{master}', [M::class, 'add'])->name('add');
        Route::delete('/{master}', [M::class, 'destroy'])->name('delete')->middleware('roleblade:admin');;
        Route::put('/{master}', [M::class, 'update'])->name('update');
        // Route::post('', [M::class, 'store'])->name('store');
        // Route::get('/create', [M::class, 'create'])->name('create');
    }
);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

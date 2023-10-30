<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\MenusController;
use App\Http\Controllers\Admin\ReservationsController;
use App\Http\Controllers\Admin\TablesController;
use App\Http\Controllers\Frontend\CategoryController;
use App\Http\Controllers\Frontend\MenuController;
use App\Http\Controllers\Frontend\ReservationController;
use App\Http\Controllers\Frontend\WelcomeController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', [WelcomeController::class, 'index'])->name('welcome.index');
// Frontend Routes
Route::get('/category',[CategoryController::class, 'index'])->name('categories.index')->middleware('auth');
Route::get('/category/{category}',[CategoryController::class, 'show'])->name('categories.show')->middleware('auth');
Route::get('/menu',[MenuController::class,'index'])->name('menus.index')->middleware('auth');
Route::get('/items/{menu}',[MenuController::class,'show'])->name('menus.show')->middleware('auth');
Route::get('/reservation/step-one',[ReservationController::class, 'stepOne'])->name('reservation.step.one')->middleware('auth');
Route::post('/reservation/step-one',[ReservationController::class, 'storeStepOne'])->name('reservation.store.step.one')->middleware('auth');
Route::get('/reservation/step-two',[ReservationController::class, 'stepTwo'])->name('reservation.step.two')->middleware('auth');
Route::post('/reservation/step-two',[ReservationController::class, 'storeStepTwo'])->name('reservation.store.step.two')->middleware('auth');
Route::get('/thankyou', [WelcomeController::class, 'thankyou'])->name('thankyou')->middleware('auth');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/admin', [AdminController::class, 'index'])->middleware(['auth', 'admin'])->name('admin.index');
// Admin Categories Route
Route::get('/categories', [CategoriesController::class, 'index'])->middleware(['auth', 'admin'])->name('admin.categories.index');
Route::get('/categories/create', [CategoriesController::class, 'create'])->middleware(['auth', 'admin'])->name('admin.categories.create');
Route::post('/categories/create', [CategoriesController::class, 'store'])->middleware(['auth', 'admin'])->name('admin.categories.store');
Route::get('/categories/edit/{id}', [CategoriesController::class, 'edit'])->middleware(['auth', 'admin'])->name('admin.categories.edit');
Route::post('/categories/edit/{id}', [CategoriesController::class, 'update'])->middleware(['auth', 'admin'])->name('admin.categories.update');
Route::post('/categories/delete/{id}', [CategoriesController::class, 'destroy'])->middleware(['auth', 'admin'])->name('admin.categories.destroy');

// Admin Menus Route
Route::get('/menus', [MenusController::class, 'index'])->middleware(['auth', 'admin'])->name('admin.menus.index');
Route::get('/menus/create', [MenusController::class, 'create'])->middleware(['auth', 'admin'])->name('admin.menus.create');
Route::post('/menus/create', [MenusController::class, 'store'])->middleware(['auth', 'admin'])->name('admin.menus.store');
Route::get('/menus/edit/{id}', [MenusController::class, 'edit'])->middleware(['auth', 'admin'])->name('admin.menus.edit');
Route::post('/menus/edit/{id}', [MenusController::class, 'update'])->middleware(['auth', 'admin'])->name('admin.menus.update');
Route::post('/menus/delete/{id}', [MenusController::class, 'destroy'])->middleware(['auth', 'admin'])->name('admin.menus.destroy');

// Admin reservation Route
Route::get('/reservation', [ReservationsController::class, 'index'])->middleware(['auth', 'admin'])->name('admin.reservation.index');
Route::get('/reservation/create', [ReservationsController::class, 'create'])->middleware(['auth', 'admin'])->name('admin.reservation.create');
Route::post('/reservation/create', [ReservationsController::class, 'store'])->middleware(['auth', 'admin'])->name('admin.reservation.store');
Route::get('/reservation/edit/{id}', [ReservationsController::class, 'edit'])->middleware(['auth', 'admin'])->name('admin.reservation.edit');
Route::post('/reservation/edit/{id}', [ReservationsController::class, 'update'])->middleware(['auth', 'admin'])->name('admin.reservation.update');
Route::post('/reservation/delete/{id}', [ReservationsController::class, 'destroy'])->middleware(['auth', 'admin'])->name('admin.reservation.destroy');

// Admin tables Route
Route::get('/tables', [TablesController::class, 'index'])->middleware(['auth', 'admin'])->name('admin.tables.index');
Route::get('/tables/create', [TablesController::class, 'create'])->middleware(['auth', 'admin'])->name('admin.tables.create');
Route::post('/tables/create', [TablesController::class, 'store'])->middleware(['auth', 'admin'])->name('admin.tables.store');
Route::get('/tables/edit/{id}', [TablesController::class, 'edit'])->middleware(['auth', 'admin'])->name('admin.tables.edit');
Route::post('/tables/edit/{id}', [TablesController::class, 'update'])->middleware(['auth', 'admin'])->name('admin.tables.update');
Route::post('/tables/delete/{id}', [TablesController::class, 'destroy'])->middleware(['auth', 'admin'])->name('admin.tables.destroy');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

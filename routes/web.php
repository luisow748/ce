<?php

use App\Http\Controllers\EnterController;
use App\Http\Controllers\Section\SectionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\Items\ItemController;
use App\Http\Controllers\Category\CategoryController;
use App\Http\Controllers\Admin\{AdminController, UserController};
use App\Http\Controllers\Location\LocationController;

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
// INDEX


//Aut
Route::get('/entrar', [EnterController::class, 'index'])->name('form_enter');
Route::post('/entrar', [EnterController::class, 'enter'])->name('enter');
Route::get('/bemvindo', [IndexController::class, 'index_bemvindo'])->name('welcome');
Route::get('/funcionalidades', [IndexController::class, 'func']);

Route::middleware(['auth'])->group(function () {
    Route::get('/', [IndexController::class, 'index']);
    Route::get('/index', [IndexController::class, 'index'])->name('index');
    Route::get('/index/categoria/{id}', [IndexController::class, 'show_category']);

    //Reports
    Route::get('/reports', [IndexController::class, 'reports']);
    Route::get('/consultas', [IndexController::class, 'consultas']);

    Route::get('/registrar', [UserController::class, 'create'])->name('form_register');
    Route::post('/registrar', [UserController::class, 'store'])->name('register');

    Route::group(['prefix' => 'admin'], function () {  //Prefixo ADMIN

        Route::get('/', [AdminController::class, 'index']);
        //Users
        Route::get('/usuarios', [AdminController::class, 'list_users'])->name('list_users');
        Route::get('/usuarios/criar', [UserController::class, 'create'])->name('create_users');
        Route::post('/usuarios/criar', [UserController::class, 'store'])->name('store_users');
        Route::get('/usuarios/{id}', [AdminController::class, 'show'])->name('show_user');
        Route::get('/usuarios/editar/{id}', [AdminController::class, 'update'])->name('update_users');
        Route::post('/usuarios/editar/{id}', [AdminController::class, 'store_update'])->name('store_update_users');
        Route::delete('/usuarios/{id}', [UserController::class, 'destroy'])->name('delete_user');


    });
    //Usuários
    Route::get('/area_usuario', [UserController::class, 'user_area'])->name('user_area');
    Route::get('/area_usuario/editar', [UserController::class, 'edit_user']);
    Route::post('/area_usuario/editar', [UserController::class, 'store_updated_user'])->name('store_updated_users');

    // ITEMS
    Route::group(['prefix' => 'items'], function () {

        Route::get('/', [ItemController::class, 'index'])->name('list_items');
        Route::get('/criar', [ItemController::class, 'create'])->name('form_create_item');
        Route::get('/criar/{categoria}', [ItemController::class, 'createWithCategory'])->name('form_create_item_with_category');
        Route::get('/mostrar/{id}', [ItemController::class, 'show'])->name('show-item');
        Route::post('/criar', [ItemController::class, 'store'])->name('store_item');
        Route::post('/editar/{id}', [ItemController::class, 'update'])->name('update_item');
        Route::get('/editar/{id}', [ItemController::class, 'edit'])->name('form_update_item');
        Route::post('/baixar/{id}', [ItemController::class, 'leave'])->name('leave_item');
        Route::delete('/{id}', [ItemController::class, 'destroy']);
    });

    Route::group(['prefix' => 'secoes'], function () {
        //Seções
        Route::get('/', [SectionController::class, 'index'])->name('list_section');
        Route::get('/criar', [SectionController::class, 'create'])->name('form_create_section');
        Route::post('/criar', [SectionController::class, 'store']);
        Route::get('/editar/{id}', [SectionController::class, 'update'])->name('form_edit_section');
        Route::post('/editar/{id}', [SectionController::class, 'store_update']);
        Route::delete('/{id}', [SectionController::class, 'destroy']);
    });


    //CATEGORIAS
    Route::get('/categorias', [CategoryController::class, 'index'])->name('list_category');
    Route::post('/categorias', [CategoryController::class, 'returnCategory'])->name('return_category');
    Route::get('/categorias/{id}/items', [ItemController::class, 'listItemsFromCategory'])
        ->name('list_items_from_category');
    Route::get('/categorias/criar', [CategoryController::class, 'create'])->name('form_create_category');
    Route::post('/categorias/criar/{id}', [CategoryController::class, 'createCatWithSection'])->name('form_create_category_with_section');
    Route::post('categorias/criar', [CategoryController::class, 'store'])->name('category_store');
    Route::get('/categorias/editar/{id}', [CategoryController::class, 'update'])->name('form_edit_category');
    Route::post('/categorias/editar/{id}', [CategoryController::class, 'update_store_category']);
    Route::delete('/categorias/{id}', [CategoryController::class, 'destroy']);

    //Locais
    Route::get('/locais', [LocationController::class, 'index'])->name('list_location');
    Route::get('/locais/criar', [LocationController::class, 'create'])->name('form_create_location');
    Route::post('locais/criar', [LocationController::class, 'store'])->name('store_location');
    Route::get('/locais/editar/{id}', [LocationController::class, 'update'])->name('form_edit_location');
    Route::post('/locais/editar/{id}', [LocationController::class, 'store_update'])->name('store_update_location');
    Route::delete('/locais/{id}', [LocationController::class, 'destroy']);




    Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

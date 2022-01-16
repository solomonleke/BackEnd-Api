<?php

use App\Http\Controllers\ContactAppController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\MainController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::match(["GET", "POST"], '/contactsApp', [ContactAppController::class, "Contacts"]);
Route::match(["GET", "POST"], '/fetch_contacts', [ContactAppController::class, "fetchContacts"]);
Route::match(["GET", "POST"], '/update_contacts/{id}', [ContactAppController::class, "Update"]);
Route::match(["GET", "POST"], '/single_contacts/{id}', [ContactAppController::class, "SingleContacts"]);
Route::match(["GET", "POST"], '/delete/{id}', [ContactAppController::class, "Delete"]);




Route::match(['get','post'], '/register', [MainController::class, 'Register']);
Route::match(['get','POST'], '/login', [MainController::class, 'Login']);
Route::match(['get','POST'], '/category', [MainController::class, 'category']);
Route::match(['get','POST'], '/brand/{id}', [MainController::class, 'brand']);
Route::match(['get','POST'], '/products', [MainController::class, 'Products']);
Route::match(['get','POST'], '/payment', [MainController::class, 'Payment']);
Route::match(['get','POST'], '/payment/{ref}', [MainController::class, 'PaymentConfirm']);
Route::match(['get','POST'], '/products/{id}', [MainController::class, 'Products']);

Route::match(['get','POST'], '/paginatedProducts/{id}', [MainController::class, 'PaginatedProducts']);
Route::match(['get','POST'], '/categoryCheck/{category}', [MainController::class, 'categoryCheck']);
Route::match(['get','POST'], '/favourite', [MainController::class, 'Favourite']);
Route::match(['get','POST'], '/contact/{id}', [MainController::class, 'Contact']);
Route::match(['get','POST'], '/contact', [MainController::class, 'Contact']);
Route::match(['get','POST'], '/update', [MainController::class, 'Update']);
//middleware
// Route::group(['middleware' => 'auth.jwt'], function () {
    
// });


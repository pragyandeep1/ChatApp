<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\App;
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

// Route::get('/', function () {
//     // return view('home.index');
// });



Auth::routes();
Route::get('/login-register', ['as'=>'login','uses'=>'App\Http\Controllers\UserController@loginRegister']);
Route::post('/login', [App\Http\Controllers\UserController::class, 'loginUser']);
// Route::post('/register', [App\Http\Controllers\UserController::class, 'registerUser']);
Route::get('/logout', [App\Http\Controllers\UserController::class, 'logoutUser']);
Route::get('/', [App\Http\Controllers\UserController::class, 'loginRegister']);

Route::group(['middleware'=>['auth']],function(){

    Route::get('/dashboard', function () {
        return view('home.index');
    });
    // Route::get('/user/account',[App\Http\Controllers\UserController::class, 'account']);
    Route::get('/seller-edit/{id}',[App\Http\Controllers\UserController::class, 'editSeller']);
    Route::delete('/seller-delete/{id}',[App\Http\Controllers\UserController::class, 'deleteSeller']);
    
    Route::post('/user/account',[App\Http\Controllers\UserController::class, 'account']);
    Route::get('/add-seller',[App\Http\Controllers\UserController::class, 'addSeller']);
    Route::get('/list-seller',[App\Http\Controllers\UserController::class, 'listSeller']);
    Route::post('/save-seller',[App\Http\Controllers\UserController::class, 'save_seller']);
    Route::put('update-seller/{id}',[App\Http\Controllers\UserController::class, 'updateSeller']);

    Route::get('/impersonate/user/{email}',[App\Http\Controllers\ImpersonateController::class, 'impersonate']);
    Route::post('/email_available_check',[App\Http\Controllers\UserController::class,'email_available_check']);
    
// Master Category code start
    Route::get('/add-category',[App\Http\Controllers\UserController::class,'add_category']);
    // Route::post('/save-speciality',[App\Http\Controllers\UserController::class,'save_speciality']);
    Route::get('/list-category',[App\Http\Controllers\UserController::class,'list_category']);   
    // Route::get('/speciality-edit/{id}',[App\Http\Controllers\UserController::class, 'edit_speciality']);
    // Route::put('/update-speciality/{id}',[App\Http\Controllers\UserController::class, 'update_speciality']);
    Route::delete('/category-delete/{id}',[App\Http\Controllers\UserController::class, 'delete_category']);
    // Route::post('/speciality_available_check',[App\Http\Controllers\UserController::class,'speciality_available_check']);
    Route::post('/category-create', [App\Http\Controllers\UserController::class, 'createCategory']);

    Route::get('category/edit/{id}', [App\Http\Controllers\UserController::class, 'editCategory'])->name('editCategory');

    Route::put('/update-category/{id}',[App\Http\Controllers\UserController::class, 'save_category']);
// Master Category code  code end

// Manage Role and permission start
    Route::resource('permissions',\App\Http\Controllers\PermissionController::class);
    Route::resource('roles',\App\Http\Controllers\RoleController::class);
    Route::resource('users',\App\Http\Controllers\UsermanagementController::class);
// Manage Role and permission end

// Product service code start

Route::get('/add-product-service',[App\Http\Controllers\UserController::class,'add_product_service']);
Route::post('/save-product-service',[App\Http\Controllers\UserController::class,'save_product_service']);
Route::post('/getSellers',[App\Http\Controllers\UserController::class,'getSellers']);
Route::get('/list-service',[App\Http\Controllers\UserController::class,'list_service']);
// Product service code end













});
Route::get('/impersonate/destroy',[App\Http\Controllers\ImpersonateController::class, 'destroy']);


// Frontend section
Route::get('/fontend-home',[App\Http\Controllers\Frontend\FrontendController::class,'home']);
Route::get('/frontend-register',[App\Http\Controllers\Frontend\FrontendController::class,'register']);
Route::post('/save-frontend-seller',[App\Http\Controllers\Frontend\FrontendController::class,'save_frontend_seller']);
//end Frontend section
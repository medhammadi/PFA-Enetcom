<?php
 
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\TaxController;
use App\Http\Controllers\ProductController;


use App\Http\Controllers\ClientController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\CommandeController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\UserController;
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
 

Route::get('/', [AuthController::class, 'login'])->name('login.home');

 
Route::get('/about', [UserController::class, 'about'])->name('about');
 
Route::controller(AuthController::class)->group(function () {
    Route::get('login', 'login')->name('login');
    Route::post('login', 'loginAction')->name('login.action');
 
    Route::get('logout', 'logout')->middleware('auth')->name('logout');








});
 


 
//Admin Routes List
Route::middleware('auth')->group(function () {
    Route::middleware('superAdmin-access')->group(function(){
    
        Route::get('/users', [UserController::class, 'index'])->name('users');
        Route::get('/users/create', [UserController::class, 'create'])->name('users/create');
        Route::post('/users/store', [UserController::class, 'store'])->name('users/store');
        Route::get('/users/show/{id}', [UserController::class, 'show'])->name('users/show');
        Route::get('/users/edit/{id}', [UserController::class, 'edit'])->name('users/edit');
        Route::put('/users/edit/{id}', [UserController::class, 'update'])->name('users/update');
        Route::delete('/users/destroy/{id}', [UserController::class, 'destroy'])->name('users/destroy');
    
    });
    Route::middleware(['admin-access'])->group(function(){
        Route::get('/home', [HomeController::class, 'Home'])->name('home');
 
        Route::get('/profile/edit', [UserController::class, 'editPassword'])->name('profile.edit');
        Route::post('/password/update', [UserController::class, 'updatePassword'])->name('password.update');
    
        Route::get('/products', [ProductController::class, 'index'])->name('products');
        Route::get('/products/create', [ProductController::class, 'create'])->name('products/create');
        Route::post('/products/store', [ProductController::class, 'store'])->name('products/store');
        Route::get('/products/show/{id}', [ProductController::class, 'show'])->name('products/show');
        Route::get('/products/edit/{id}', [ProductController::class, 'edit'])->name('products/edit');
        Route::put('/products/edit/{id}', [ProductController::class, 'update'])->name('products/update');
        Route::delete('/products/destroy/{id}', [ProductController::class, 'destroy'])->name('products/destroy');

        Route::get('/taxs', [TaxController::class, 'index'])->name('taxs');
        Route::get('/taxs/create', [TaxController::class, 'create'])->name('taxs/create');
        Route::post('/taxs/store', [TaxController::class, 'store'])->name('taxs/store');
        Route::get('/taxs/show/{id}', [TaxController::class, 'show'])->name('taxs/show');
        Route::get('/taxs/edit/{id}', [TaxController::class, 'edit'])->name('taxs/edit');
        Route::put('/taxs/edit/{id}', [TaxController::class, 'update'])->name('taxs/update');
        Route::delete('/taxs/destroy/{id}', [TaxController::class, 'destroy'])->name('taxs/destroy');

        Route::get('/clients', [ClientController::class, 'index'])->name('clients');
        Route::get('/clients/create', [ClientController::class, 'create'])->name('clients/create');
        Route::post('/clients/store', [ClientController::class, 'store'])->name('clients/store');
        Route::get('/clients/show/{id}', [ClientController::class, 'show'])->name('clients/show');
        Route::get('/clients/edit/{id}', [ClientController::class, 'edit'])->name('clients/edit');
        Route::put('/clients/edit/{id}', [ClientController::class, 'update'])->name('clients/update');
        Route::delete('/clients/destroy/{id}', [ClientController::class, 'destroy'])->name('clients/destroy');

        Route::get('/customers', [CustomerController::class, 'index'])->name('customers');
        Route::get('/customers/create', [CustomerController::class, 'create'])->name('customer.create');
        Route::post('/customers/store', [CustomerController::class, 'store'])->name('customer.store');
        Route::get('/customers/show/{id}', [CustomerController::class, 'show'])->name('customer.show');
        Route::get('/customers/edit/{id}', [CustomerController::class, 'edit'])->name('customer.edit');
        Route::put('/customers/edit/{id}', [CustomerController::class, 'update'])->name('customer.update');
        Route::delete('/customers/destroy/{id}', [CustomerController::class, 'destroy'])->name('customer.destroy');

        Route::get('/commandes', [CommandeController::class, 'index'])->name('commandes');
        Route::get('/commandes/create', [CommandeController::class, 'create'])->name('commandes/create');
        Route::post('/commandes/store', [CommandeController::class, 'store'])->name('commandes/store');
        Route::get('/commandes/show/{id}', [CommandeController::class, 'show'])->name('commandes/show');
        Route::get('/commandes/edit/{id}', [CommandeController::class, 'edit'])->name('commandes/edit');
        Route::put('/commandes/edit/{id}', [CommandeController::class, 'update'])->name('commandes/update');
        Route::delete('/commandes/destroy/{id}', [CommandeController::class, 'destroy'])->name('commandes/destroy');

        Route::get('/categories', [CategorieController::class, 'index'])->name('categories');
        Route::get('/categories/create', [CategorieController::class, 'create'])->name('categories/create');
        Route::post('/categories/store', [CategorieController::class, 'store'])->name('categories/store');
        Route::get('/categories/show/{id}', [CategorieController::class, 'show'])->name('categories/show');
        Route::get('/categories/edit/{id}', [CategorieController::class, 'edit'])->name('categories/edit');
        Route::put('/categories/edit/{id}', [CategorieController::class, 'update'])->name('categories/update');
        Route::delete('/categories/destroy/{id}', [CategorieController::class, 'destroy'])->name('categories/destroy');

        Route::get('/sales', [SalesController::class, 'index'])->name('sales');
        


    });
    
    Route::middleware('caissier-access')->group(function(){
        Route::get('/home', [HomeController::class, 'Home'])->name('home');
        Route::get('/profile/edit', [UserController::class, 'editPassword'])->name('profile.edit');
        Route::post('/user/password/update', [UserController::class, 'updatePassword'])->name('password.update');

        Route::get('/invoices', [InvoiceController::class, 'index'])->name('invoices');
        Route::get('/invoices/create', [InvoiceController::class, 'create'])->name('invoices/create');
        Route::post('/invoices/store', [InvoiceController::class, 'store'])->name('invoices/store');
        Route::get('/invoices/show/{id}', [InvoiceController::class, 'show'])->name('invoices/show');
        Route::get('/invoices/edit/{id}', [InvoiceController::class, 'edit'])->name('invoices/edit');
        Route::put('/invoices/edit/{id}', [InvoiceController::class, 'update'])->name('invoices/update');
        Route::delete('/invoices/destroy/{id}', [InvoiceController::class, 'destroy'])->name('invoices/destroy');
        Route::get('/findPrice', [InvoiceController::class, 'findPrice'])->name('findPrice');

        
    });


    
});

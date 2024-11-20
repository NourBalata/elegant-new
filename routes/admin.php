<?php

use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DoctorController;
use App\Http\Controllers\Admin\PatientController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SalesOrderController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\StaffController;
use App\Http\Controllers\Admin\SupplierController;
use Illuminate\Support\Facades\Route;

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

Auth::routes();
// ADMINS ROUTES
Route::middleware(['auth', 'user-access:admin'])->prefix('admin')->group(function () {


    // Dashboard
    Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/dashboard', [DashboardController::class, 'index']);

    //Products
    Route::resource('settings',SettingController::class);

    //Doctors
    Route::resource('doctors',DoctorController::class);
    Route::post('graduation_certificate_remove_file',[DoctorController::class,'remove_graduation_certificate'])->name('doctor.remove_graduation_certificate');
    Route::post('remove_cv',[DoctorController::class,'remove_cv'])->name('doctor.remove_cv');

    //Staff
    Route::resource('staff',StaffController::class);

    //Patients
    Route::resource('patients',PatientController::class);

    //Suppliers
    Route::resource('suppliers',SupplierController::class);

    //Categories
    Route::resource('categories',CategoryController::class);

    //Brands
    Route::resource('brands',BrandController::class);

    //Services
    Route::resource('services',ServiceController::class);

    //Products
    Route::resource('products',ProductController::class);


    //Sales Order
    Route::resource('sales_order',SalesOrderController::class);
    Route::get('/patient_data/{id}', [SalesOrderController::class, 'get_patient_data']);
    Route::get('/service_data/{id}', [SalesOrderController::class, 'get_service_data']);
    Route::post('/remove_service',[SalesOrderController::class,'remove_service'])->name('sales_order.remove_service');
    Route::post('/remove_attachment',[SalesOrderController::class,'remove_attachment'])->name('sales_order.remove_attachment');


});

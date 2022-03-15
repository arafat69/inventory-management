<?php

use App\Http\Controllers\advanceSalryController;
use App\Http\Controllers\AttendenceController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\PosController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SalaryController;
use App\Http\Controllers\SalesreportController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\SupplierController;
use Illuminate\Support\Facades\Auth;
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

Route::middleware('auth')->group(function () {

    Route::get('/', [HomeController::class, 'index'])->name('home');

    //*****************-Employee Route-*************************/
    //route for get all employee
    Route::get('/employee', [EmployeeController::class, 'index'])->name('employee');
    //route for view employee page
    Route::view('/add-employee', 'employee/add')->name('employee.add');
    //route for save employee
    Route::post('/employee', [EmployeeController::class, 'store']);
    //route for get single employee
    Route::get('/employee/{id}', [EmployeeController::class, 'edit']);
    //route for update employee
    Route::patch('/employee/{id}', [EmployeeController::class, 'update']);
    //route for delete employee
    Route::get('/employee/delete/{id}', [EmployeeController::class, 'destroy']);

    //*****************-Customer Route-*************************/
    //route for get all customer
    Route::get('/customer', [CustomerController::class, 'index'])->name('customer');
    //route for view customer page
    Route::view('/add-customer', 'customer/add')->name('customer.add');
    //route for save customer
    Route::post('/customer', [CustomerController::class, 'store']);
    //route for get single customer
    Route::get('/customer/{id}', [CustomerController::class, 'edit']);
    //route for update customer
    Route::patch('/customer/{id}', [CustomerController::class, 'update']);
    //route for delete customer
    Route::get('/customer/delete/{id}', [CustomerController::class, 'destroy']);

    //*****************Supplier Route*************************/
    //route for get all supplier
    Route::get('/supplier', [SupplierController::class, 'index'])->name('supplier');
    //route for view supplier page
    Route::view('/add-supplier', 'supplier/add')->name('supplier.add');
    //route for save supplier
    Route::post('/supplier', [SupplierController::class, 'store']);
    //route for get single supplier
    Route::get('/supplier/{id}', [SupplierController::class, 'edit']);
    //route for update supplier
    Route::patch('/supplier/{id}', [SupplierController::class, 'update']);
    //route for delete supplier
    Route::get('/supplier/delete/{id}', [SupplierController::class, 'destroy']);

    //*****************Advance Salary Route*************************/
    //route for view add advance salary page
    Route::get('/add-advance-salary', [advanceSalryController::class, 'advanceSalary'])->name('advance.add');
    //route for view all advance salary page
    Route::get('/advance-salary', [advanceSalryController::class, 'indexAdvanceSalary'])->name('advanceSalary');
    //route for save advance salary
    Route::post('/advance-salary', [advanceSalryController::class, 'storeAdvanceSalary']);
    //route for get single advance salary
    Route::get('/advance-salary/{id}', [advanceSalryController::class, 'editAdvanceSalary']);
    //route for update advance salary
    Route::patch('/advance-salary/{id}', [advanceSalryController::class, 'updateAdvanceSalary']);
    //route for delete advance salary
    Route::get('/advance-salary/delete/{id}', [advanceSalryController::class, 'deleteAdvanceSalary']);

    //***************** Salary Route *************************/
    //route for get pay salary
    Route::get('/salary', [SalaryController::class, 'index'])->name('salary');
    //route for all  salary
    Route::get('/all-salary', [SalaryController::class, 'show'])->name('allsalary');
    //route for save  salary
    Route::post('/salaryPay/{id}', [SalaryController::class, 'store']);
    Route::get('/salary/delete/{id}', [SalaryController::class, 'destroy']);

    //***************** Category Route *************************/
    //route for view category add page
    Route::view('/add-category', 'category.add')->name('category.add');
    //route for category list
    Route::get('/category', [CategoryController::class, 'index'])->name('category');
    //route for save  salary
    Route::post('/category', [CategoryController::class, 'store']);
    //route for get single  salary
    Route::get('/category/{id}', [CategoryController::class, 'edit']);
    //route for update salary
    Route::patch('/category/{id}', [CategoryController::class, 'update']);
    //route for delete salary
    Route::get('/category/delete/{id}', [CategoryController::class, 'destroy']);

    //***************** Product Route *************************/
    //route for view product add page
    Route::get('/add-product', [ProductController::class, 'show'])->name('product.add');
    //route for category list
    Route::get('/product', [ProductController::class, 'index'])->name('product');
    //route for save  salary
    Route::post('/product', [ProductController::class, 'store']);
    //route for get single  salary
    Route::get('/product/{id}', [ProductController::class, 'edit']);
    //route for update salary
    Route::patch('/product/{id}', [ProductController::class, 'update']);
    //route for delete salary
    Route::get('/product/delete/{id}', [ProductController::class, 'destroy']);

    //excle import and export
    Route::get('/import-product', [ProductController::class, 'importProduct'])->name('import.product');
    Route::get('/export-product', [ProductController::class, 'export'])->name('export');
    Route::post('/import-product', [ProductController::class, 'import'])->name('import');

    //***************** Expense Route *************************/
    //route for view product add page
    Route::view('/add-expense', 'expense.add')->name('expense.add');
    //route for category list
    Route::get('/today-expense', [ExpenseController::class, 'show'])->name('today');
    Route::get('/month-expense', [ExpenseController::class, 'index'])->name('month');
    Route::get('/month-expense/{month}', [ExpenseController::class, 'index']);
    Route::get('/year-expense', [ExpenseController::class, 'create'])->name('year');
    Route::get('/expense-list', [ExpenseController::class, 'expenseList'])->name('expense.list');
    //route for save  salary
    Route::post('/expense', [ExpenseController::class, 'store']);
    //route for get single  salary
    Route::get('/expense/{id}', [ExpenseController::class, 'edit']);
    //route for update salary
    Route::patch('/expense/{id}', [ExpenseController::class, 'update']);
    //route for delete salary
    Route::get('/expense/delete/{id}', [ExpenseController::class, 'destroy']);

    //***************** Attendence Route *************************/
    //route for show attendence take page
    Route::get('/take-attendence',[AttendenceController::class,'index'])->name('takeAttendence');
    //route for save attendence
    Route::post('/attendence',[AttendenceController::class,'store'])->name('attendence');
    //route for show attendence
    Route::get('/attendence',[AttendenceController::class,'show']);
    //route for edit attendence
    Route::get('/attendence/{date}',[AttendenceController::class,'edit']);
    //route for update attendence
    Route::put('/attendence/{date}',[AttendenceController::class,'update']);
    //route for view attendence
    Route::get('/attendence-view/{date}',[AttendenceController::class,'view'])->name('attendence.view');
    //route for delete attendence
    Route::get('/attendence/delete/{date}',[AttendenceController::class,'destroy']);

    //***************** Setting Route *************************/
    Route::get('/setting',[SettingController::class,'index'])->name('setting');
    Route::patch('/setting/{id}',[SettingController::class,'update']);

    //***************** Pos Route *************************/
    Route::get('/pos',[PosController::class,'index'])->name('pos');

    Route::get('/pending-order',[PosController::class,'pendingOrder'])->name('pending.order');
    Route::get('/view-product-order/{id}',[PosController::class,'viewOrder']);
    Route::get('/order-done/{id}',[PosController::class,'orderDone']);
    Route::get('/delivery-order',[PosController::class,'deliveryOrder'])->name('delivery.order');
    Route::post('/pay-amount/{id}',[PosController::class,'payAmount']);
    Route::get('//delete-order/{id}',[PosController::class,'deleteOrder']);


    //***************** Cart Route *************************/
    Route::post('/add-cart',[CartController::class,'index']);
    Route::post('/update-cart/{rowId}',[CartController::class,'cartUpdate']);
    Route::get('/remove-cart/{rowId}',[CartController::class,'CartRemove']);
    Route::post('/invoice',[CartController::class,'invoice']);
    Route::post('/final-invoice',[CartController::class,'finalInvoice']);

    //***************** Sales Route *************************/
    Route::get('/today-sales',[SalesreportController::class,'todaySales'])->name('today.sales');
    Route::get('/monthly-sales/{month?}',[SalesreportController::class,'monthSales'])->name('month.sales');
    Route::get('/yearly-sales',[SalesreportController::class,'yearlySales'])->name('year.sales');
    Route::get('/all-sales',[SalesreportController::class,'allSales'])->name('all.sales');

    //***************** PDF Route *************************/
    Route::get('/today-pdf',[PDFController::class,'PDFDownloadToday'])->name('todaypdf');
    Route::get('/month-pdf/{month}',[PDFController::class,'PDFDownloadMonth']);
});

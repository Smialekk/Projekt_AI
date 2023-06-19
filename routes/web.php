<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/main', function () {
    return view('main');
});

Route::get('/main2', function () {
    return view('main2');
});

Route::get('/basicState', function () {
    return view('basicState/basicState');
});

Route::get('/finishingWorks', function () {
    return view('finishingWorks/finishingWorks');
});

use App\Http\Controllers\FinishingWorksController;
// Route::get('/finishingWorks', [FinishingWorksController::class, 'index'])->name('index');
Route::get('/finishingWorks/main', [FinishingWorksController::class, 'main'])->name('finishingWorks.main');
Route::get('/finishingWorks', [FinishingWorksController::class, 'index'])->name('finishingWorks');

Route::get('/finishingWorks/index', [FinishingWorksController::class, 'index'])->name('finishingWorks.index');
Route::get('/finishingWorks/create', [FinishingWorksController::class, 'create'])->name('finishingWorks.create');

Route::post('/finishingWorks', [FinishingWorksController::class, 'store'])->name('finishingWorks.store');
Route::get('/finishingWorks/{finishingWorks}/edit', [FinishingWorksController::class, 'edit'])->name('finishingWorks.edit');
Route::put('/finishingWorks/{finishingWorks}', [FinishingWorksController::class, 'update'])->name('finishingWorks.update');
Route::delete('/finishingWorks/{finishingWorks}', [FinishingWorksController::class, 'destroy'])->name('finishingWorks.destroy');



use App\Http\Controllers\basicStateController;
Route::get('/basicState/main', [basicStateController::class, 'main'])->name('basicState.main');
Route::get('/basicState', [basicStateController::class, 'index'])->name('basicState');

Route::get('/basicState/index', [basicStateController::class, 'index'])->name('basicState.index');
Route::get('/basicState/create', [basicStateController::class, 'create'])->name('basicState.create');

Route::post('/basicState', [basicStateController::class, 'store'])->name('basicState.store');
Route::get('/basicState/{basicState}/edit', [basicStateController::class, 'edit'])->name('basicState.edit');
Route::put('/basicState/{basicState}', [basicStateController::class, 'update'])->name('basicState.update');
Route::delete('/basicState/{basicState}', [basicStateController::class, 'destroy'])->name('basicState.destroy');




Route::get('/register', function () {
    return view('register');
})->name('register');

use App\Http\Controllers\MainController;

Route::get('/main', [MainController::class, 'index'])->name('main');
Route::post('/send-message', [MainController::class, 'sendMessage'])->name('sendMessage');
Route::get('/messages', [MainController::class, 'viewMessage'])->name('messages');
Route::delete('/messages/{id}', [MainController::class, 'deleteMessage'])->name('messages.delete');


use App\Http\Controllers\AuthController;


Route::controller(AuthController::class)->group(function () {
    Route::get('/login', 'login')->name('login');
    Route::post('/login', 'authenticate')->name('authenticate');
    Route::get('/logout', 'logout')->name('logout');
});

use App\Http\Controllers\ClientsController;

Route::controller(ClientsController::class)->group(function () {
    Route::get('/clients', 'index')->name('clients');
    Route::get('/clients/main', [ClientsController::class, 'main'])->name('clients.main');

    Route::get('/clients/index', [ClientsController::class, 'index'])->name('clients.index');
    Route::get('/clients/{client}/edit', [ClientsController::class, 'edit'])->name('clients.edit');
    Route::put('/clients/{client}', [ClientsController::class, 'update'])->name('clients.update');
    Route::delete('/clients/{client}', [ClientsController::class, 'destroy'])->name('clients.destroy');

});

use App\Http\Controllers\OrdersController;

Route::controller(OrdersController::class)->group(function () {
    Route::get('/orders', 'index')->name('orders');
    Route::get('/orders/main', [OrdersController::class, 'main'])->name('orders.main');

    Route::get('/orders/index', [OrdersController::class, 'index'])->name('orders.index');
    Route::get('/orders/create-order', [OrdersController::class, 'create'])->name('orders.create-order');
    Route::post('/orders', [OrdersController::class, 'store'])->name('orders.store');
    Route::get('/orders/{orders}/edit', [OrdersController::class, 'edit'])->name('orders.edit');
    Route::put('/orders/{orders}', [OrdersController::class, 'update'])->name('orders.update');
    Route::delete('/orders/{orders}', [OrdersController::class, 'destroy'])->name('orders.destroy');
});

use App\Http\Controllers\EmployeesController;

Route::controller(EmployeesController::class)->group(function () {
    Route::get('/employees', 'index')->name('employees');
    Route::get('/employees/main', [EmployeesController::class, 'main'])->name('employees.main');

    Route::get('/employees/index', [EmployeesController::class, 'index'])->name('employees.index');
    Route::get('/employees/{employees}/edit', [EmployeesController::class, 'edit'])->name('employees.edit');
    Route::put('/employees/{employees}', [EmployeesController::class, 'update'])->name('employees.update');
    Route::delete('/employees/{employees}', [EmployeesController::class, 'destroy'])->name('employees.destroy');
});

use App\Http\Controllers\FormController;

Route::controller(FormController::class)->group(function () {
    Route::get('/form', 'index')->name('form');
    Route::post('/form', 'save')->name('form');
    //Route::get('/form/{category_id}', [FormController::class, 'orderForm'])->name('form');
});

use App\Http\Controllers\RegisterController;

Route::controller(RegisterController::class)->group(function () {
    Route::get('/register', 'index')->name('register');
    Route::post('/register', 'store')->name('register');
});


use App\Http\Controllers\BuilderPanelController;

Route::get('/builderPanel', [BuilderPanelController::class, 'index'])->name('builderPanel');
Route::get('/builderPanel/index', [BuilderPanelController::class, 'index'])->name('builderPanel.index');
Route::put('/builderPanel/{id}', [BuilderPanelController::class, 'update'])->name('builderPanel.update');



// use App\Http\Controllers\BuilderPanelController;

// Route::get('/builderPanel', 'index')->name('builderPanel');
// Route::get('/builderPanel/index', [BuilderPanelController::class, 'index'])->name('builderPanel.index');

// use App\Http\Controllers\RegisterController;

// Route::get('/register', [RegisterController::class, 'index'])->name('register');
// Route::post('/register', [RegisterController::class, 'store'])->name('register.store');



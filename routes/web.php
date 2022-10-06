<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SignatureController;
use App\Http\Livewire\Customercontactdropdown;
use App\Http\Controllers\LocalizationController;
use App\Http\Controllers\DropdownController;
use App\Http\Controllers\ServiceOrderController;
use App\Http\Controllers\OrderEmployeeSchedule;

use App\Mail\TicketsMailable;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\NotifyTicketController;
use App\Http\Controllers\NotifyTicketEndController;
use App\Http\Controllers\NotifySalesController;

use App\Models\Employee;
use App\Notifications\NotifyTicket;
use Illuminate\Support\Facades\Notification;

use App\Models\Customer;

use App\Models\Project;



Route::get('dropdown', [DropdownController::class, 'view'])->name('dropdownView');
Route::get('get-states', [DropdownController::class, 'getStates'])->name('getStates');
Route::get('get-stock', [DropdownController::class, 'getStockes'])->name('getStockes');

Route::get('inicio', [ServiceOrderController::class, 'inicio'])->name('inicio');
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

Route::get('/', function () {
    //return view('auth.login');
    return view('welcome');
});

Route::get('/customer2', function () {
    dd(Customer::get());
});

Route::get('/employee2', function () {
    dd(Employee::get());
});

Route::get('/project', function () {
    dd(Project::get());
});

//Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('customers', App\Http\Controllers\CustomerController::class);

Route::resource('contacts', App\Http\Controllers\ContactController::class);

Route::resource('classified-materials', App\Http\Controllers\ClassifiedMaterialController::class);

Route::resource('departments', App\Http\Controllers\DepartmentController::class);

Route::resource('employees', App\Http\Controllers\EmployeeController::class);

Route::resource('employee-orders', App\Http\Controllers\EmployeeOrderController::class);

Route::resource('materials', App\Http\Controllers\MaterialController::class);

Route::resource('material-assigneds', App\Http\Controllers\MaterialAssignedController::class);

Route::resource('material-useds', App\Http\Controllers\MaterialUsedController::class);

Route::resource('order-statuses', App\Http\Controllers\OrderStatusController::class);

Route::resource('priorities', App\Http\Controllers\PriorityController::class);

Route::resource('report-statuses', App\Http\Controllers\ReportStatusController::class);

Route::resource('services', App\Http\Controllers\ServiceController::class);

Route::resource('order-employee-schedules', App\Http\Controllers\OrderEmployeeScheduleController::class);

Route::resource('service-orders', App\Http\Controllers\ServiceOrderController::class);

Route::resource('service-reports', App\Http\Controllers\ServiceReportController::class);

Route::resource('service-task-specifics', App\Http\Controllers\ServiceTaskSpecificController::class);

Route::resource('statuses', App\Http\Controllers\StatusController::class);

Route::resource('supervisor-employees', App\Http\Controllers\SupervisorEmployeeController::class);

Route::resource('tickets', App\Http\Controllers\TicketController::class);//->middleware('auth');

Route::resource('ticket-statuses', App\Http\Controllers\TicketStatusController::class);

Route::resource('tools', App\Http\Controllers\ToolController::class);

Route::resource('tool-assigneds', App\Http\Controllers\ToolAssignedController::class);

Route::resource('tool-useds', App\Http\Controllers\ToolUsedController::class);

Route::resource('type-maintenances', App\Http\Controllers\TypeMaintenanceController::class);

Route::resource('type-services', App\Http\Controllers\TypeServiceController::class);

Route::resource('unit-measures', App\Http\Controllers\UnitMeasureController::class);

Route::resource('Warranty', App\Http\Controllers\WarrantyController::class);

//////////////////////////////////////// RUTAS PARA ENVÍO DE EMAIL ////////////////////////////////////////////////////
Route::get('/tickets_mail', function () {
    $correo = new TicketsMailable;
    Mail::to('ifaustino@automatyco.comn')->send($correo);

    redirect()->route('tickets.index')
    ->with('success', 'Ticket '.$data['ticket_id'].' '.__('created successfully'));
});

Route::get('notify-ticket', [NotifyTicketController::class, 'email'])->name('notify-ticket');

Route::get('notify-final', [NotifyTicketEndController::class, 'email'])->name('notify-final');

Route::get('notify-sales', [NotifySalesController::class, 'email'])->name('notify-sales');

//////////////////////////////////////// ///////////////////////// ////////////////////////////////////////////////////

//////////////////////////////////////// RUTAS PARA ENVÍO DE NO ////////////////////////////////////////////////////////

Route::get('notifications', function () {

    $employee = Employee::find(2270);    
    $employees = $employee['email'];
    //return response()->json($employees);
    Notification::route('mail', $employees)->notify(new NotifyTicket());
    //Notification::route('mail', 'taylor@example.com')->notify(new NotifyTicket());
    return view('welcome');
});
//////////////////////////////////////// ///////////////////////// ////////////////////////////////////////////////////

/////////////////////////////////////////////////// AUTENTICATION  ////////////////////////////////////////////////////
/*Auth::routes(['register'=>false, 'reset'=>false]);

Route::get('/home', [App\Http\Controllers\TicketController::class, 'index'])->name('home');

Route::prefix(['middleware'=>'auth'], function () {
    Route::get('/', [TicketController::class, 'index'])->name('home');
});*/
///////////////////////////////////////////////////// ///////////////////////// ////////////////////////////////////////

/////////////////////////////////////////////////// PDF  //////////////////////////////////////////////////////////////

Route::get('tickets-pdf', [App\Http\Controllers\TicketController::class, 'pdf'])->name('ticket.pdf');

Route::get('orders-pdf', [App\Http\Controllers\ServiceOrderController::class, 'pdf'])->name('service-order.pdf');

Route::get('services-pdf', [App\Http\Controllers\ServiceController::class, 'pdf'])->name('service.pdf');

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
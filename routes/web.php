<?php

use App\Http\Controllers\Backend\AuthController;
use App\Http\Controllers\Backend\CountriesController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\DepartmentController;
use App\Http\Controllers\Backend\EmployeesController;
use App\Http\Controllers\Backend\JobController;
use App\Http\Controllers\Backend\JobGradesController;
use App\Http\Controllers\Backend\JobHistoryController;
use App\Http\Controllers\Backend\LocationsController;
use App\Http\Controllers\Backend\ManagerController;
use App\Http\Controllers\Backend\MyAccountController;
use App\Http\Controllers\Backend\PayrollController;
use App\Http\Controllers\Backend\RegionsController;
use App\Http\Controllers\Backend\PositionsController;
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

Route::get('/', [AuthController::class, 'index']);
Route::get('forgot-password', [AuthController::class, 'forgot_password']);
Route::get('register', [AuthController::class, 'register']);
Route::post('register_post', [AuthController::class, 'register_post']);
Route::post('checkemail', [AuthController::class, 'CheckEmail']);
Route::post('login_post', [AuthController::class, 'login_post']);

// Admin || HR same name
Route::group(['middleware' => 'admin'], function () {
    Route::get('admin/dashboard', [DashboardController::class, 'dashboard']);
    Route::get('admin/employees', [EmployeesController::class, 'index']);
    Route::get('admin/employees/add', [EmployeesController::class, 'add']);
    Route::post('admin/employees/add', [EmployeesController::class, 'add_post']);
    Route::get('admin/employees/view/{id}', [EmployeesController::class, 'view']);
    Route::get('admin/employees/edit/{id}', [EmployeesController::class, 'edit']);
    Route::post('admin/employees/edit/{id}', [EmployeesController::class, 'edit_update']);
    Route::get('admin/employees/delete/{id}', [EmployeesController::class, 'delete']);
    Route::get('admin/employees_image/delete/{id}', [EmployeesController::class, 'image_delete']);

    //Job start
    Route::get('admin/jobs', [JobController::class, 'index']);
    Route::get('admin/jobs/add', [JobController::class, 'add']);
    Route::post('admin/jobs/add', [JobController::class, 'add_post']);
    Route::get('admin/jobs/view/{id}', [JobController::class, 'view']);
    Route::get('admin/jobs/edit/{id}', [JobController::class, 'edit']);
    Route::post('admin/jobs/edit/{id}', [JobController::class, 'edit_update']);
    Route::get('admin/jobs/delete/{id}', [JobController::class, 'delete']);

    //jobs Excel export
    Route::get('admin/jobs_export', [JobController::class, 'job_export']);

    //job history
    Route::get('admin/job_history', [JobHistoryController::class, 'index']);
    Route::get('admin/job_history/add', [JobHistoryController::class, 'add']);
    Route::post('admin/job_history/add', [JobHistoryController::class, 'add_post']);
    Route::get('admin/job_history/edit/{id}', [JobHistoryController::class, 'edit']);
    Route::post('admin/job_history/edit/{id}', [JobHistoryController::class, 'edit_update']);
    Route::get('admin/job_history/delete/{id}', [JobHistoryController::class, 'delete']);
    Route::get('admin/job_history_export', [JobHistoryController::class, 'job_history_export']);

    //job grades
    Route::get('admin/job_grades', [JobGradesController::class, 'index']);
    Route::get('admin/job_grades/add', [JobGradesController::class, 'add']);
    Route::post('admin/job_grades/add', [JobGradesController::class, 'add_post']);
    Route::get('admin/job_grades/edit/{id}', [JobGradesController::class, 'edit']);
    Route::post('admin/job_grades/edit/{id}', [JobGradesController::class, 'edit_update']);
    Route::get('admin/job_grades/delete/{id}', [JobGradesController::class, 'delete']);

    //admin regions start
    Route::get('admin/regions', [RegionsController::class, 'index']);
    Route::get('admin/regions/add', [RegionsController::class, 'add']);
    Route::post('admin/regions/add', [RegionsController::class, 'add_post']);
    Route::get('admin/regions/edit/{id}', [RegionsController::class, 'edit']);
    Route::post('admin/regions/edit/{id}', [RegionsController::class, 'update_edit']);
    Route::get('admin/regions/delete/{id}', [RegionsController::class, 'delete']);

    //admin countries
    Route::get('admin/countries', [CountriesController::class, 'index']);
    Route::get('admin/countries/add', [CountriesController::class, 'add']);
    Route::post('admin/countries/add', [CountriesController::class, 'add_post']);
    Route::get('admin/countries/edit/{id}', [CountriesController::class, 'edit']);
    Route::post('admin/countries/edit/{id}', [CountriesController::class, 'edit_post']);
    Route::get('admin/countries/delete/{id}', [CountriesController::class, 'delete']);
    Route::get('admin/countries_export', [CountriesController::class, 'countries_export']);

    //admin location start
    Route::get('admin/location', [LocationsController::class, 'index']);
    Route::get('admin/location/add', [LocationsController::class, 'add']);
    Route::post('admin/location/add', [LocationsController::class, 'add_post']);
    Route::get('admin/location/edit/{id}', [LocationsController::class, 'edit']);
    Route::post('admin/location/edit/{id}', [LocationsController::class, 'edit_update']);
    Route::get('admin/location/delete/{id}', [LocationsController::class, 'delete']);
    Route::get('admin/location_export', [LocationsController::class, 'location_export']);

    //admin department
    Route::get('admin/department', [DepartmentController::class, 'index']);
    Route::get('admin/department/add', [DepartmentController::class, 'add']);
    Route::post('admin/department/add', [DepartmentController::class, 'add_post']);
    Route::get('admin/department/edit/{id}', [DepartmentController::class, 'edit']);
    Route::post('admin/department/edit/{id}', [DepartmentController::class, 'edit_post']);
    Route::get('admin/department/delete/{id}', [DepartmentController::class, 'delete']);
    Route::get('admin/department_export', [DepartmentController::class, 'department_export']);

    //manager
    Route::get('admin/manager', [ManagerController::class, 'index']);
    Route::get('admin/manager/add', [ManagerController::class, 'add']);
    Route::post('admin/manager/add', [ManagerController::class, 'add_post']);
    Route::get('admin/manager/edit/{id}', [ManagerController::class, 'edit']);
    Route::post('admin/manager/edit/{id}', [ManagerController::class, 'edit_post']);
    Route::get('admin/manager/delete/{id}', [ManagerController::class, 'delete']);
    Route::get('admin/manager_export', [ManagerController::class, 'manager_export']);

    //my account
    Route::get('admin/my_account', [MyAccountController::class, 'my_account']);
    Route::post('admin/my_account/update', [MyAccountController::class, 'edit_update']);

    //Pay Roll
    Route::get('admin/payroll', [PayrollController::class, 'index']);
    Route::get('admin/payroll/add', [PayrollController::class, 'add']);
    Route::post('admin/payroll/add', [PayrollController::class, 'insert_payroll']);
    Route::get('admin/payroll/view/{id}', [PayrollController::class, 'view']);
    Route::get('admin/payroll/edit/{id}', [PayrollController::class, 'edit']);
    Route::post('admin/payroll/edit/{id}', [PayrollController::class, 'update']);
    Route::get('admin/payroll/delete/{id}', [PayrollController::class, 'delete']);
    Route::get('admin/payroll_export', [PayrollController::class, 'payroll_export']);

    // Position
    Route::get('admin/position', [PositionsController::class, 'index']);
    Route::get('admin/position/add', [PositionsController::class, 'add']);
    Route::post('admin/position/add', [PositionsController::class, 'insert_post']);
    Route::get('admin/position/edit/{id}', [PositionsController::class, 'edit']);
    Route::post('admin/position/edit/{id}', [PositionsController::class, 'edit_update']);
    Route::get('admin/position/delete/{id}', [PositionsController::class, 'delete']);
    Route::get('admin/position_export', [PositionsController::class, 'position_export']);
});
Route::group(['middleware', 'employee'], function () {
    Route::get('employees/dashboard', [DashboardController::class, 'dashboard']);
});
Route::get('logout', [AuthController::class, 'logout']);

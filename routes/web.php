<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WorkController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AreaInfoController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\WorkDetailsController;
use App\Http\Controllers\AdditionalCompanyController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\QuotationController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\TodoController;

Route::get('/', function () {
    return view('admin.auth.login');
})->name('home');

Route::get('/dashboard', function () {
    $userId = auth()->user()->id;

    $contacts = \App\Models\Contact::count();
    $projects = \App\Models\Work::count();
    $transections = \App\Models\Transection::count();
    $todos = \App\Models\Todo::with('work', 'contact')->orderBy('time', 'asc')->get();
    $assignedProjects = \App\Models\Work::where('user_id', $userId)->get();

    return view('admin.dashboard', compact('contacts', 'projects', 'transections', 'todos', 'assignedProjects'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('tags', TagController::class);

    Route::resource('contacts', ContactController::class);
    Route::resource('quotations', QuotationController::class);
    Route::resource('invoices', InvoiceController::class);
    Route::resource('projects', WorkController::class);
    Route::resource('project.details', WorkDetailsController::class);
    Route::resource('transections', TransactionController::class);
    Route::get('dues', [TransactionController::class,'dues'])->name('transections.dues');
    Route::resource('todos', TodoController::class);
    Route::resource('users', UserController::class);
    Route::resource('settings', SettingController::class);
});


Route::get('project_share/{id}', [WorkDetailsController::class, 'show'])->name('project_share');
Route::get('quotation_share/{id}', [QuotationController::class, 'share'])->name('quotation_share');
Route::get('invoice_share/{id}', [InvoiceController::class, 'share'])->name('invoice_share');

require __DIR__.'/auth.php';

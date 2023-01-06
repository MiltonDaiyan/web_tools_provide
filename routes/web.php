<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MailerController;
use App\Http\Controllers\WebmailController;
use App\Http\Controllers\SMTPController;
use App\Http\Controllers\CardController;
use App\Http\Controllers\LeadController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\ScriptController;
use App\Http\Controllers\LetterController;
use App\Http\Controllers\TutorialController;
use App\Http\Controllers\ShellsController;
use App\Http\Controllers\SshWhmsController;
use App\Http\Controllers\CpanelsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RdpsController;
use App\Http\Controllers\RequestedProductController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\WithdrawController;
use App\Http\Controllers\LufixServiceController;


// Product
//Route::group(['prefix' => '/product','as' => 'product.',], function () {


// Route::get('/x', function () {
//    return view('test');
// });

Route::controller(DashboardController::class)->prefix('/')->group(function () {
    Route::get('/', 'index')->name('dashboard.index');
});


Route::controller(MailerController::class)->prefix('/mailer')->group(function () {
    Route::get('/', 'index')->name('mailer');
    Route::post('/store', 'store')->name('add.mailer');
    Route::get('/edit/{id}', 'edit')->name('edit.mailer');
    Route::post('/update/{id}', 'update')->name('add.edit.mailer');
    Route::post('/destroy/{id}', 'destroy')->name('delete.mailer');
});


Route::controller(WebmailController::class)->prefix('/webmail')->group(function () {
Route::get('/', 'webMail')->name('webmail');
Route::post('/add-webmail', 'saveWebMail')->name('add.webMail');
Route::post('/delete-webMail/{id}', 'deleteWebMail')->name('delete.webMail');
Route::get('/edit-webMail/{id}', 'editWebMail')->name('edit.webMail');
Route::post('/add-edit-webMail', 'saveEditWebMail')->name('add.edit.webMail');
});

Route::controller(SMTPController::class)->prefix('/smtp')->group(function () {
Route::get('/',  'smtp')->name('smtp');
Route::post('/add-smtp', 'saveSmtp')->name('add.smtp');
Route::post('/delete-smtp/{id}', 'deleteSmtp')->name('delete.smtp');
Route::get('/edit-smtp/{id}', 'editSmtp')->name('edit.smtp');
Route::post('/add-edit-smtp', 'saveEditSmtp')->name('add.edit.smtp');
});

Route::controller(CardController::class)->prefix('/card')->group(function () {
Route::get('/',  'card')->name('card');
Route::post('/add-card',  'saveCard')->name('add.card');
Route::post('/delete-card/{id}',  'deleteCard')->name('delete.card');
Route::get('/edit-card/{id}',  'editCard')->name('edit.card');
Route::post('/add-card-smtp',  'saveEditCard')->name('add.edit.card');
});

Route::controller(LeadController::class)->prefix('/lead')->group(function () {
Route::get('/','lead')->name('lead');
Route::post('/add-lead','saveLead')->name('add.lead');
Route::post('/delete-lead/{id}','deleteLead')->name('delete.lead');
Route::get('/edit-lead/{id}','editLead')->name('edit.lead');
Route::post('/add-lead-smtp','saveEditLead')->name('add.edit.lead');
});


//---------------Lufix Service Controller--------------//
Route::controller(LufixServiceController::class)->prefix('/lufix')->group(function () {
    Route::get('/', 'lufixIndex')->name('lufix');
    Route::post('/saveLufix', 'saveLufix')->name('saveLufix');
    Route::post('/deleteLufix', 'deleteLufix')->name('deleteLufix');
    Route::post('/updateLufix', 'updateLufix')->name('updateLufix');
    Route::get('/editLufix/{id}', 'editLufix')->name('editLufix');
});

//---------------Account Controller--------------//
Route::controller(AccountController::class)->prefix('/account')->group(function () {
    Route::get('/', 'accountIndex')->name('account');
    Route::post('/saveAccount', 'saveAccount')->name('saveAccount');
    Route::post('/deleteAccount', 'deleteAccount')->name('deleteAccount');
    Route::post('/updateAccount', 'updateAccount')->name('updateAccount');
    Route::get('/editAccount/{id}', 'editAccount')->name('editAccount');
});

//---------------Script Controller--------------//
Route::controller(ScriptController::class)->prefix('/script')->group(function () {
    Route::get('/', 'scriptIndex')->name('script');
    Route::post('/saveScript', 'saveScript')->name('saveScript');
    Route::post('/deleteScript', 'deleteScript')->name('deleteScript');
    Route::post('/updateScript', 'updateScript')->name('updateScript');
    Route::get('/editScript/{id}', 'editScript')->name('editScript');
});


//---------------Letter Controller--------------//
Route::controller(LetterController::class)->prefix('/letter')->group(function () {
    Route::get('/', 'letterIndex')->name('letter');
    Route::post('/saveLetter', 'saveLetter')->name('saveLetter');
    Route::post('/deleteLetter', 'deleteLetter')->name('deleteLetter');
    Route::post('/updateLetter', 'updateLetter')->name('updateLetter');
    Route::get('/editLetter/{id}', 'editLetter')->name('editLetter');
});


//---------------Tutorial Controller--------------//
Route::controller(TutorialController::class)->prefix('/tutorial')->group(function () {
    Route::get('/', 'tutorialIndex')->name('tutorial');
    Route::post('/saveTutorial', 'saveTutorial')->name('saveTutorial');
    Route::post('/deleteTutorial', 'deleteTutorial')->name('deleteTutorial');
    Route::post('/updateTutorial', 'updateTutorial')->name('updateTutorial');
    Route::get('/editTutorial/{id}', 'editTutorial')->name('editTutorial');
});


//---------------Sales Controller--------------//
Route::controller(SaleController::class)->prefix('/sale')->group(function () {
    Route::get('/', 'saleIndex')->name('sale');
});

//---------------Withdraw Controller--------------//
Route::controller(WithdrawController::class)->prefix('/withdraw')->group(function () {
    Route::get('/', 'withdrawIndex')->name('withdraw');
});


//--------------- Requested Product----------------//
Route::get('requested-product', [RequestedProductController::class, 'RequestedProduct'])->name('requested.product');
Route::post('requested-product', [RequestedProductController::class, 'saveRequestedProduct'])->name('requested.product');
Route::get('manage-requested-product', [RequestedProductController::class, 'manageRequestedProduct'])->name('manage.requested.product');
Route::get('change.status/{id}', [RequestedProductController::class, 'changeStatus'])->name('change.status');

//});


Route::resource('/product/shells', ShellsController::class);
Route::resource('/product/cpanels', CpanelsController::class);
Route::resource('/product/rdps', RdpsController::class);
Route::resource('/product/sshwhm', SshWhmsController::class);

// End Product


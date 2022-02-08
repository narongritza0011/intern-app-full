<?php

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
//     return view('auth/login');
// });

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\InternMemberController;
use App\Http\Controllers\IpController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\SubmitDocumentController;
use App\Http\Controllers\UnlockSystemController;
use App\Http\Controllers\UserController;
use FontLib\Table\Type\name;

Route::get('/', ['middleware' => 'guest', function () {
    return view('auth/login');
}]);

Auth::routes();


//เเบบฟอร์มหน้าสมัครฝึกงาน
Route::get('register', [FormController::class, 'index']);
Route::post('register/store', [FormController::class, 'store'])->name('register.save');



//หน้าผู้ดูเเลระบบ
Route::group(['middleware' => ['auth']], function () {
    Route::group(['prefix' => 'home'], function () {
        Route::resource('dashboard', 'HomeController');
    });

    Route::group(['prefix' => 'manage'], function () {
        //internship
        Route::resource('internship', 'InternMemberController');
        Route::get('viewIntern/{id}', 'InternMemberController@view');
        Route::get('viewUploadFileIntern/{id}', 'InternMemberController@viewUploadFile');
        Route::post('UploadFileIntern/store', [SubmitDocumentController::class, 'store'])->name('UploadFileIntern.save');
        Route::get('internship/resume/{id}', 'InternMemberController@resume');
        Route::get('internship/Document/{id}', [InternMemberController::class, 'Document']);
        Route::get('internship/Document/download/{id}', [InternMemberController::class, 'downloadDocument']);



        Route::get('approved', [InternMemberController::class, 'approved'])->name('allApproved');
        Route::get('intern_success', [InternMemberController::class, 'internSuccess'])->name('internSuccessfull');





        //customer
        Route::resource('customer', 'CustomersController');
        Route::get('editCus/{id}', 'CustomersController@editCus');
        Route::get('delCus/{id}', 'CustomersController@delCus');
    });


    Route::group(['prefix' => 'manager'], function () {
        //user member
        Route::get('user', [UserController::class, 'index'])->name('userAll');
        Route::post('user/register', [UserController::class, 'register'])->name('createUser');
        Route::get('editUser/{id}', 'UserController@editUser');
        Route::get('delUser/{id}', 'UserController@delUser');


        //product
        Route::resource('product', 'ProductController');
        Route::get('editProduct/{id}', 'ProductController@editProduct');
        Route::get('delProduct/{id}', 'ProductController@delProduct');

        //report work
        Route::resource('report', 'ReportworkController');
        Route::get('editReport/{id}', 'ReportworkController@editReport');
        Route::get('delReport/{id}', 'ReportworkController@delReport');



        //location 
        // Route::get('location/show', [LocationController::class, 'indexStore']);
        // Route::post('location/add', [LocationController::class, 'store'])->name('locationStore');



        //ip check and location 
        Route::get('location', [IpController::class, 'showData'])->name('locationAll');

        Route::get('ip-tracker', [IpController::class, 'index'])->name('ip-tracker');
        Route::post('ip-tracker/add', [IpController::class, 'store'])->name('storeTracker');
        Route::get('ip-tracker/show/{id}', [IpController::class, 'view']);
        Route::get('ip-tracker/edit/{id}', [IpController::class, 'edit']);
        Route::get('ip-tracker/delete/{id}', [IpController::class, 'delete']);
        Route::post('ip-tracker/update/{id}', [IpController::class, 'update']);

        // unlock.store

        //unlock system
        // Route::get('unlock', [UnlockSystemController::class, 'index']);
        // Route::post('unlock/add', [UnlockSystemController::class, 'store']);


        Route::resource('unlock', 'UnlockSystemController');
        Route::get('editUnlock/{id}', 'UnlockSystemController@editUnlock');
        Route::get('delUnlock/{id}', 'UnlockSystemController@delUnlock');


        Route::resource('service_ma', 'ServiceMaController');
        Route::get('editServiceMa/{id}', 'ServiceMaController@edit');
        Route::get('delServiceMa/{id}', 'ServiceMaController@del');
    });
});

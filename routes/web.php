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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::group(['middleware' => 'admin'], function () {
        Route::resource('departments', 'DepartmentController');

        Route::resource('users', 'UserController',
            ['only' => ['index', 'create', 'store', 'destroy']]);
    });
    Route::resource('users', 'UserController',
        ['only' => ['show', 'edit', 'update']]);

    Route::post('monthlyLogs/setReward', 'MonthlyLogController@setReward')->name('monthlyLogs.getSetReward');
    Route::get('monthlyLogs/setReward', 'MonthlyLogController@getSetReward')->name('monthlyLogs.postSetReward');
    Route::resource('monthlyLogs', 'MonthlyLogController');

    Route::resource('dailyLogs', 'DailyLogController');
    Route::post('dailyLogs/checkIn', 'DailyLogController@checkIn')->name('dailyLogs.checkIn');
    Route::post('dailyLogs/checkOut', 'DailyLogController@checkOut')->name('dailyLogs.checkOut');

    Route::resource('feedback', 'FeedbackController');

    Route::get('/home', function () {
        return redirect(route('dailyLogs.index'));
    })->name('home');
});

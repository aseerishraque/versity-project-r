<?php

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



Route::group(['middleware' => ['isLoggedIn']], function () {
    Route::prefix('admin')->group(function () {
        Route::get('dashboard', 'AdminController@index')->name('admin.index');
        Route::get('blank', 'AdminController@blank')->name('admin.blank');
        Route::get('teachers', 'AdminController@allTeachers')->name('teachers.all');
        Route::get('teachers/create', 'AdminController@TeacherCreateForm')->name('teachers.create');
        Route::post('teachers/create', 'AdminController@storeTeacher')->name('teachers.store');
        Route::get('teachers/edit/{id}', 'AdminController@teacherEditForm')->name('teachers.edit');
        Route::PUT('teachers/edit/{id}', 'AdminController@teacherUpdate')->name('teachers.update');
        Route::DELETE('teachers/delete/{id}', 'AdminController@teacherDelete')->name('teachers.delete');
        Route::resource('students', 'StudentController');

        Route::get('settings', 'AdminController@settingsIndex')->name('settings.index');
        Route::post('settings/change-password', 'AdminController@changePassword')->name('settings.password');
        Route::post('settings/change-email', 'AdminController@changeEmail')->name('settings.email');
        Route::post('settings/change-username', 'AdminController@changeUsername')->name('settings.username');

        Route::resource('sessions', 'SessionController');
        Route::resource('subjects', 'SubjectController');
        Route::get('courses-offered', 'SubjectController@coursesOffered')->name('courses.offered');
        Route::post('courses-offered', 'SubjectController@offerCourse')->name('courses.offer');
        Route::PUT('courses-offered/{id}', 'SubjectController@updateOffer')->name('courses.update.offer');
        Route::DELETE('courses-offered/{id}', 'SubjectController@destroyOffer')->name('course.destroy.offer');

        //Enrollment Routes
        Route::prefix('enrollments')->group(function (){
            Route::get('pending', 'EnrollmentController@pendingList')->name('pending.list');
            Route::get('approved', 'EnrollmentController@approvedList')->name('approved.list');
        });



    });



//    Teacher Routes
    Route::prefix('teachers')->group(function (){
        Route::get('dashboard', 'HomeController@teachersPanel')->name('teachers-panel.index');
    });


//    Student Routes
    Route::prefix('students')->group(function (){
        Route::get('dashboard', 'HomeController@studentsPanel')->name('students-panel.index');
    });


});

Route::get('/', 'AdminController@login')->name('login');
Route::post('login', 'LoginController@authenticate')->name('login.auth');
Route::get('logout', 'LoginController@logout')->name('logout');



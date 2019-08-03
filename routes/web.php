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

//Route::group(['namespace' => 'User',function(){
 
    
Route::get('/', 'User\HomeController@index');
Route::get('tutors', 'PublicController@tutors');
Route::get('tutor_details/{id}', 'PublicController@tutor_details')->name('tutor_details');
Route::post('contact_submit', 'PublicController@contact_submit')->name('contact_submit');
Route::get('search_tutor', 'PublicController@search_tutor')->name('search_tutor');
Route::get('post/{post?}','User\PostController@post')->name('post');
 
    
    
//}]);

Route::get('parent_register',function(){return view('Parent.Auth.register');})->name('parent_register');
Route::get('parent_login',function(){return view('Parent.Auth.login');})->name('parent_login');
Route::get('tutor_register',function(){return view('Tutor.Auth.register');})->name('tutor_register');
Route::get('tutor_login',function(){return view('Tutor.Auth.login');})->name('tutor_login');

Route::post('parent_login','Auth\LoginController@parent_login')->name('parent_log_in');
Route::post('parent_register','Auth\RegisterController@parent_register')->name('parent_register_submit');
Route::post('tutor_login','Auth\LoginController@tutor_login')->name('tutor_log_in');
Route::post('tutor_register','Auth\RegisterController@tutor_register')->name('tutor_register_submit');
Auth::routes();

//student...................
Route::get('profile','HomeController@profile');
Route::post('edit_student_profile','HomeController@edit_student_profile')->name('edit_student_profile');
Route::get('setting','HomeController@setting')->name('setting');
Route::get('hire_me/{id}','HomeController@hire_me')->name('hire_tutor');
Route::post('booking_me','HomeController@booking_me')->name('student_booking_me');
Route::get('hire_list','HomeController@hire_list');
Route::post('change_setting','HomeController@change_setting')->name('change_setting');
//student end................
//.....parent.....................
Route::prefix('parent')->group(function () {
 Route::get('home','ParentController@home');
 Route::get('hire_list','ParentController@hire_list');
 Route::get('hire_me/{id}','ParentController@hire_me')->name('hire_me');
 Route::post('booking_me','ParentController@booking_me')->name('booking_me');
 Route::get('profile','ParentController@profile')->name('parent_profile');
 Route::get('setting','ParentController@setting')->name('parent_setting');
 Route::post('edit_profile','ParentController@edit_profile')->name('edit_parent_profile');
 Route::post('change_setting','ParentController@change_parent_setting')->name('change_parent_setting');
});
//...end parent.....................
 
//.....tutor........................
Route::prefix('tutor')->group(function () {
 Route::get('home','TutorController@home');
 Route::get('hire_list','TutorController@hire_list');
 Route::post('update_status','TutorController@update_status')->name('update_status');
 Route::get('subject_offer','TutorController@subject_offer')->name('subject_offer');

 Route::get('new_offer_subject','TutorController@new_offer_subject')->name('new_offer_subject');
 Route::post('submit_offer_subject','TutorController@submit_offer_subject')->name('submit_offer_subject');
 Route::post('update_offer_subject','TutorController@update_offer_subject')->name('update_offer_subject');
 Route::post('offer_subject_destroy/{id}','TutorController@offer_subject_destroy')->name('offer_subject.destroy');
 Route::get('offer_subject_edit/{id}','TutorController@offer_subject_edit')->name('offer_subject.edit');
 Route::get('availability_day','TutorController@availability_day');
 Route::post('avilable_time_add','TutorController@avilable_time_add');
 Route::post('avilable_time_edit','TutorController@avilable_time_edit');
 Route::post('avilable_time_destroy/{id}','TutorController@avilable_time_destroy')->name('avilable_time.destroy');
 Route::get('profile','TutorController@profile');
 Route::post('edit_profile','TutorController@edit_profile')->name('edit_tutor_profile');
 Route::get('setting','TutorController@setting')->name('tutor_setting');
 Route::post('change_tutor_setting','TutorController@change_tutor_setting')->name('change_tutor_setting');
});
//......end tutor.....................

//Route::group(['namespace' => 'Admin'],function(){
    
Route::get('admin/home','Admin\HomeController@index')->name('admin.home');   
Route::resource('admin/post','Admin\postController');

Route::resource('admin/user','Admin\Usercontroller');

Route::resource('admin/role','Admin\RoleController');

Route::resource('admin/permission','Admin\PermissionController');

Route::resource('admin/tag','Admin\TagController');

Route::resource('admin/category','Admin\CategoryController');
//});
Route::get('admin-login', 'Admin\Auth\LoginController@showLoginForm');
Route::post('admin-login', 'Admin\Auth\LoginController@login')->name('admin.login');
 



 
 



/*resource controller*/



 
 



Route::get('/home', 'HomeController@index')->name('home');


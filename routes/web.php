<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExcelCSVController;

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


Route::get('/', 'App\Http\Controllers\WelcomeController@welcome')->name('welcome');
Route::get('/loadmore/load_data', 'LoadMoreController@load_data')->name('loadmore.load_data');
Route::post('login', 'App\Http\Controllers\Auth\LoginController@login')->name('login');
Route::post('loginAsGuest', 'App\Http\Controllers\Auth\LoginController@loginAsGuest')->name('loginAsGuest');


Route::get('auth/google', 'App\Http\Controllers\GoogleController@redirectToGoogle');
Route::get('/callback', 'App\Http\Controllers\GoogleController@handleGoogleCallback');


Route::get('contact', 'App\Http\Controllers\WelcomeController@contact')->name('contact');
Route::post('contact', 'App\Http\Controllers\WelcomeController@contactPost')->name('contactPost');

Route::post('newsletter', 'App\Http\Controllers\WelcomeController@newsletter')->name('newsletter');

Route::get('about/curiousKidz', 'App\Http\Controllers\WelcomeController@about')->name('about');
Route::get('about/ourResearch', 'App\Http\Controllers\WelcomeController@ourResearch')->name('ourResearch');
Route::get('about/faq', 'App\Http\Controllers\WelcomeController@faq')->name('faq');

Auth::routes();

Route::get('/welcome', [App\Http\Controllers\HomeController::class, 'welcome'])->name('welcome'); //THIS IS TO WELCOME FIRST TIMER REGISTRATION PAGE
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/course/category/{title}', 'App\Http\Controllers\HomeController@category')->name('category');
Route::get('/course/category/edu/{title}', 'App\Http\Controllers\HomeController@categoryEdu')->name('categoryEdu');


Route::get('/profile/{id}', [App\Http\Controllers\HomeController::class, 'getprofile'])->name('getprofile');
Route::get('/googleProfileChangeRole/{id}', [App\Http\Controllers\HomeController::class, 'googleProfileChangeRole'])->name('googleProfileChangeRole');
Route::post('/updateGoogleAccountType/{id}', [App\Http\Controllers\HomeController::class, 'googleProfileChangeRolePost'])->name('googleProfileChangeRolePost');


Route::post('/updateProfile/student/{id}', [App\Http\Controllers\HomeController::class, 'updateStudentProfile'])->name('updateStudentProfile');
Route::post('/updateProfile/parent/{id}', [App\Http\Controllers\HomeController::class, 'updateParentProfile'])->name('updateParentProfile');
Route::get('/course/details/{course_id}', [App\Http\Controllers\HomeController::class, 'courseDetails'])->name('courseDetails');
Route::get('/getCertified/course/details/{gamify_id}', [App\Http\Controllers\HomeController::class, 'getCertifiedDetails'])->name('getCertifiedDetails');

Route::get('/getCertify/watchCourses/', [App\Http\Controllers\HomeController::class, 'getCertifyNotFound'])->name('getCertifyNotFound');





Route::get('/getCertify/watchCourses/{ageGroup}', [App\Http\Controllers\HomeController::class, 'getCerified'])->name('getCerified');


Route::get('/germified/click/completed/{gamify_id}', [App\Http\Controllers\HomeController::class, 'germifiedUser'])->name('germifiedUser');
Route::get('/germified/allCourses/{ageGroup}', [App\Http\Controllers\HomeController::class, 'getAllCoursesInCategory'])->name('getAllCoursesInCategory');

Route::get('/watch/later/{course_id}', [App\Http\Controllers\HomeController::class, 'watchLater'])->name('watchLater');
Route::get('/watch/later/view/{user_id}', [App\Http\Controllers\HomeController::class, 'getWatchLaterPerUserID'])->name('getWatchLaterPerUserID');
Route::get('/mybadge/{name}', [App\Http\Controllers\HomeController::class, 'mybadge'])->name('mybadge');



Route::any('/search', [App\Http\Controllers\SearchController::class, 'search'])->name('search');
Route::any('/searchEdu', [App\Http\Controllers\SearchController::class, 'searchEdu'])->name('searchEdu');
Route::post('/activate/newsletter/', 'App\Http\Controllers\HomeController@newsletter')->name('newsletter');

Route::resource('messages', 'ChatController')->only([
    'index',
    'store'
]);

Route::post('/reply/{course_id}', 'App\Http\Controllers\HomeController@reply')->name('reply');


Route::group(['prefix' => 'edu'], function () {

    Route::get('/library', [App\Http\Controllers\EducationController::class, 'index'])->name('home');
});







Route::group(['prefix' => 'admin'], function () {
    Route::get('/home', [App\Http\Controllers\AdminController::class, 'index'])->name('index');
    Route::get('/manage/category', [App\Http\Controllers\AdminController::class, 'category'])->name('category');
    Route::post('/manage/category', [App\Http\Controllers\AdminController::class, 'categoryPost'])->name('categoryPost');
    Route::get('/category/{id}/delete', [App\Http\Controllers\AdminController::class, 'deleteCategory'])->name('deleteCategory');
    Route::get('/edit/category/{id}', [App\Http\Controllers\AdminController::class, 'editCategory'])->name('editCategory');
    Route::post('/edit/category/{id}', [App\Http\Controllers\AdminController::class, 'editCategoryPost'])->name('editCategoryPost');
    

    Route::get('/manage/course', [App\Http\Controllers\AdminController::class, 'course'])->name('course');
    Route::post('/manage/course', [App\Http\Controllers\AdminController::class, 'coursePost'])->name('coursePost');
    Route::get('/course/{id}/delete', [App\Http\Controllers\AdminController::class, 'deleteCourse'])->name('deleteCourse');
    Route::get('/edit/course/{id}', [App\Http\Controllers\AdminController::class, 'editCourse'])->name('editCourse');
    Route::post('/edit/course/{id}', [App\Http\Controllers\AdminController::class, 'editCoursePost'])->name('editCoursePost');
    Route::get('/course/{id}/publish', [App\Http\Controllers\AdminController::class, 'publishCourse'])->name('publishCourse');
    Route::get('/course/{id}/unpublish', [App\Http\Controllers\AdminController::class, 'unpublishCourse'])->name('unpublishCourse');

    Route::get('/bulk/course/upload', [App\Http\Controllers\ExcelCSVController::class, 'bulkCourse'])->name('bulkCourse');
    Route::post('/importExcelCSVEdutainment', [ExcelCSVController::class, 'importExcelCSVEdutainment']);
    Route::post('/importExcelCSVAcademic', [ExcelCSVController::class, 'importExcelCSVAcademic']);



    Route::get('/manage/users', [App\Http\Controllers\AdminController::class, 'getAllUsers'])->name('getAllUsers');
    Route::get('/user/{id}/delete', [App\Http\Controllers\AdminController::class, 'deleteUser'])->name('deleteUser');
    Route::get('/user/{id}/view', [App\Http\Controllers\AdminController::class, 'viewUser'])->name('viewUser');
    Route::get('/user/{id}/activate', [App\Http\Controllers\AdminController::class, 'activateUser'])->name('activateUser');
    Route::get('/user/{id}/deactivate', [App\Http\Controllers\AdminController::class, 'deactivateUser'])->name('deactivateUser');


    Route::get('/manage/contact', 'App\Http\Controllers\AdminController@getContacts')->name('getContacts');

    Route::get('/manage/newsletter', 'App\Http\Controllers\AdminController@getNewsletter')->name('getNewsletter');

    Route::get('/manage/gamifications', [App\Http\Controllers\AdminController::class, 'gamifications'])->name('gamifications');
    Route::post('/manage/gamifications', [App\Http\Controllers\AdminController::class, 'gamificationsPost'])->name('gamificationsPost');
    Route::get('/gamification/{id}/delete', [App\Http\Controllers\AdminController::class, 'deleteGamification'])->name('deleteGamification');
    Route::get('/gamification/{id}/publish', [App\Http\Controllers\AdminController::class, 'publishGamification'])->name('publishGamification');
    Route::get('/gamification/{id}/unpublish', [App\Http\Controllers\AdminController::class, 'unpublishGamification'])->name('unpublishGamification');

    Route::get('/badges', [App\Http\Controllers\AdminController::class, 'addBadges'])->name('addBadges');
    Route::post('/badges', [App\Http\Controllers\AdminController::class, 'addBadgesPost'])->name('addBadgesPost');
    Route::get('/badge/{id}/delete', [App\Http\Controllers\AdminController::class, 'deleteBadge'])->name('deleteBadge');


    Route::get('/testimonial', [App\Http\Controllers\AdminController::class, 'addtestimonial'])->name('addtestimonial');
    Route::post('/testimonial', [App\Http\Controllers\AdminController::class, 'testimonialPost'])->name('testimonialPost');
    Route::get('/testimonial/{id}/delete', [App\Http\Controllers\AdminController::class, 'deletetestimonial'])->name('deletetestimonial');
    Route::get('/edit/testimonial/{id}', [App\Http\Controllers\AdminController::class, 'editTestimonial'])->name('editTestimonial');
    Route::post('/edit/testimonial/{id}', [App\Http\Controllers\AdminController::class, 'editTestimonialPost'])->name('editTestimonialPost');

    Route::any('/search/course', [App\Http\Controllers\AdminController::class, 'courseSearch'])->name('courseSearch');


    Route::get('/getAllGamifiedUsers', [App\Http\Controllers\AdminController::class, 'getAllGamifiedUsers'])->name('getAllGamifiedUsers');



    
}); 
Route::get('/admin/testing', [App\Http\Controllers\WelcomeController::class, 'testing'])->name('testing');

Route::post('/showDetails', [App\Http\Controllers\WelcomeController::class, 'showDetails'])->name('showDetails');
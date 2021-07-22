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

////////////Frontend
Route::get('','HomeController@Index')->name('Home');
Route::get('category/{slug}','HomeController@Category')->name('Category');
Route::get('detail-story/{slug}','HomeController@DetailStory')->name('DetailStory');
Route::get('chapter-detail/{slug}','HomeController@ChapterDetail')->name('ChapterDetail');
Route::get('search','HomeController@Search');





////////////Backend
Route::get('login','AdminController@GetLogin')->middleware('CheckLogout');
Route::post('login','AdminController@PostLogin');

Route::group(['prefix' => 'admin','middleware'=>'CheckLogin'], function() {
    route::get('','AdminController@ShowDashboard')->name('dashboard');

    ////category
    Route::group(['prefix' => 'category'], function() {
        route::get('','CategoryController@Index')->name('IndexCategory');
        route::get('create','CategoryController@Create')->name('CreateCategory');
        route::post('create','CategoryController@Store');
        route::get('edit/{id}','CategoryController@Edit')->name('EditCategory');
        route::post('edit/{id}','CategoryController@Update');
        route::get('destroy/{id}','CategoryController@Destroy');
    });

    ////story
    Route::group(['prefix' => 'story'], function() {
        route::get('','StoryController@Index')->name('IndexStory');
        route::get('create','StoryController@Create')->name('CreateStory');
        route::post('create','StoryController@Store');
        route::get('edit/{id}','StoryController@Edit')->name('EditStory');
        route::post('edit/{id}','StoryController@Update');
        route::get('destroy/{id}','StoryController@Destroy')->name('DestroyStory');
        route::get('chapter-list/{id}','StoryController@ChapterList')->name('ChapterList');
        route::get('story-of-category/{id}','StoryController@StoryOfCategory')->name('StoryOfCategory');

        
    });

    /// chapter
    Route::group(['prefix' => 'chapter'], function() {
        route::get('','ChapterController@Index')->name('IndexChapter');
        route::get('create','ChapterController@Create')->name('CreateChapter');
        route::post('create','ChapterController@Store');
        route::get('edit/{id}','ChapterController@Edit')->name('EditChapter');
        route::post('edit/{id}','ChapterController@Update');
        route::get('destroy/{id}','ChapterController@Destroy')->name('DestroyChapter');
    });

    //// user
    Route::group(['prefix' => 'user'], function() {
        route::get('','UserController@Index')->name('IndexUser');
        route::get('create','UserController@Create')->name('CreateUser');
        route::post('create','UserController@Store');
        route::get('edit/{id}','UserController@Edit')->name('EditUser');
        route::post('edit/{id}','UserController@Update');
        route::get('destroy/{id}','UserController@Destroy')->name('DestroyUser');
    });
    

    Route::get('logout','AdminController@Logout')->name('logout');

});


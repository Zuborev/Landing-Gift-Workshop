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

Route::auth();

Route::get('/','IndexController@execute')->name('home');
Route::post('/send','IndexController@sendmail')->name('send');

Route::get('/page/{alias}', 'PageController@execute')->name('pages');



//admin
Route::group(['prefix'=>'admin', 'middleware'=>'auth'], function () {
  Route::get('/', function () {

  });
 //admin/pages
  Route::group(['prefix'=>'pages'], function() {
        //admin/pages
      Route::get('/', ['uses'=>'PagesController@execute', 'as'=>'page']);
        //admin/pages/add
      Route::match(['get','post'],'/add', ['uses'=>'PagesAddController@execute', 'as' => 'pagesAdd']);
        //admin/edit/2
      Route::match(['get','post', 'delete'],'/edit/{page}', ['uses'=>'PagesEditController@execute', 'as' => 'pagesEdit']);
  });

   Route::group(['prefix'=>'portfolios'], function() {
        Route::get('/', ['uses'=>'PortfolioController@execute', 'as'=>'portfolios']);
        Route::match(['get','post'],'/add', ['uses'=>'PortfolioAddController@execute', 'as' => 'portfolioAdd']);
        Route::match(['get','post', 'delete'],'/edit/{portfolio}', ['uses'=>'PortfolioEditController@execute', 'as' => 'portfolioEdit']);
    });

    Route::group(['prefix'=>'services'], function() {
        Route::get('/', ['uses'=>'ServiceController@execute', 'as'=>'services']);
        Route::match(['get','post'],'/add', ['uses'=>'ServiceAddController@execute', 'as' => 'serviceAdd']);
        Route::match(['get','post', 'delete'],'/edit/{service}', ['uses'=>'ServiceEditController@execute', 'as' => 'serviceEdit']);
    });

});


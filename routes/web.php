<?php

use Illuminate\Support\Facades\Route;


// FrontendController Start
Route::get('/', 'FrontendController@index');
Route::get('/about', 'FrontendController@about');
Route::get('/contact', 'FrontendController@contact');
// END FrontendController

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/faq', 'FaqController@index')->name('faq_index');
Route::post('/faq/post', 'FaqController@faq_insert')->name('faq_insert');
Route::get('/faq/delete/{faq_id}', 'FaqController@faq_delete');

<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'HomeController@getIndex');

Route::get('register', 'Auth\AuthController@getRegister');
Route::post('register', 'Auth\AuthController@postRegister');

Route::get('login', 'Auth\AuthController@getLogin');
Route::post('login', 'Auth\AuthController@postLogin');
Route::get('logout', 'Auth\AuthController@getLogout');

Route::get('topic/new', 'TopicController@getNewTopic')->middleware('auth');
Route::post('topic/new', 'TopicController@postNewTopic')->middleware('auth');
Route::post('topic/store', 'TopicController@postStoreTopic')->middleware('auth');
Route::get('topic/complete/{id}', 'TopicController@getCompleteTopic')->middleware('auth');
Route::get('topic/{id}', 'TopicController@getTopicDetail');

Route::get('link/new', 'LinkController@getNewLink')->middleware('auth');
Route::post('link/new', 'LinkController@postNewLink')->middleware('auth');
Route::post('link/store', 'LinkController@postStoreLink')->middleware('auth');
Route::get('link/complete/{id}', 'LinkController@getCompleteLink')->middleware('auth');

Route::get('comment/new/{topic_id}', 'CommentController@getNewComment')->middleware('auth');
Route::post('comment/new', 'CommentController@postNewComment')->middleware('auth');
Route::post('comment/store', 'CommentController@postStoreComment')->middleware('auth');
Route::get('comment/complete/{topic_id}/{comment_id}', 'CommentController@getCompleteComment')->middleware('auth');

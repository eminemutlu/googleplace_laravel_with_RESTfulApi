<?php



Route::get('/','GuzzleController@getindex');
Route::get('home','GuzzleController@getindex');

Route::get('ajaxRequest', 'APIBaseController@ajaxrequest');
Route::post('ajaxRequest', 'GuzzleController@postNew');

Route::get('search','PostAPIController@search');
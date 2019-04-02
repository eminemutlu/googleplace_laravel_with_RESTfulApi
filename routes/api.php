<?php

use Illuminate\Http\Request;

Route::get('address', 'PostAPIController@listAlldata');
Route::get('search', 'PostAPIController@search');
Route::post('address', 'GuzzleController@postNew');
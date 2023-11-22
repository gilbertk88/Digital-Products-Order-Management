<?php

use Themosis\Support\Facades\Route;

/**
 * Plugin custom routes.
*/

 Route::get('/welcome/', function(){

    return 'Welcome';

 });

Route::match( ['get','post'],'tttt','Pages@home' );

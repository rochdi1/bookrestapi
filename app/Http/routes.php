<?php // \app\http\routes.php
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
// CORS
header('Access-Control-Allow-Origin: http://localhost:4200/');
header('Access-Control-Allow-Credentials: true');
//All routes below
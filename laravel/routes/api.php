<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
       //method URL -can be anything
       //Controller->method
/*$router->post("bookurl", "Books@store");*/


$router->group(["prefix" => "bookurl"], function ($router) {

    $router->post("", "Books@store");

    $router->get("", "Books@index");// get all book

    $router->get("/{book_id}", "Books@show");// need to use 'show' method to get a single book

    $router->put("/{book_id}", "Books@update"); // update selected id book - url/idnumber

    $router->delete("/{book_id}", "Books@destroy");
});

$router->group(["prefix" => "authors"], function ($router) {
    // ...article routes
    // comment routes
    $router->post("", "Authors@store");
    $router->get("", "Authors@index"); // get all authors 
    $router->get("/{author_id}", "Authors@show");
    $router->get("/{author_id}/books", "Authors@show_books");

    $router->put("/{author_id}", "Authors@update");
    $router->delete("/{author_id}", "Authors@destroy");
});







$router->group(["prefix" => "CDurl"], function ($router) {
    // create an article
    $router->post("", "CD_control@store");
    // show all articles
    $router->get("", "CD_control@index");
    // show a specific article
    $router->get("{article}", "CD_control@show");
  });



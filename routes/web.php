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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/about', function () {
//     return 'Hi About Page';
// });

// Route::get('/contact', function () {
//     return 'Hi Contact Page';
// }); 

// Route::get('/post/{id}/{name}', function ($id, $name) {
//     return 'This is post number ' . $id . ' ' .$name;
// });

// Route::get('admin/posts/example', array('as' => 'admin.home', function () {
//     $url = route('admin.home');
//     return 'this url is ' . $url;
// }));

// Route::resource('posts', 'PostsController');
// Route::get('/contact', 'PostsController@contact');
// Route::get('/post/{id}/{name}', 'PostsController@show_post');


/**
 *  
 * Fundamental DB Raw SQL Queries
 * use ? for values with PDO
 */

use Illuminate\Support\Facades\DB;

Route::get('/insert', function() {
    
    DB::insert('insert into posts (title, content) values(?, ?)', ['PHP with Laravel', 'Laravel is great!']);

});

Route::get('/read', function(){
    $results = DB::select('select * from posts where id = ?', [1]);
    
    foreach($results as $result){
        return $result->title;
    }
});

Route::get('/update', function(){
    $updated = DB::update('update posts set title = "Updated title" where id = ?', [1]);
    return $updated;
});

Route::get('/delete', function(){
    $deleted = DB::delete('delete from posts where id = ?', [1]);
    return $deleted;
});
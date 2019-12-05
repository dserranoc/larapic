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

// use App\Image;

Route::get('/', function () {
/*
    $images = Image::all();

    foreach($images as $image){

        echo $image->image_path.'<br>';
        echo $image->description.'<br>';
        echo $image->user->name.' '.$image->user->surname.'<br>';

        if (count($image->comments) >= 1) {
            
                    echo "<h4>Comentarios: </h4>";
                    foreach($image->comments as $comment){
                        echo $comment->user->name.' '.$comment->user->surname.': ';
                        echo $comment->content."<br>";
                    }


        }


        echo 'Likes: '.count($image->likes);

        echo "<hr>";
    }
    die();
    */


    return view('welcome');
});

// RUTAS GENERALES

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

// RUTAS DE USUARIO

Route::post('/user/update', 'UserController@update')->name('user.update');
Route::get('/user/avatar/{filename}', 'UserController@getImage')->name('user.avatar');
Route::get('/settings', 'UserController@config')->name('settings');
Route::get('/profile/{id}', 'UserController@profile')->name('user.profile');
Route::get('/people/{search?}', 'UserController@index')->name('user.index');

// RUTAS DE IMAGEN
Route::get('/upload', 'ImageController@create')->name('image.create');
Route::post('/image/save', 'ImageController@save')->name('image.save');
Route::get('/image/file/{filename}', 'ImageController@getImage')->name('image.file');
Route::get('/image/{id}', 'ImageController@detail')->name('image.detail');
Route::get('/image/edit/{id}', 'ImageController@edit')->name('image.edit');
Route::get('/image/delete/{id}', 'ImageController@delete')->name('image.delete');
Route::post('/image/update', 'ImageController@update')->name('image.update');

// RUTAS DE COMENTARIOS
Route::post('/comment/save', 'CommentController@save')->name('comment.save');
Route::get('/comment/delete/{id}', 'CommentController@delete')->name('comment.delete');

// RUTAS DE LIKES
Route::get('/like/{image_id}', 'LikeController@like')->name('like.save');
Route::get('/dislike/{image_id}', 'LikeController@dislike')->name('like.delete');
Route::get('/likes', 'LikeController@index')->name('like.index');
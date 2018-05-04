<?php
use Orchid\Platform\Core\Models\Post;
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

Route::bind('blog', function ($value) {
    return Post::where('slug', $value)
        ->type('blog')
        ->with(['attachment'])
        ->firstOrFail();
});

$router->get('/','BlogController@index');

$router->get('/{blog}','BlogController@show')
    ->where('blog','^(?!dashboard).*$')
    ->name('blog.post');

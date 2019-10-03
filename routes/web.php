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

Route::get('/', 'HomeController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/admin', 'AdminController@index')->name('admin');
Route::resource('/channels', 'ChannelsController');
Route::resource('/admin/channels', 'AdminChannelsController', ['as'=>'admin']);
Route::put('/admin/channels/{id}/activation', 'AdminChannelsController@activation')->name('admin.channels.activation');
Route::resource('/magazines', 'MagazinesController');
Route::resource('/admin/magazines', 'AdminMagazinesController', ['as'=>'admin']);
Route::put('/admin/magazines/{id}/activation', 'AdminMagazinesController@activation')->name('admin.magazines.activation');
Route::resource('/magazines/{magazine_id}/articles', 'ArticlesController');
Route::get('/articles/create', 'ArticlesController@createArticle')->name('create_article');
Route::resource('/admin/articles', 'AdminArticlesController', ['as'=>'admin']);
Route::put('/admin/articles/{article}/activation', 'AdminArticlesController@activation')->name('admin.articles.activation');
Route::resource('/admin/categories', 'AdminCategoriesController', ['as'=>'admin']);
Route::resource('/admin/users', 'AdminUsersController', ['as'=>'admin']);
Route::get('/categories/{category}', 'CategoriesController@show')->name('categories.show');
Route::get('/articles/{article_id}/photos', 'PhotosController@create')->name('photos.create');
Route::post('/articles/{article_id}/photos', 'PhotosController@store')->name('photos.store');
Route::resource('/admin/sponsors', 'AdminSponsorsController', ['as'=>'admin']);
Route::get('/admin/magazines/{magazine_id}/sponsors', 'AdminMagazinesController@addSponsor')->name('magazine.sponsors');
Route::put('/admin/magazines/{magazine_id}/attach/{sponsor_id}', 'AdminMagazinesController@attachSponsor')->name('sponsor.attach');
Route::put('/admin/magazines/{magazine_id}/detach/{sponsor_id}', 'AdminMagazinesController@detachSponsor')->name('sponsor.detach');
Route::resource('/articles/{article_id}/comments', 'CommentsController');
Route::resource('/admin/comments', 'AdminCommentsController', ['as'=>'admin']);
Route::resource('/comments/{comment_id}/replies', 'RepliesController');
Route::resource('/admin/replies', 'AdminRepliesController', ['as'=>'admin']);
Route::post('/pdf', 'MagazinesController@show_pdf')->name('pdf.show');
Route::get('/contact', 'ContactsController@index')->name('contact');
Route::get('/archives/{year}/{month}', 'ArticlesController@show_archives')->name('archives.show');
Route::get('/authors', 'AuthorsController@index')->name('authors');
Route::get('/admin/login', 'AdminController@showAdminLogin');
Route::resource('/authors', 'AuthorsController');
Route::resource('/sponsors', 'SponsorsController');
Route::resource('/sites', 'SitesController');
Route::resource('/admin/sites', 'AdminSitesController', ['as'=>'admin']);
Route::get('/profile', 'AuthorsController@profile')->name('profile');
Route::get('/articles_title', 'MagazinesController@latest');
Route::get('/add_title/{id}', 'MagazinesController@add_title');
Route::get('/show_all', 'ArticlesController@show_all');
Route::get('/show_hotest', 'ArticlesController@show_hotest');
Route::get('/show_category/{category_name}', 'ArticlesController@show_category');





// Route::get('/channels/{id}/magazines/create', 'MagazinesController@create');
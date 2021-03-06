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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/admin', function () {
    return redirect('admin/index');
});
Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => ['auth', 'auth.admin']], function () {
    Route::get('/login', function () {
        return view('admin/login');
    });

    Route::get('index', 'IndexController@index');
    Route::get('dashboard', 'IndexController@dashboard');

    // 权限管理
    Route::group(['prefix' => 'permission'], function () {
        Route::any('index', 'PermissionController@index');
        Route::any('add', 'PermissionController@add');
        Route::any('edit/{id}', 'PermissionController@edit');
        Route::any('del', 'PermissionController@del');
        Route::any('get-sub-perm/{id}', 'PermissionController@getSubPerm');
    });

    // 角色管理
    Route::group(['prefix' => 'role'], function () {
        Route::any('index', 'RoleController@index');
        Route::any('show/{id}', 'RoleController@show');
        Route::any('add', 'RoleController@add');
        Route::any('edit/{id}', 'RoleController@edit');
        Route::any('del', 'RoleController@del');
        Route::any('{id}', 'RoleController@getInfo');
    });

    // 管理员
    Route::group(['prefix' => 'user'], function () {
        Route::any('index', 'UsersController@index');
        Route::any('add', 'UsersController@add');
        Route::any('edit/{id}', 'UsersController@edit');
        Route::any('del', 'UsersController@del');
    });

    // 菜单管理
    Route::group(['prefix' => 'menu'], function () {
        Route::any('index', 'MenuController@index');
        Route::any('add', 'MenuController@add');
        Route::any('edit/{id}', 'MenuController@edit');
        Route::any('del', 'MenuController@del');
        Route::any('get-sub-menu/{id}', 'MenuController@getSubMenu');
    });

    // 产品
    Route::group(['prefix' => 'product'], function () {
        Route::any('index', 'ProductController@index');
        Route::any('add', 'ProductController@add');
        Route::any('edit/{id}', 'ProductController@edit');
        Route::any('del', 'ProductController@del');
        Route::any('get-sub-class/{id}', 'ProductController@getSubClass');
    });

    // 订单
    Route::group(['prefix' => 'order'], function () {
        Route::any('index','OrderController@index');
        Route::any('detail/{id}','OrderController@detail');
    });

});

Route::group(['namespace' => 'Wap', 'prefix' => 'wap', 'middleware' => ['wechat.oauth']], function () {
    Route::get('wxpay', 'PaymentController@wxpay');
    Route::get('my-order', 'Mycontroller@order');
    Route::get('ajax-order', 'Mycontroller@ajaxOrder');

});

Route::get('logout', 'Auth\LoginController@logout')->name('logout');



//
//Route::get('/show', function () {
//    echo '<img src="' . asset('storage/1.jpg') . '" />';
//});
//
//Route::get('/image', function () {
//    // open an image file
//    $img = Image::make('public/foo.jpg');
//
//    // resize image instance
//    $img->resize(320, 240);
//
//    // insert a watermark
//    $img->insert('public/watermark.png');
//
//    // save image in desired format
//    $img->save('public/bar.jpg');
//
//});
//
//Route::get('excel', 'ExcelController@export');
//Route::get('import', 'ExcelController@import');


Auth::routes();

Route::get('/home', 'HomeController@index');

Auth::routes();

Route::get('/home', 'HomeController@index');

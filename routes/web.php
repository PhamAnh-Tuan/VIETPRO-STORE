<?php

use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Schema;

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
Route::get('login', 'LoginController@LoginGet')->name('login.get');
Route::post('/login', 'LoginController@LoginPost');

Route::group(['prefix' => 'trang-quản-trị','namespace'=>'Admin'], function () {
    Route::get('', 'AdminController@index')->name('admin.index');
    // Product
    Route::group(['prefix' => 'sản-phẩm', 'namespace'=>'Product'], function () {
        Route::get('danh-sách-sản-phẩm', 'ProductController@index')->name('product.index');
        Route::get('thêm-mới-sản-phẩm.html', 'ProductController@create')->name('product.create');
        Route::get('chỉnh-sửa-chi-tiết-sản-phẩm.html', 'ProductController@edit')->name('product.edit');
        Route::get('xóa-sản-phẩm', 'ProductController@delete')->name('product.delete');
    });
    // Category
    Route::group(['prefix' => 'danh-mục', 'namespace'=>'Category'], function () {
        Route::get('danh-sách-danh-mục.html', 'CategoryController@index')->name('category.index');
        Route::get('chỉnh-sửa-danh-mục.html', 'CategoryController@edit')->name('category.edit');
        Route::get('xóa-danh-mục.html', 'CategoryController@delete')->name('category.delete');

    });
    // Users
    Route::group(['prefix' => 'quản-trị-viên', 'namespace'=>'User'], function () {
        Route::get('', 'UserController@index')->name('user.index');
        Route::get('thêm-mới-quản-trị.html', 'UserController@create')->name('user.create');
        Route::post('thêm-mới-quản-trị.html', 'UserController@createPost')->name('user.createPost');
        Route::get('chỉnh-sửa-quản-trị/{id}', 'UserController@edit')->name('user.edit');
        Route::post('update/{id}', 'UserController@editpost')->name('user.edit_post');
        Route::get('xóa-quản-trị', 'UserController@delete')->name('user.delete');
    });
    // Order
    Route::group(['prefix' => 'đơn-hàng', 'namespace'=>'Order'], function () {
        Route::get('danh-sách-đơn-hàng.html', 'OrderController@index')->name('order.index');
        Route::get('chi-tiết-đơn-hàng.html', 'OrderController@detail')->name('order.detail');
        Route::get('đơn-hàng-đã-hoàn-thành.html', 'OrderController@processed')->name('order.processed');
    });
});
// Site
Route::group(['namespace'=>'Site'], function () {
    Route::get('','SiteController@index')->name('site.index');
    Route::get('về-cửa-hàng','SiteController@about')->name('site.about');
    Route::get('liên-hệ','SiteController@contact')->name('site.contact');
    // Product
    Route::group(['prefix' => 'sản-phẩm','namespace'=>'Product'], function () {
        Route::get('', 'ProductController@shop')->name('site.product');
        Route::get('chi-tiết-sản-phẩm', 'ProductController@detail')->name('site.detail');
    });
    // Cart
    Route::group(['prefix' => 'giỏ-hàng','namespace'=>'Cart'], function () {
        Route::get('', 'CartController@cart')->name('site.cart');
        Route::get('thanh-toán-đơn-hàng', 'CartController@checkout')->name('site.checkout');
    });
});

// Schema-migration-seeder
Route::group(['prefix' => 'schema'], function () {
    // create table
    Route::get('create-users', function () {
        Schema::create('users',function($table){
            $table->increments('id');
            $table->string('fullName');
            $table->string('address')->nullable();
            $table->tinyInteger(('level'))->unsigned();
            $table->timestamps();
        });
    });
    // rename table
    Route::get('rename', function () {
        Schema::rename('users','user');
    });
    // Drop table
    Route::get('drop-table', function () {
        Schema::dropIfExists('info');
    });
    // add colum
    Route::get('create-email-col', function () {
        Schema::table('users', function($table){
            $table->string('email')->nullable();
        });
    });
    // Edit colum table
    Route::get('rename-colum-table', function () {
        Schema::table('users', function($table){
            $table->renameColumn('email', 'description');
        });
    });
    // Thay đổi thuốc tính cột
    route::get('change', function(){
        Schema::table('users',function($table){
            $table->string('description', 50)->change();
        });
    });
    // Drop colum
    Route::get('drop-colum', function () {
        Schema::table('users',function($table){
            $table->dropColumn('description');
        });
    });
    // Add Foreign
    Route::get('create-info', function () {
        Schema::create('info', function($table){
            $table->increments('id');
            $table->integer('users_id')->unsigned();
            $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade');
        });
    });
    // Drop foreign
    Route::get('drop-foreign-key', function () {
        Schema::table('info', function($table){
            $table->dropForeign(['users_id']);
        });
    });
});

// Query Builder
Route::group(['prefix' => 'query-builder'], function () {
    // all
    Route::get('get-all', function () {
        $data=DB::table('users')->get();
        echo "<pre>";
        print_r($data);
        echo "<pre/>";

        foreach ($data as $user) {
            // echo $user['fullname']."<br/>";
            echo $user->user_fullname;
        }
    });

    // select
    Route::get('get-select', function () {
        $data=DB::table('users')->select('user_fullname','user_phone')->get();
        echo "<pre>";
        print_r($data);
        echo "<pre/>";
    });

    // where
    Route::group(['prefix' => 'where'], function () {
        // So sanh bang
        Route::get('so-sanh-bang', function () {
            $data=DB::table('users')->where('user_level','=','1')->get();
            echo "<pre>";
            print_r($data);
            echo "<pre/>";
        });

        // So sanh nho hon
        Route::get('so-sanh-nho-hon', function () {
            $data=DB::table('users')->where('user_level','<','2')->get();
            echo "<pre>";
            print_r($data);
            echo "<pre/>";
        });
        // So sanh khac
        Route::get('so-sanh-khac', function () {
            $data=DB::table('users')->where('user_level','<>','1')->get();
            echo "<pre>";
            print_r($data);
            echo "<pre/>";
        });

        // Where end
        Route::get('where-end', function () {
            $data=DB::table('users')->where('user_level','=','1')->where('user_address','=','ha noi')->get();
            echo "<pre>";
            print_r($data);
            echo "<pre/>";
        });

        // Where or
        Route::get('where-or', function () {
            $data=DB::table('users')->where('user_level','=','3')->orwhere('user_address','=','hung yen')->get();
            echo "<pre>";
            print_r($data);
            echo "<pre/>";
        });

        // Where like
        Route::get('where-like', function () {
            $data=DB::table('users')->where('user_fullname','like','%huy%')->get();
            echo "<pre>";
            print_r($data);
            echo "<pre/>";
        });

        // Where Between
        Route::get('where-Between', function () {
            $data=DB::table('products')->whereBetween('prd_price',[100,5000])->get();
            echo "<pre>";
            print_r($data);
            echo "<pre/>";
        });

        //  whereNotBetween
        Route::get('where-NotBetween', function () {
            $data=DB::table('products')->whereNotBetween('prd_price',[100,5000])->get();
            echo "<pre>";
            print_r($data);
            echo "<pre/>";
        });
    });

    // Join
    Route::group(['prefix' => 'join'], function () {
        Route::get('', function () {
            $data=DB::table('users')
                ->join('info','users.user_id','=','info.user_id')
                ->where('user_fullname','=','quản trị xinh tri')->get();
            echo "<pre>";
            print_r($data);
            echo "<pre/>";
        });

        // left join

    });
    
    

});
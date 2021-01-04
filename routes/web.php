<?php

use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Schema;
use App\Models\User;
use App\Models\Categories;
use App\Models\Info;
use App\Models\Order;
use App\Models\Products;
use App\Models\OrderDetail;
use GuzzleHttp\Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

Route::get('agolia', function () {
    return view('algolia');
});

Route::get('login', 'LoginController@LoginGet')->name('login')->middleware('CheckLogout');
Route::post('login-post', 'LoginController@LoginPost')->name('login.post');
Route::get('logout', 'LoginController@LogOut')->name('logout');

// Login FB
Route::get('/login/facebook', 'Auth\LoginController@redirectToProvider')->name('login.fb');
Route::get('/login/facebook/callback', 'Auth\LoginController@handleProviderCallback');



Route::group(['prefix' => 'trang-quản-trị', 'namespace' => 'Admin', 'middleware' => 'Login'], function () {
    Route::get('', 'AdminController@index')->name('admin.index');
    // Product
    Route::group(['prefix' => 'sản-phẩm', 'namespace' => 'Product'], function () {
        Route::get('danh-sách-sản-phẩm', 'ProductController@index')->name('product.index');
        Route::get('danh-sách-sản-phẩm/{id}', 'ProductController@search')->name('product.serch');
        Route::get('thêm-mới-sản-phẩm.html', 'ProductController@create')->name('product.create');
        Route::post('thêm-mới-sản-phẩm', 'ProductController@createPOST')->name('product.createPOST');
        Route::get('chỉnh-sửa-chi-tiết-sản-phẩm/{id}', 'ProductController@edit')->name('product.edit');
        Route::post('update-san-pham/{id}', 'ProductController@editPost')->name('product.editPost');
        Route::get('xóa-sản-phẩm/{id}', 'ProductController@delete')->name('product.delete');
       
    });
    // Category
    Route::group(['prefix' => 'danh-mục', 'namespace' => 'Category'], function () {
        Route::get('danh-sách-danh-mục.html', 'CategoryController@index')->name('category.index');
        Route::post('danh-sách-danh-mục-create.html', 'CategoryController@create')->name('category.create');
        Route::get('chỉnh-sửa-danh-mục/{id}', 'CategoryController@edit')->name('category.edit');
        Route::post('chỉnh-sửa-danh-mục-post/{id}', 'CategoryController@editPost')->name('category.editPOST');
        Route::get('xóa-danh-mục/{id}', 'CategoryController@delete')->name('category.delete');
    });
    // Users
    Route::group(['prefix' => 'quản-trị-viên', 'namespace' => 'User'], function () {
        Route::get('', 'UserController@index')->name('user.index');
        Route::get('thêm-mới-quản-trị.html', 'UserController@create')->name('user.create');
        Route::post('thêm-mới-quản-trị.html', 'UserController@createPost')->name('user.createPost');
        Route::get('chỉnh-sửa-quản-trị/{id}', 'UserController@edit')->name('user.edit');
        Route::post('update/{id}', 'UserController@editpost')->name('user.edit_post');
        Route::get('xóa-quản-trị/{id}', 'UserController@delete')->name('user.delete');
        Route::get('users/export/', 'UserController@export_fromview')->name('user.excel');
    });
    // Order
    Route::group(['prefix' => 'đơn-hàng', 'namespace' => 'Order'], function () {
        Route::get('danh-sách-đơn-hàng.html', 'OrderController@index')->name('order.index');
        Route::get('chi-tiết-đơn-hàng/{id}', 'OrderController@detail')->name('order.detail');
        Route::get('processed/{id}', 'OrderController@Detail_processed')->name('Detail_processed');
        Route::get('đơn-hàng-đã-hoàn-thành.html', 'OrderController@processed')->name('order.processed');
    });
});
// Site
Route::group(['namespace' => 'Site'], function () {
    Route::get('', 'SiteController@index')->name('site.index');
    // Route::get('','SiteController@product_hot')->name('site.product_hot');

    Route::get('về-cửa-hàng', 'SiteController@about')->name('site.about');
    Route::get('liên-hệ', 'SiteController@contact')->name('site.contact');
    // Product
    Route::group(['prefix' => 'sản-phẩm', 'namespace' => 'Product'], function () {
        Route::get('', 'ProductController@shop')->name('site.product');
        Route::get('chi-tiết-sản-phẩm', 'ProductController@detail')->name('site.detail');
    });
    // Cart
    Route::group(['prefix' => 'giỏ-hàng', 'namespace' => 'Cart'], function () {
        Route::get('', 'CartController@cart')->name('site.cart');
        Route::get('thanh-toán-đơn-hàng', 'CartController@checkout')->name('site.checkout');
    });
});

// Schema-migration-seeder
Route::group(['prefix' => 'schema'], function () {
    // create table
    Route::get('create-users', function () {
        Schema::create('users', function ($table) {
            $table->increments('id');
            $table->string('fullName');
            $table->string('address')->nullable();
            $table->tinyInteger(('level'))->unsigned();
            $table->timestamps();
        });
    });
    // rename table
    Route::get('rename', function () {
        Schema::rename('users', 'user');
    });
    // Drop table
    Route::get('drop-table', function () {
        Schema::dropIfExists('info');
    });
    // add colum
    Route::get('create-email-col', function () {
        Schema::table('orders', function ($table) {
            $table->integer('ord_state');
        });
    });
    // Edit colum table
    Route::get('rename-colum-table', function () {
        Schema::table('users', function ($table) {
            $table->renameColumn('remenber_token', 'remember_token');
        });
    });
    // Thay đổi thuốc tính cột
    route::get('change', function () {
        Schema::table('users', function ($table) {
            $table->string('description', 50)->change();
        });
    });
    // Drop colum
    Route::get('drop-colum', function () {
        Schema::table('orders', function ($table) {
            $table->dropColumn('ord_state');
        });
    });
    // Add Foreign
    Route::get('create-info', function () {
        Schema::create('info', function ($table) {
            $table->increments('id');
            $table->integer('users_id')->unsigned();
            $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade');
        });
    });
    // Drop foreign
    Route::get('drop-foreign-key', function () {
        Schema::table('info', function ($table) {
            $table->dropForeign(['users_id']);
        });
    });
    // Drop dataTable
    Route::get('drop-dataTable', function () {
        Products::truncate();
    });
});

// Query Builder
Route::group(['prefix' => 'query-builder'], function () {
    // all
    Route::get('get-all', function () {
        $data = DB::table('users')->get();
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
        $data = DB::table('users')->select('user_fullname', 'user_phone')->get();
        echo "<pre>";
        print_r($data);
        echo "<pre/>";
    });

    // where
    Route::group(['prefix' => 'where'], function () {
        // So sanh bang
        Route::get('so-sanh-bang', function () {
            $data = DB::table('users')->where('user_level', '=', '1')->get();
            echo "<pre>";
            print_r($data);
            echo "<pre/>";
        });

        // So sanh nho hon
        Route::get('so-sanh-nho-hon', function () {
            $data = DB::table('users')->where('user_level', '<', '2')->get();
            echo "<pre>";
            print_r($data);
            echo "<pre/>";
        });
        // So sanh khac
        Route::get('so-sanh-khac', function () {
            $data = DB::table('users')->where('user_level', '<>', '1')->get();
            echo "<pre>";
            print_r($data);
            echo "<pre/>";
        });

        // Where end
        Route::get('where-end', function () {
            $data = DB::table('users')->where('user_level', '=', '1')->where('user_address', '=', 'ha noi')->get();
            echo "<pre>";
            print_r($data);
            echo "<pre/>";
        });

        // Where or
        Route::get('where-or', function () {
            $data = DB::table('users')->where('user_level', '=', '3')->orwhere('user_address', '=', 'hung yen')->get();
            echo "<pre>";
            print_r($data);
            echo "<pre/>";
        });

        // Where like
        Route::get('where-like', function () {
            $data = DB::table('users')->where('user_fullname', 'like', '%huy%')->get();
            echo "<pre>";
            print_r($data);
            echo "<pre/>";
        });

        // Where Between
        Route::get('where-Between', function () {
            $data = DB::table('products')->whereBetween('prd_price', [100, 5000])->get();
            echo "<pre>";
            print_r($data);
            echo "<pre/>";
        });

        //  whereNotBetween
        Route::get('where-NotBetween', function () {
            $data = DB::table('products')->whereNotBetween('prd_price', [100, 5000])->get();
            echo "<pre>";
            print_r($data);
            echo "<pre/>";
        });
        // Select _where
        Route::get('selectWhere', function ($id) {
            $data = User::select('user_email')->where('user_id', '=', $id)->get();
            print_r($data);
        });
    });

    // Join
    Route::group(['prefix' => 'join'], function () {
        Route::get('', function () {
            $data = DB::table('users')
                ->join('info', 'users.user_id', '=', 'info.user_id')
                ->where('user_fullname', '=', 'quản trị xinh tri')->get();
            echo "<pre>";
            print_r($data);
            echo "<pre/>";
        });

        // left join

    });
});

// ORM
Route::group(['prefix' => 'ORM'], function () {
    // Lay tat ca danh sach
    Route::get('useList', 'Admin\User\UserController@useList');
    // Tim kiem
    Route::get('useFind/{id}', 'Admin\User\UserController@useFind');
    // Tim kiem + dieu kien
    Route::get('useFindWhere/{id}', 'Admin\User\UserController@useWhere');
    // Select
    Route::get('useSelect', 'Admin\User\UserController@useSelect');
    // Create
    Route::get('useCreate', 'Admin\User\UserController@useCreate');
    Route::get('useCreate_v1', 'Admin\User\UserController@useCreate_v1');
    //Update
    Route::get('userUpdate/{id}', 'Admin\User\UserController@userUpdate');
});

// relationship
Route::group(['prefix' => 'relationship'], function () {
    /** Quan hệ Relationship
     * Liên kết bảng chính với bảng phụ -> hasOne
     * Liên kết từ bảng phụ đến bảng chính -> belongsTo
     * Bảng chính chứa khóa chính
     * Bảng phụ chứa khóa ngoại
     */
    Route::group(['prefix' => 'one-to-one'], function () {
        /** Liên kết chính phụ tìm kiếm lấy thông tin 2 bảng
         * 
         */
        Route::get('/lien-ket-chinh-phu-tim-kiem', function () {
            $user = User::find(1);
            $info = $user->info;
            echo 'Người có tên: ' . $user->user_fullname . ' có số cmt là: ' . $info->cmt;
        });
        /** Liên kết chính phụ: Tìm kiếm + ĐK bên bảng phụ
         * Khi không có dữ lệu trả về, cụ thể cho id = 2(id = 2 địa chỉ là hà nội không đúng DK trong infoWhere)
         * Error: Trying to get property 'cmt' of non-object
         */
        Route::get('/lien-ket-chinh-phu-dieukien', function () {
            $user = User::find(2);
            $info = $user->infoWhere;
            echo 'Người có tên: ' . $user->user_fullname . ' có số cmt là: ' . $info->cmt;
        });
        /** Liên kết chính phụ lấy tất cả bản ghi bảng user + số cmt user bên bảng info
         * 
         */
        Route::get('/lien-ket-chinh-phu-lay-du-lieu-2-bang', function () {
            $user = User::all();
            foreach ($user as $item) {
                echo $item->user_fullname;
                echo '</br>';
                echo $item->info->cmt;
                echo '</br>';
                echo '</hr>';
            }
        });
        /** Liên kết chính phụ có điều kiện
         * 
         */
        Route::get('/lien-ket-chinh-phu-dieu-kien', function () {
            $user = User::where('user_fullname', '=', 'chu van huy')->get();
            foreach ($user as $item) {
                echo $item->user_fullname;
                echo '</br>';
                echo $item->info->cmt;
                echo '</br>';
                echo '</hr>';
            }
        });
        /** Liên kết phụ chính tìm kiếm + lấy thông tin 2 bảng
         * 
         */
        Route::get('/lien-ket-phu-chinh', function () {
            $info = Info::find(1);
            $user = $info->user;
            echo 'Số chứng minh thư ' . $info->cmt . ' thuộc về người có tên: ' . $user->user_fullname;
        });
        /** Lấy danh sách những người đc kết nối trong 2 bảng
         * 
         */
        Route::get('/lkp-c', function () {
            $users = Info::all();
            foreach ($users as $item) {
                echo $item->user->user_fullname;
                echo '<br/>';
                echo $item->cmt;
                echo '<br/>';
                echo '<hr/>';
            }
        });
    });
    Route::group(['prefix' => 'one-to-many'], function () {
        /** Liên kết chính phụ: Từ đơn hàng có ID = 1, lấy chi tiết đơn hàng đó
         * https://laravel.com/docs/8.x/eloquent-relationships#one-to-many
         */
        Route::get('/lkc-p', function () {
            $Orders = Order::find(1);
            $name = $Orders->ord_fullname;
            echo 'Khách hàng có tên ' . $Orders->ord_fullname . ' có chi tiết đơn hàng như sau: <br/>';
            foreach ($Orders->details as $item) {
                echo 'ord_detail_id: ' . $item->ord_detail_id . '<br/>';
                echo 'code: ' . $item->code . '<br/>';
                echo 'price: ' . $item->price . '<br/>';
                echo 'quantity: ' . $item->quantity . '<br/>';
                echo 'image: ' . $item->image . '<br/>';
                echo 'ord_id: ' . $item->ord_id . '<br/>';
                echo 'name: ' . $item->name . '<br/>';
                echo '<hr/>';
            }

            // Kiem tra su ton tai o bang phu
            //  $details = Order::has('details')->get();
            // print_r($details);
            // foreach ($details as $item) {
            //     echo $item->code . '</br>';
            // }
        });
        /** Liên kết chính phụ: Từ đơn hàng có ID = 1, lấy chi tiết đơn hàng đó + ĐK giá đơn hàng  > 5000
         * 
         */
        Route::get('/lkc-p-dieu-kien', function () {
            $order = Order::find(1);
            $details = $order->details()
                ->where('price', '>', '5000')
                ->get();
            foreach ($details as $item) {
                echo 'ord_detail_id: ' . $item->ord_detail_id . '<br/>';
                echo 'code: ' . $item->code . '<br/>';
                echo 'price: ' . $item->price . '<br/>';
                echo 'quantity: ' . $item->quantity . '<br/>';
                echo 'image: ' . $item->image . '<br/>';
                echo 'ord_id: ' . $item->ord_id . '<br/>';
                echo 'name: ' . $item->name . '<br/>';
                echo '<hr/>';
            }
        });
        // Liên kết chính phụ: Từ đơn hàng có ID = 1, lấy chi tiết đơn hàng đó + ĐK code = AS
        Route::get('/lkc-p-where', function () {
            $details = Order::find(1)->details()
                ->where('code', 'AS')
                ->get();
            //dd($details);
            echo $details;
        });
        /** Liên kết phụ chính: Từ chi tiết đơn hàng có ID = 1, Lấy thông tin khách hàng chủ đơn 
         * 
         */
        Route::get('/lkp-c/{id}', function ($id) {
            $ord_detail = OrderDetail::find($id);
            $ord = $ord_detail->order;
            echo 'Đơn hàng có ID = ' . $id . '</br>';
            echo 'Tên chủ đơn hàng: ' . $ord->ord_fullname . '</br>';
            echo 'Địa chỉ đơn hàng: ' . $ord->ord_address . '</br>';
            echo 'Email chủ đơn hàng: ' . $ord->ord_email . '</br>';
            echo 'Điện thoại chủ đơn hàng: ' . $ord->ord_phone . '</br>';
        });
    });
});

// Random
Route::group(['prefix' => 'random'], function () {
    /** https://laravel.com/docs/7.x/helpers
     * 
     */
    Route::get('', function () {
        $string = 'The event will take place between ? and ?';
        $replaced = Str::replaceArray('?', ['a', 'huy'], $string);
        dd($replaced);
    });
    // Lấy 5 ký tự ngẫu nhiên
    Route::get('random1', function () {
        dd(Str::random(5));
    });
    // Lấy ký tự theo quy định
    Route::get('ramdom-quy-uoc', function () {
        $pool = '0123456789';
        // $pool = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        dd(substr(str_shuffle(str_repeat($pool, 5)), 0, 2));
    });
});

// n-n
Route::get('lkcategory-product', function () {
    $category = Categories::find(12);
    $product = $category->productss;
    dd($product);
    // echo '<pre>';
    // print_r($product);
    foreach ($product as $key => $value) {
        echo $value->prd_id . '-' . $value->prd_name;
    }
});
Route::get('lkproduct-category', function () {
    $product = Products::find(1);
    $category = $product->categoryy;
    dd($category);
    foreach ($category as $key => $value) {
        echo $value->cat_id . '-' . $value->cat_name;
    }
});
Route::get('lkproduct-category1', function () {
    $product = Products::find(1);
    $category = $product->categoryy;
    dd($category);
    foreach ($category as $key => $value) {
        echo $value->cat_id . '-' . $value->cat_name;
    }
});

// atttach
Route::group(['prefix' => 'atttach'], function () {
    /** them 1 san pham voi mot danh muc
     * 
     */
    Route::get('add', function () {
        $product = Products::find(1);
        $product->categoryy()->attach(13);
        echo "da xu ly";
    });
    /** xoa 1 san pham voi mot danh muc
     * 
     */
    Route::get('remove', function () {
        $product = Products::find(1);
        $product->categoryy()->detach(13);
        echo "da xu ly";
    });
    /** them 1 san pham voi nhieu danh muc
     * 
     */
    Route::get('add-arr', function () {
        $product = Products::find(1);
        $product->categoryy()->attach([12, 13, 15]);
        echo "da xu ly";
    });
    /** xoa 1 san pham voi nhieu danh muc
     * 
     */
    Route::get('remove-arr', function () {
        $product = Products::find(1);
        $product->categoryy()->detach([12, 13, 15]);
        echo "da xu ly";
    });
    /** them cate id 12, 13, 16 con lai xoa het
     * 
     */
    Route::get('add-sync', function () {
        $product = Products::find(1);
        $product->categoryy()->sync([12, 13, 16]);
        echo "da xu ly";
    });
});

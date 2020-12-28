<?php

use App\Http\Controllers\Dashboard\ProductController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Product;
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

Route::get('/', function () {
    return view('welcome');
});


Route::group(['namespace' => 'Dashboard'], function () {
Route::match(['get', 'post'], '/admin/login','AdminController@login');
Route::group(['middleware'=>['admin']], function(){
        /*
        |--------------------------------------------------------------------------
        | Dashboard and Admin Controller Route Starts
        |--------------------------------------------------------------------------
        */

            Route::get('/dashboard', 'DashboardController@index')->name('dashboard.index');


            Route::get('/logout', 'AdminController@logout');
            Route::get('/admin/settings', 'AdminController@settings');
            Route::post('/admin/check-current-pwd', 'AdminController@checkCurrentPassword');
            Route::post('/admin/update-current-pwd', 'AdminController@updateCurrentPwd');
            Route::match(['get', 'post'],'/admin/update-details', 'AdminController@updateAdminDetails');

        /*
        |--------------------------------------------------------------------------
        | Dashboard and Admin Controller Route End
        |--------------------------------------------------------------------------
        */
        /*
        |--------------------------------------------------------------------------
        | Role Controller Route Starts
        |--------------------------------------------------------------------------
        */

            Route::get('/role/management', 'RoleController@index')->name('management.index');
            Route::post('/role/management', 'RoleController@addRole')->name('management.index');
            Route::get('/admin/delete-role/{id}', 'RoleController@deleteRole')->name('role.delete');
            Route::get('/role/user', 'RoleController@userDetails')->name('management.user');
            Route::post('/role/assign', 'RoleController@assignRole')->name('management.assig.role');
            Route::get('/role/edit/{id}', 'RoleController@editRole')->name('management.edit');
            Route::post('/role/change', 'RoleController@changePermission')->name('management.changePermission');
            Route::post('/user/create', 'AdminController@createUser')->name('management.createUser');
            Route::get('/admin/delete-user/{id}', 'RoleController@deleteUser')->name('management.deleteUser');
            Route::post('/update-admin-status', 'AdminController@updateAdmintStatus');

        /*
        |--------------------------------------------------------------------------
        | Role Controller Route End
        |--------------------------------------------------------------------------
        */

        Route::prefix('/admin')->group(function(){
            Route::get('section','SectionController@sections');
            Route::match(['get', 'post'], '/add-edit-section/{id?}', 'SectionController@addEditSection');
            Route::post('/update-section-status','SectionController@updateSectionStatus');
            Route::get('delete-section/{id}', 'SectionController@deleteSection');
        /*
        |--------------------------------------------------------------------------
        | Category Controller Route Start
        |--------------------------------------------------------------------------
        */
            Route::get('categories', 'CategoryController@categories');
            Route::post('/update-category-status', 'CategoryController@updateCategoryStatus');
            Route::get('/add-category-form', 'CategoryController@addCategoryForm');
            Route::post('/add-category', 'CategoryController@addCategory');
            Route::get('/edit-category-form/{id}', 'CategoryController@editCategory');
            Route::post('/update-category', 'CategoryController@updateCategory');
            Route::post('append-categories-level', 'CategoryController@appendCategoryLevel');
            Route::get('delete-category-image/{id}', 'CategoryController@deleteCategoryImage');
            Route::get('delete-category/{id}', 'CategoryController@deleteCategory');


        /*
        |--------------------------------------------------------------------------
        | Category Controller Route End
        |--------------------------------------------------------------------------
        */
        /*
        |--------------------------------------------------------------------------
        | Brand Controller Route Start
        |--------------------------------------------------------------------------
        */
            Route::get('brands', 'BrandController@brands');
            Route::match(['get', 'post'], '/add-edit-brand/{id?}', 'BrandController@addEditBrand');
            Route::post('/update-brand-status', 'BrandController@updateBrandStatus');
            Route::get('delete-brand/{id}', 'BrandController@deleteBrand');

        /*
        |--------------------------------------------------------------------------
        | Brand Controller Route End
        |--------------------------------------------------------------------------
        */

        /*
        |--------------------------------------------------------------------------
        | Product Controller Route Start
        |--------------------------------------------------------------------------
        */
            Route::get('products','ProductController@products');
            Route::post('/update-product-status', 'ProductController@updateProductStatus');
            Route::get('delete-product/{id}', 'ProductController@deleteProduct');
            Route::get('/add-product', 'ProductController@addProduct');
            Route::post('/post-product', 'ProductController@addProductPost');
            Route::get('/product-details/{id}', 'ProductController@ProductDetails');
            Route::get('/edit-product/{id}', 'ProductController@ProductEdit');
            Route::post('/update-product', 'ProductController@ProductUpdate');
            Route::get('delete-product/{id}', 'ProductController@deleteProduct');


            Route::match(['get', 'post'], '/add-shortDescription/{id}', 'ProductController@addShortDescription');
            Route::post('/edit-specification/{id}', 'ProductController@editSpecification');
            Route::post('/edit-shortDesc/{id}', 'ProductController@editShortDesc');
            Route::post('/edit-fetures/{id}', 'ProductController@editFeture');
            Route::post('/edit-filter/{id}', 'ProductController@editFilter');


            Route::post('/update-productSpecification-status', 'ProductController@updateProductSpecificationStatus');
            Route::post('/update-productFeature-status', 'ProductController@updateProductFeatureStatus');
            Route::post('/update-productShortDesc-status', 'ProductController@updateProductShortDesceStatus');

            Route::get('delete-productSpecification/{id}', 'ProductController@deleteProductSpecification');
            Route::get('delete-productShortDesc/{id}', 'ProductController@deleteProductShortDesc');
            Route::get('delete-productFeature/{id}', 'ProductController@deleteProductFeature');
            Route::get('delete-productFilter/{id}', 'ProductController@deleteProductFilter');
        /*
        |--------------------------------------------------------------------------
        | Product Controller Route End
        |--------------------------------------------------------------------------
        */

        });
    });
});

/*
|--------------------------------------------------------------------------
| Frontend Routes Start
|--------------------------------------------------------------------------
*/

Route::group(['namespace' => 'Frontend'], function () {
    /*
    |--------------------------------------------------------------------------
    | Frontend Controller Routes Start
    |--------------------------------------------------------------------------
    */
    Route::get('/', 'FrontendController@index');

    /*
    |--------------------------------------------------------------------------
    | Frontend Controller Routes End
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | Product Controller Routes Start
    |--------------------------------------------------------------------------
    */
    Route::get('/{slug}', 'ProductController@listing');

    /*
    |--------------------------------------------------------------------------
    | Product Controller Routes End
    |--------------------------------------------------------------------------
    */

});
/*
|--------------------------------------------------------------------------
| Frontend Routes End
|--------------------------------------------------------------------------
*/

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

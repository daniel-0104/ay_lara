<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AjaxController;
use App\Http\Controllers\authController;
use App\Http\Controllers\userController;
use App\Http\Controllers\adminController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductsController;

Route::middleware(['admin_auth'])->group(function(){
    Route::redirect('/','loginPage');
    Route::get('loginPage',[authController::class,'loginPage'])->name('auth#loginPage');
    Route::get('registerPage',[authController::class,'registerPage'])->name('auth#registerPage');
});


Route::middleware(['auth'])->group(function(){
    //dashboard
    Route::get('dashboard',[authController::class,'dashboard'])->name('dashboard');

    //admin middleware start
    Route::middleware('admin_auth')->group(function(){
        // admin > home
        Route::prefix('admin')->group(function(){
            //account
            Route::prefix('account')->group(function(){
                Route::get('profile',[adminController::class,'accountProfile'])->name('account#profile');
                Route::get('edit',[adminController::class,'accountEdit'])->name('account#edit');
                Route::post('update/{id}',[adminController::class,'accountUpdate'])->name('account#update');
            });

            //password
            Route::prefix('password')->group(function(){
                Route::get('change',[adminController::class,'passChangePage'])->name('pass#changePage');
                Route::post('change/{id}',[adminController::class,'passChange'])->name('pass#change');
            });

            //admin list
            Route::prefix('list')->group(function(){
                Route::get('page',[adminController::class,'listPage'])->name('list#page');
                Route::get('change/role',[adminController::class,'changeRole'])->name('change#role');
                Route::get('delete/{id}',[adminController::class,'listDelete'])->name('list#delete');
            });

            //category
            Route::prefix('category')->group(function(){
                Route::get('create',[CategoryController::class,'createPage'])->name('create#page');
                Route::post('create',[CategoryController::class,'categoryCreate'])->name('category#create');
                Route::get('list',[CategoryController::class,'categoryList'])->name('admin#homePage');
                Route::get('edit/{id}',[CategoryController::class,'categoryEdit'])->name('category#edit');
                Route::post('update',[CategoryController::class,'categoryUpdate'])->name('category#update');
                Route::get('delete,{id}',[CategoryController::class,'categoryDelete'])->name('category#delete');
            });

            //product
            Route::prefix('product')->group(function(){
                Route::get('list',[ProductsController::class,'productList'])->name('product#list');
                Route::get('create',[ProductsController::class,'createPage'])->name('product#createPage');
                Route::post('create',[ProductsController::class,'productCreate'])->name('product#create');
                Route::get('view/{id}',[ProductsController::class,'productView'])->name('product#view');
                Route::get('edit/{id}',[ProductsController::class,'productEdit'])->name('product#edit');
                Route::post('update',[ProductsController::class,'productUpdate'])->name('product#update');
                Route::get('delete/{id}',[ProductsController::class,'productDelete'])->name('product#delete');
            });
        });
    });
    //admin middleware end

    //user middleware start
    Route::middleware('user_auth')->group(function(){
        // user > home
        Route::prefix('user')->group(function(){
            Route::get('homePage',[userController::class,'userHomePage'])->name('user#homePage');

            // account
            Route::prefix('account')->group(function(){
                Route::get('profile',[userController::class,'userAcc'])->name('user#accountpfp');
                Route::post('profileUpdate/{id}',[userController::class,'userpfpUpdate'])->name('user#accountpfpUpdate');
            });

            //password
            Route::prefix('password')->group(function(){
                Route::get('change',[userController::class,'changePassPage'])->name('user#changePassPage');
                Route::post('change',[userController::class,'changePass'])->name('user#changePass');
            });

            //product
            Route::prefix('product')->group(function(){
                Route::get('list',[userController::class,'productList'])->name('user#productList');
                Route::get('fliter/{id}',[userController::class,'productFliter'])->name('user#productFliter');
            });

            //cart
            Route::prefix('cart')->group(function(){
                Route::get('list',[userController::class,'cartList'])->name('cart#list');
            });

            //detail
            Route::prefix('detail')->group(function(){
                Route::get('view/{id}',[userController::class,'detailView'])->name('detail#view');
            });

            //ajax
            Route::prefix('ajax')->group(function(){
                Route::get('sorting',[AjaxController::class,'ajaxSorting'])->name('ajax#sorting');
            });

            //shop
            // Route::prefix('shop')->group(function(){
            //     Route::get('view',[userController::class,'shopView'])->name('user#shopView');
            // });

            //about us
            Route::prefix('about')->group(function(){
                Route::get('read',[userController::class,'aboutPage'])->name('user#aboutPage');
            });

            //contact
            Route::prefix('contact')->group(function(){
                Route::get('map',[ContactController::class,'contactPage'])->name('user#contactPage');
            });
        });
    });
    //user middleware end

});

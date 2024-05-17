<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Auth;

Route::controller(WebController::class)->group(function(){
    Route::get('/','index')->name('/');
    Route::get('about','about')->name('about');
    Route::get('fxMmanagement','fxMmanagement')->name('fxMmanagement');
    Route::get('liquidityProvider','liquidityProvider')->name('liquidityProvider');
    Route::get('NgoFlowOptimization','NgoFlowOptimization')->name('NgoFlowOptimization');
    Route::get('onlineInquiry','onlineInquiry')->name('onlineInquiry');
    Route::get('platform','platform')->name('platform');
    Route::get('login','login')->name('login');
    Route::get('signup','signup')->name('signup');
});

Route::prefix('admin')->group(function(){
    Route::controller(AdminController::class)->group(function(){
        Route::get('bank','bank')->name('admin.bank');
        Route::get('beneficiaries','beneficiaries')->name('admin.beneficiaries');
        Route::get('dashboard','dashboard')->name('admin.dashboard');
        Route::get('investment','investment')->name('admin.investment');
        Route::get('notifications','notifications')->name('admin.notifications');
        Route::get('orderdetail','orderdetail')->name('admin.orderdetail');
        Route::get('products','products')->name('admin.products');
        Route::get('profile','profile')->name('admin.profile');
    });
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

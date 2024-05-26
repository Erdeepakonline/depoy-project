<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\CompProcessController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\StripePayController;
use App\Http\Controllers\ForgetUserController;
use App\Http\Controllers\CouponUserController;
use App\Http\Controllers\Admin\ForgetAdminController;
use App\Http\Controllers\Admin\ReportAdminController;
use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\Admin\CategoryAdminController;
use App\Http\Controllers\Payment\PaymentCoinOnlineController;
use App\Http\Controllers\Payment\PaymentPayuController;
use App\Http\Controllers\Payment\PaymentStripeController;
use App\Http\Controllers\Payment\PaymentCoinQrController;
use App\Http\Controllers\Payment\PaymentPhonepeController;
use App\Http\Controllers\Payment\PaymentAirpayController;
use App\Http\Controllers\ImageController;


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
    Route::get('/clear-all', function () {
      \Artisan::call('route:clear');
      \Artisan::call('cache:clear');
      \Artisan::call('view:clear');
      \Artisan::call('config:clear');
      return 'Cache Cleared';
    })->name('clear');
  
  
    /*  Autometic Deactive Coupon */
    Route::get('/today/coupon/deactive',[CouponUserController::class,'tdaycpmdeactive']);
    /*  Campaign Deduct Amount User Wallet   */
    Route::get('/adclck/{camp_id}',[CompProcessController::class,'deductAmt']);
    Route::get('/systemInfo',[CompProcessController::class,'systemInfo_device']);


    Route::get('payment/check',[PaymentController::class,'paymentcheckurl']);
  /* ################################ Payment GetWays Section ####################### */

      /* ############ Payment Getway Stripe ################## */ 
      Route::post('payment/stripe',[PaymentStripeController::class,'payment_stripe']);
      Route::get('stripe/response/{data}',[PaymentStripeController::class,'stripe_response']);

      /* ################ Payment Gateway Payu ##################### */
      Route::post('payment/payu',[PaymentPayuController::class,'payment_payu']);
      Route::post('payment/response',[PaymentPayuController::class,'response']);
      
      /* ################ Payment Gateway Phonepe ##################### */
      Route::post('payment/phonepe',[PaymentPhonepeController::class,'payment_phonepe']);
      Route::post('phonepe/response',[PaymentPhonepeController::class,'response']);
      
      /* ################ Payment Gateway Airpay ##################### */
      Route::any('payment/airpay',[PaymentAirpayController::class,'payment_airpay']);
      Route::post('airpay/response',[PaymentAirpayController::class,'response']);

    /* ####################### Bitcoin QR Code - Route api.php ######################  */
    
   // Route::post('user/payment/upscreenshot',[PaymentCoinQrController::class,'upload_screen']);

    /* ####################### Bitcoin online #################################### */
    Route::post('payment/bitcoin/online',[PaymentCoinOnlineController::class,'bitcoin_online']);
    Route::any('payment/bitcoin/online/response',[PaymentCoinOnlineController::class,'bitcoin_response']);
	Route::any('payment/bitcoin/online/app_response',[PaymentCoinOnlineController::class,'bitcoin_app_response']);
     // Route::post('payment/coinpay/response',[PaymentCoinOnlineController::class,'bitcoin_response2']);

    Route::get('payment/currency',[PaymentController::class,'currency']);
    Route::get('admin/genrate/pdf/user', [ReportAdminController::class, 'pdfuser']);
    /* Open Registration Section  */
    Route::get('/registration', [UserController::class, 'registration']);
    Route::get('/verification/user/{uid}', [UserController::class, 'verifyuser']);
    Route::post('ajax/registration/add', [UserController::class, 'addrRegistration']);
    Route::post('ajax/registration/cuntry-name', [UserController::class, 'getCuntryName']);
    /* End Registration Section */
    /* #################        Send Mail User Coupon    ###################### */
    Route::get('send/coupon/get', [CouponController::class, 'couponusersendmail']);
    Route::post('chagepass', [CouponController::class, 'changepass']);

    Route::get('image/{dir}/{img}', [ImageController::class, 'show']);
   // Route::get('uploadcountryip', [CouponController::class, 'upload_cuntry_ip']);

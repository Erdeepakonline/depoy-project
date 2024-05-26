<?php
use App\Http\Controllers\Admin\AdFundAdminController;
use App\Http\Controllers\Admin\CampaignAdminController;
use App\Http\Controllers\Admin\CategoryAdminController;
use App\Http\Controllers\Admin\CountryAdminController;
use App\Http\Controllers\Admin\UserAdminController;
use App\Http\Controllers\Admin\NotificationAdminController;
use App\Http\Controllers\Admin\BlockIpAdminController;
use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\Admin\SupportTypeAdminCtrl;
use App\Http\Controllers\Admin\SupportAdminController;
use App\Http\Controllers\Admin\TransactionLogAdminController;
use App\Http\Controllers\Admin\ReportAdminController;
use App\Http\Controllers\Admin\DashboardAdminController;
use App\Http\Controllers\Admin\RolePernController;
use App\Http\Controllers\Admin\StaffAdminController;
use App\Http\Controllers\Admin\ActivitylogAdminController; 
use App\Http\Controllers\Admin\ForgetAdminController;
use App\Http\Controllers\Admin\NoticeAdminController;
use App\Http\Controllers\Admin\PaymentAdminController;
use App\Http\Controllers\login\AdvertiserLoginController;
use App\Http\Controllers\login\PublisherLoginController;
use App\Http\Controllers\AdScriptController;
use App\Http\Controllers\ReportUserController;
use App\Http\Controllers\AppCmpController;
use App\Http\Controllers\AuthController; 
use App\Http\Controllers\SupportController;  
use App\Http\Controllers\CampaignController;  
use App\Http\Controllers\CategoryController; 
use App\Http\Controllers\CountryController;
use App\Http\Controllers\WalletController;
use App\Http\Controllers\BlockIpController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserDashboardController;
use App\Http\Controllers\CouponUserController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\ConfigUserController;
use App\Http\Controllers\NotificationUserController;
use App\Http\Controllers\ChangeUserPassword;
use App\Http\Controllers\ForgetUserController;
use App\Http\Controllers\Payment\PaymentCoinQrController;
use App\Http\Controllers\Publisher\PubAdUnitController;
use App\Http\Controllers\Publisher\PubWebsiteController;
use App\Http\Middleware\Advertiser;
use App\Http\Middleware\UserAdvertiser;
use App\Http\Middleware\UserPublisher;
use App\Http\Middleware\AppMiddleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PaymentController;

/* ################  App Advertiser Section #############  */

use App\Http\Controllers\Advertisers\AppTransactionLogAdminControllers;
use App\Http\Controllers\Advertisers\AppNotificationUserControllers;
use App\Http\Controllers\Advertisers\AppUserDashboardControllers;
use App\Http\Controllers\Advertisers\AppPaymentCoinQrController;
use App\Http\Controllers\Advertisers\AppTransactionControllers;
use App\Http\Controllers\Advertisers\AppReportUserControllers;
use App\Http\Controllers\Advertisers\AppCouponUserController;
use App\Http\Controllers\Advertisers\AppForgetUserController;
use App\Http\Controllers\Advertisers\AppCategoryControllers;
use App\Http\Controllers\Advertisers\AppCampaignControllers;
use App\Http\Controllers\Advertisers\AppChangeUserPasswords;
use App\Http\Controllers\Advertisers\AppCountryControllers;
use App\Http\Controllers\Advertisers\AppSupportControllers;
use App\Http\Controllers\Advertisers\AppWalletControllerss;
use App\Http\Controllers\Advertisers\AppBlockIpControllers;
use App\Http\Controllers\Advertisers\AppAppCmpControllers;
use App\Http\Controllers\Advertisers\AppAuthControllers;


/* ################ End App Advertiser Section #############  */

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
  /* Universal Routes */
    Route::post('/adscript', [AdScriptController::class, 'adList']);
    /* Advertiser Registration Route */
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/checkip', [AuthController::class, 'getIp']);
    /* Country Routes */
    Route::get('/country/index', [CountryController::class, 'index']);
    Route::get('/country/getcountrylist', [CountryController::class, 'list']);
    Route::post('/login', [AdvertiserLoginController::class, 'login']);
    Route::post('/advertiser/changepassword', [AdvertiserLoginController::class, 'change_password']);
    /* Admin Forget Password  */
    Route::post('/forget/admin/password',[ForgetAdminController::class,'forgetpass']);
    Route::post('/forgetpassword/admin/submit',[ForgetAdminController::class,'saveforgetord']);
    /* User Forget Password  */
    Route::post('/forget/user/password',[ForgetUserController::class,'forgetpass']);
    Route::post('/forget/user/password/validatekey',[ForgetUserController::class,'forgetPassValidateAuthKey']);
    // Route::get('/forget/password/user/{key}',[ForgetUserController::class,'forgetpassword']);
    Route::post('/forgetpassword/user/submit',[ForgetUserController::class,'saveforgetord']);
    /* Publisher Login  */
    Route::post('/publisher/login', [PublisherLoginController::class, 'login']);
    /* Registration Section */
    Route::get('/category/drop/list', [CategoryAdminController::class, 'droplistweb']);
    Route::get('/country/drop/list', [CategoryAdminController::class, 'dropliscountrytweb']);
    Route::get('/country/name/list', [CategoryAdminController::class, 'droplistwebcountry']);
    Route::post('/country/phncode', [CategoryAdminController::class, 'countryphncode']);
    Route::post('/ajax/registration/add', [UserController::class, 'addrRegistration']);
    /*################ Convert the INR to USD Currency Control ###################  */
    Route::post('get/ip',[PaymentController::class,'getipaddress']);
    

   Route::middleware([Advertiser::class])->group(function () {
    /* ------------------------------------Admin Routes---------------------------------- */
    /* Admin IP Block */
    Route::post('/admin/ip/list', [BlockIpAdminController::class, 'alliplist']);
    Route::post('/admin/ip/store', [BlockIpAdminController::class, 'create']);
    Route::post('/admin/ip/statusupdate', [BlockIpAdminController::class, 'blockStatusUpdate']);
    Route::post('/admin/ip/info', [BlockIpAdminController::class, 'checkIpInfo']);
    
    /* Admin Campaign Routes */
    Route::post('/admin/campaign/campaignlist', [CampaignAdminController::class, 'adminCampaignList']);
    Route::post('/admin/campaign/deletedcmplist', [CampaignAdminController::class, 'adminDeletedCampaignList']);
    Route::post('admin/campaign/deletecampaign', [CampaignAdminController::class, 'deleteCampaign']);
    Route::post('/admin/campaign/campaignupdatestatus', [CampaignAdminController::class, 'campaignUpdateStatus']);
    Route::post('/admin/campaign/action',    [CampaignAdminController::class, 'campaignAction']);
    Route::post('/admin/campaign/updatetextad', [CampaignAdminController::class, 'adminUpdateText']);
    Route::post('/admin/campaign/showtextads', [CampaignAdminController::class, 'showAdAdmin']);
    Route::post('/admin/campaign/updatebannerad', [CampaignAdminController::class, 'updateBanner']);
    Route::post('admin/onchagecpc', [CampaignAdminController::class, 'onchangecpc']);
    Route::post('/admin/campaign/updatesocialad', [CampaignAdminController::class, 'updateSocial']);
    Route::post('/admin/campaign/updatenativead', [CampaignAdminController::class, 'updateNative']);
    Route::post('/admin/campaign/updatepopunderad', [CampaignAdminController::class, 'updatePopUnder']);
    Route::post('/admin/campaign/imageupload', [CampaignController::class, 'imageUpload']);

    /* Admin CPC Amount */
    Route::post('admin/onchagecpc', [CampaignController::class, 'onchangecpc']);
    /* Admin Category Routes */
    Route::post('/admin/category/insert', [CategoryAdminController::class, 'create']);
    Route::post('/admin/category/update', [CategoryAdminController::class, 'update']);
    Route::post('/admin/category/categorystatusupdate', [CategoryAdminController::class, 'categoryUpdateStatus']);
    Route::post('/admin/category/getcategorylist', [CategoryAdminController::class, 'getCategoryList']);
    Route::post('/admin/category/getcampcategorylist', [CategoryAdminController::class, 'getCampCategoryList']);
    Route::post('/admin/category/delete', [CategoryAdminController::class, 'destroy']);
    /* Admin Country Routes */
    Route::post('/admin/country/getcountrylist', [CountryAdminController::class, 'list']);
    Route::post('/admin/country/getcountrydropdownlist', [CountryAdminController::class, 'drodownList']);
    Route::post('/admin/country/getcountryuserlist', [CountryAdminController::class, 'userCountryDrodownList']);
    Route::post('/admin/country/store', [CountryAdminController::class, 'store']);
    Route::post('/admin/country/update', [CountryAdminController::class, 'update']);
    Route::post('/admin/country/delete', [CountryAdminController::class, 'destroy']);
    Route::post('/admin/country/countrystatusupdate', [CountryAdminController::class, 'countryUpdateStatus']);
    /* Admin Users's List */
    Route::post('/admin/user/add', [UserAdminController::class, 'addnewusers']);
    Route::get('/admin/category/drop/list', [CategoryAdminController::class, 'droplist']);
    
    Route::post('/admin/user/list', [UserAdminController::class, 'usersList']);
    Route::post('/admin/user/detail', [UserAdminController::class, 'userDetail']);
    Route::post('/admin/user/statusupdate', [UserAdminController::class, 'updateUserStatus']);
    Route::post('/admin/user/delete', [UserAdminController::class, 'deleteUser']);
    Route::post('/admin/user/updateacount', [UserAdminController::class, 'updateUserAcountType']);
    Route::post('/admin/user/emailverify', [UserAdminController::class, 'emailVerificationUpdate']);
    /* Admin Notification */
    Route::post('/admin/notification', [NotificationAdminController::class, 'create_notification']);
    Route::post('/admin/notification/list', [NotificationAdminController::class, 'view_all_list_notification']);
    Route::post('/admin/notification/user_id', [NotificationAdminController::class, 'view_notification_by_user_id']);
    Route::post('/admin/notification/by_id', [NotificationAdminController::class, 'view_notification_by_id    ']);
    Route::post('/admin/notification/type_to_user', [NotificationAdminController::class, 'type_to_user']);
    Route::post('/admin/notification/changestatus', [NotificationAdminController::class, 'notificationStatusUpdate']);
    Route::post('/admin/notification/trash ', [NotificationAdminController::class, 'notificationTrash']);
    Route::post('/admin/pub/notification/bulkaction ', [NotificationAdminController::class, 'notiAction']);

    /* Admin Ad Fund to User */
    Route::post('/admin/adfund ', [AdFundAdminController::class, 'adFund']);

    /* Admin Transactions Section */
    Route::post('admin/transactions/list', [TransactionLogAdminController::class, 'transactionsList']);
    Route::post('admin/transactions/report', [TransactionLogAdminController::class, 'transactionsReport']);
    Route::post('admin/transactions/txnimportexcelreport', [TransactionLogAdminController::class, 'transactionsReportExcelImport']);
    Route::post('/admin/transactions/user/info', [TransactionLogAdminController::class, 'userInfo']);
    Route::post('/admin/transactions/view', [TransactionLogAdminController::class, 'transactionsView']);
    Route::post('/admin/transactions/aproved', [TransactionLogAdminController::class, 'transactionApproved']);

    /* Admin coupon Section  */
    Route::get('admin/coupon/user/list', [CouponController::class, 'userList']);
    Route::post('admin/coupon/create', [CouponController::class, 'create']);
    Route::post('admin/coupon/list', [CouponController::class, 'list']);
    Route::post('admin/coupon/trash', [CouponController::class, 'trace_coupon']);
    Route::post('admin/coupon/update', [CouponController::class, 'update_coupon']);
    Route::post('admin/coupon/statusupdate', [CouponController::class, 'couponStatusUpdate']);
    Route::post('admin/coupon/delete', [CouponController::class, 'delete_coupon']);
    /* Admin Fund Section */ 
    Route::get('admin/add/fund', [AddFundController::class, 'add_data']);
    /* Impression List Data */
    Route::post('admin/campaign/impression/get', [CampaignAdminController::class, 'getcampid']);
    Route::post('admin/campaign/impression/add', [CampaignAdminController::class, 'addclickimp']);
    /* Support Admin  */
    Route::post('admin/support/list', [SupportAdminController::class, 'list_support']);
    Route::post('admin/support/view', [SupportAdminController::class, 'one_support']);
    Route::post('admin/support/info', [SupportAdminController::class, 'info']);
     Route::post('admin/support/chat', [SupportAdminController::class, 'chat']);
    /* Campaign Report */
    Route::post('admin/campaign/report', [ReportAdminController::class, 'cmpreport']);
    Route::post('admin/campaign/importexcelreport', [ReportAdminController::class, 'cmpReportExportDateWise']);
    Route::post('admin/campaign/imprreport', [ReportAdminController::class, 'cmpreportDetail']);
    Route::post('admin/campaign/imprdetail', [ReportAdminController::class, 'cmpreportImprDetail']);
    Route::post('admin/campaign/clickdetail', [ReportAdminController::class, 'cmpreportClicksDetail']);
    Route::post('admin/campaign/imprexportexcel', [ReportAdminController::class, 'imprDetailExportExcel']);
    Route::post('admin/campaign/clickexportexcel', [ReportAdminController::class, 'clickDetailExportExcel']);
    Route::post('admin/campaign/imprcmpexportexcel', [ReportAdminController::class, 'impCampExportExcel']);
    Route::post('admin/user/report', [ReportAdminController::class, 'userreport']);
    Route::get('admin/genrate/pdf/user', [ReportAdminController::class, 'pdfuser']);
    Route::post('admin/cmpclickimp/date/report', [ReportAdminController::class, 'cmpclickimpdate']);
    
    Route::post('/admin/campaign/detail',    [CampaignAdminController::class, 'campaignDetail']);
    /* Dashboard Section */
    Route::post('admin/dashboard', [DashboardAdminController::class, 'dashboard']);
    Route::post('admin/dashboard/new', [DashboardAdminController::class, 'dashboard_new']);
    /*Role and Permission Section */
    Route::post('admin/role/create', [RolePernController::class, 'create']);
    Route::get('admin/role/get', [RolePernController::class, 'listget']);
    Route::get('admin/role/list', [RolePernController::class, 'list']);
    /* Staff Management */
    Route::post('admin/staff/create', [StaffAdminController::class, 'create']);
    Route::post('admin/staff/list', [StaffAdminController::class, 'list']);
    Route::post('admin/staff/update', [StaffAdminController::class, 'updateStaff']);
    /* Activity Log  */
    Route::post('admin/activity/list', [ActivitylogAdminController::class, 'all_list']);
    Route::post('admin/activity/exporttoexcelactivity', [ActivitylogAdminController::class, 'importReportExcelActivity']);
    /* Admin Notice */
    Route::post('/admin/notice/insert', [NoticeAdminController::class, 'create']);
    Route::post('/admin/notice/update', [NoticeAdminController::class, 'update']);
    Route::post('/admin/notice/statusupdate', [NoticeAdminController::class, 'noticeUpdateStatus']);
    Route::post('/admin/notice/list', [NoticeAdminController::class, 'getNoticeList']);
    Route::post('/admin/notice/delete', [NoticeAdminController::class, 'destroy']);
    /* Payment Section  */
    Route::post('/admin/all_transaction/list', [PaymentAdminController::class, 'list']);
    Route::post('/admin/transaction/views', [PaymentAdminController::class, 'view']);

  

    /* Login as User  */
    Route::post('/admin/userlogin', [AuthController::class, 'loginasuser']);
    Route::post('/user/validatetoken', [AuthController::class, 'tokenValidate']);
});

   Route::middleware([UserAdvertiser::class])->group(function () {
    /* Login Route */
    Route::post('user/login', [AuthController::class, 'login']);
    Route::post('user/login/log', [AuthController::class, 'loginLog']);
     Route::post('user/fetch', [AuthController::class, 'userFetch']);
    /*Wallet Routes */
    Route::get('user/wallet/show/{uid}', [WalletController::class, 'getWallet']);
    Route::post('user/wallet/update/{id}', [WalletController::class, 'update']);
    Route::get('user/wallet/index', [WalletController::class, 'index']);
    Route::get('user/wallet/info/{id}', [WalletController::class, 'show']);
    /* Profile Routes */
    Route::get('user/profile/info/{uid}', [AuthController::class, 'profileInfo']);
    Route::post('user/profile/update/{uid}', [AuthController::class, 'update']);
    /* Catgory Routes */
    Route::get('category/getcategorylist', [CategoryController::class, 'getCategoryList']);
    Route::get('category/index', [CategoryController::class, 'index']);
    Route::post('category/categorystatusupdate', [CategoryController::class, 'categoryUpdateStatus']);
    /*------------------------------ Campaign Routes --------------------------------- */
    /* Text Campaign Routes */
    Route::post('/user/campaign/createtextad', [CampaignController::class, 'storeText']);
    Route::post('/user/campaign/updatetextad', [CampaignController::class, 'updateText']);
    Route::post('/user/campaign/showtextad', [CampaignController::class, 'showAd']);
    /* Banner Campaign Routes */
    Route::post('/user/campaign/createbannerad', [CampaignController::class, 'storeBanner']);
    Route::post('/user/campaign/imageupload', [CampaignController::class, 'imageUpload']);
    Route::post('/user/campaign/updatebannerad', [CampaignController::class, 'updateBanner']);
    /* Social Campaign Routes */
    Route::post('/user/campaign/createsocialad', [CampaignController::class, 'storeSocial']);
    Route::post('/user/campaign/updatesocialad', [CampaignController::class, 'updateSocial']);
    /* Native Campaign Routes */
    Route::post('/user/campaign/createnativead', [CampaignController::class, 'storeNative']);
    Route::post('/user/campaign/updatenativead', [CampaignController::class, 'updateNative']);
    /* PopUnder Campaign Routes */
    Route::post('/user/campaign/createpopunderad', [CampaignController::class, 'storePopUnder']);
    Route::post('/user/campaign/updatepopunderad', [CampaignController::class, 'updatePopUnder']);
    /* Common Campaign Routes */
    Route::post('/user/campaign/action',    [CampaignController::class, 'campaignAction']);
    Route::post('/user/campaign/duplicate', [CampaignController::class, 'duplicateCampaign']);
    Route::post('/user/campaign/delete', [CampaignController::class, 'delete']);
    Route::post('/user/campaign/campaignstatus', [CampaignController::class, 'campaignStatusUpdate']);
    Route::post('/user/campaign/list', [CampaignController::class, 'list']);
    /* User Notification */
    Route::post('/user/notification/user_id', [NotificationUserController::class, 'view_notification_by_user_id']);
    Route::post('/user/notification/count', [NotificationUserController::class, 'countNotif']);
    Route::post('/user/notification/unreadnoti', [NotificationUserController::class, 'unreadNotif']);
    Route::post('/user/notification/read', [NotificationUserController::class, 'read']);
  //  Route::post('/user/notification/user_id', [NotificationAdminController::class, 'view_notification_by_user_id']);
    
    /*User ip Block Section */
    Route::post('/user/ip/request/create', [BlockIpController::class, 'store']);
    Route::post('/user/ip/list', [BlockIpController::class, 'user_block_ip']);
    
    /* Supprt Section */
    Route::post('/user/support/create', [SupportController::class, 'create_support']);
    Route::post('/user/support/list', [SupportController::class, 'list_support']);
    Route::post('/user/support/info', [SupportController::class, 'info']);
    Route::post('/user/support/chat', [SupportController::class, 'chat']);
    Route::post('/user/support/delete', [SupportController::class, 'delete']);
    /* User Dashboard */
    Route::post('user/dashboard', [UserDashboardController::class, 'dashboard']);
 
 
    Route::post('user/dashboard/cia', [UserDashboardController::class, 'cia']);
    Route::post('user/dashboard/data', [UserDashboardController::class, 'cia']);
    Route::post('user/dashboard/cmptop', [UserDashboardController::class, 'cmptop']);
    Route::post('user/dashboard/cidevice', [UserDashboardController::class, 'cmpdevice']);
    /* CPC Amount */
    Route::post('user/onchagecpc', [CampaignController::class, 'onchangecpc']);
    /* Coupon Code Calculation */
    Route::post('user/apply/coupon', [CouponUserController::class, 'getcalCoupon']);
    Route::post('user/couponused', [CouponUserController::class, 'couponStatusUsed']);
    /* User Transactions Section */
    Route::post('user/transactions/list', [TransactionController::class, 'fetchtransaction']);


    /* ########################### Payment Getway Bitcoin ############################ */
     Route::post('user/payment/bitcoin',[PaymentCoinQrController::class,'bitcoin_qrcode']);
     Route::post('user/payment/upscreenshot',[PaymentCoinQrController::class,'upload_screen']);



    /* User Change Password */
    Route::post('user/change_password',[ChangeUserPassword::class,'change_password']);
    /* User DashBoard */
    /* User Report Campagin */
    Route::post('user/campaign/report',[ReportUserController::class,'camp_report']);
    Route::post('user/transaction/view',[ReportUserController::class,'transactionView']);
    Route::post('user/ad_type/camp',[ReportUserController::class,'ad_type']);
});
/* Publisher Route Section */
   Route::middleware([UserPublisher::class])->group(function () {
    /* Login Route */
    Route::post('user/pub/login', [AuthController::class, 'publogin']);
    /* Website Section  Open */
    Route::post('user/pub/website/add', [PubWebsiteController::class, 'websiteStore']);
    Route::post('user/pub/website/list', [PubWebsiteController::class, 'websiteList']);
    Route::post('user/pub/website/delete', [PubWebsiteController::class, 'websiteTrash']);
    Route::post('user/pub/website/verify', [PubWebsiteController::class, 'verifyfileWeb']);
    Route::post('user/pub/website/detail', [PubWebsiteController::class, 'websiteDetail']);
    /* Ads Section Open */
    Route::post('user/pub/website/list/verify', [PubWebsiteController::class, 'websiteListverfy']);
    Route::post('user/pub/website/adlist', [PubWebsiteController::class, 'websiteAdunitList']);
    /*Ad Unit Section Routes*/ 
    Route::post('user/pub/adunit/store', [PubAdUnitController::class, 'adUnitStore']);
});



/*==================================================== ADVERTISER MOBILE APP ROUTES ============================================================== */



//   /* User Mobile Login Api */
//  Route::post('/mobile_login', [LoginController::class, 'mobileLogin']);
// /* Mobile App Route  */
//  Route::middleware([AppMiddleware::class])->group(function () {
//      /* User Login Api */
//  Route::post('/app/login', [AdvertiserLoginController::class, 'mobileLogin']);
//      /* User dashboard Api */
//  Route::post('app/dashboard', [UserDashboardController::class, 'dashboardcia']);
//     /* User Campaign Report Api */
//  Route::post('app/campaign_report',[ReportUserController::class,'camp_report']);
//  /* User Transactions Section */
//  Route::post('app/transactions_list', [TransactionController::class, 'fetchtransaction']);
//     /* User Wallet Show Api */
//  Route::get('app/wallet_show/{uid}', [WalletController::class, 'getWallet']);
//  Route::get('app/wallet_index', [WalletController::class, 'index']);
//  Route::get('app/wallet_info/{id}', [WalletController::class, 'show']);
//  Route::post('/app/transactions_view', [TransactionLogAdminController::class, 'transactionsView']);
//    /* User Campaign List Api */
//  Route::post('app/campaign_list', [CampaignController::class, 'list']);
//  Route::post('app/campaign_action', [CampaignController::class, 'campaignAction']);
//   /* User Block List Api */
//  Route::post('app/block_ip_list', [BlockIpController::class, 'user_block_ip']);
//  Route::post('app/ip/request_create', [BlockIpController::class, 'store']);
//   /* User Change Password Api */
//  Route::post('app/change_password',[ChangeUserPassword::class,'change_password']);
//  /* Profile Routes */
//  Route::get('app/profile_info/{uid}', [AuthController::class, 'profileInfo']);
//  Route::post('app/profile_update/{uid}', [AuthController::class, 'update']);
//  /* Login Route */
//  Route::post('app/login_log', [AuthController::class, 'loginLog']);
//  /* Supprt Section */
//  Route::post('app/support_create', [SupportController::class, 'create_support']);
//  Route::post('app/support_list', [SupportController::class, 'list_support']);
//  Route::post('app/support_info', [SupportController::class, 'info']);
//  Route::post('app/support_chat', [SupportController::class, 'chat']);
//  Route::post('app/support_delete', [SupportController::class, 'delete']);
//  /* User Notification */
//  Route::post('app/notification_user_id', [NotificationUserController::class, 'view_notification_by_user_id']);
//  Route::post('app/notification_user_read', [NotificationUserController::class, 'read']);
//  Route::get('app/country_getcountry_list', [CountryController::class, 'list']);
 
 
//  Route::post('app/notification/unreadnoti', [NotificationUserController::class, 'unreadNotif']);
//  Route::post('app/notification/count', [NotificationappController::class, 'countNotif']);
//  Route::post('app/sartcamp', [AppCmpController::class, 'sartdata']);
//  Route::post('app/getcamp', [AppCmpController::class, 'getClkImpCmpData']);
//  //user/campaign/campaignstatus
// Route::post('/app/campaign/showadd', [CampaignController::class, 'showAd']);
// });




  /* User Mobile Login Api */
  Route::post('/mobile_login', [LoginController::class, 'mobileLogin']);
  /* Mobile App Route  */
  Route::get('category_list', [AppCategoryControllers::class, 'categoryList']);
  /* User Forget Email Password Api */
  Route::post('/forge_user_password',[AppForgetUserController::class,'forgetpass']);
  /* End User Forget Email Password Api */
   Route::middleware([AppMiddleware::class])->group(function () {
       /* User Login Api */
   Route::post('/app/login', [AdvertiserLoginController::class, 'mobileLogin']);
       /* User dashboard Api */
   Route::post('app/dashboard', [AppUserDashboardControllers::class, 'dashboardcia']);
      /* User Campaign Report Api */
   Route::post('app/campaign_report',[AppReportUserControllers::class,'camp_report']);
   /* User Transactions Section */
   Route::post('app/transactions_list', [AppTransactionControllers::class, 'fetchtransaction']);
      /* User Wallet Show Api */
   Route::get('app/wallet_show/{uid}', [AppWalletControllerss::class, 'getWallet']);
   Route::get('app/wallet_index', [AppWalletControllerss::class, 'index']);
   Route::get('app/wallet_info/{id}', [AppWalletControllerss::class, 'show']);
   Route::post('/app/transactions_view', [AppTransactionLogAdminControllers::class, 'transactionsView']);
     /* User Campaign List Api */
   Route::post('app/campaign_list', [AppCampaignControllers::class, 'list']);
   Route::post('app/campaign_action', [AppCampaignControllers::class, 'campaignAction']);
   /* CPC Amount */
   Route::post('app/onchagecpc', [AppCampaignControllers::class, 'onchangecpc']);
    /* User Block List Api */
   Route::post('app/block_ip_list', [AppBlockIpControllers::class, 'user_block_ip']);
   Route::post('app/ip/request_create', [AppBlockIpControllers::class, 'store']);
    /* User Change Password Api */
   Route::post('app/change_password',[AppChangeUserPasswords::class,'change_password']);
   /* Profile Routes */
   Route::get('app/profile_info/{uid}', [AppAuthControllers::class, 'profileInfo']);
   Route::post('app/profile_update/{uid}', [AppAuthControllers::class, 'update']);
   /* Login Route */
   Route::post('app/login_log', [AppAuthControllers::class, 'loginLog']);
   /* Supprt Section */
   Route::post('app/support_create', [AppSupportControllers::class, 'create_support']);
   Route::post('app/support_list', [AppSupportControllers::class, 'list_support']);
   Route::post('app/support_info', [AppSupportControllers::class, 'info']);
   Route::post('app/support_chat', [AppSupportControllers::class, 'chat']);
   Route::post('app/support_delete', [AppSupportControllers::class, 'delete']);
   /* User Notification */
   Route::post('app/notification_user_id', [AppNotificationUserControllers::class, 'view_notification_by_user_id']);
   Route::post('app/notification_user_read', [AppNotificationUserControllers::class, 'read']);
   Route::get('app/country/getcountry_list', [AppCountryControllers::class, 'list']);
   
   
   Route::post('app/notification/unreadnoti', [AppNotificationUserControllers::class, 'unreadNotif']);
   Route::post('app/notification/count', [AppNotificationappControllers::class, 'countNotif']);
   Route::post('app/sartcamp', [AppAppCmpControllers::class, 'sartdata']);
   Route::post('app/getcamp', [AppAppCmpControllers::class, 'getClkImpCmpData']);
   //user/campaign/campaignstatus
   Route::post('/app/campaign_showadd', [AppCampaignControllers::class, 'showAd']);
   /* Text Campaign Routes */
   Route::post('/app/campaign_createtextad', [AppCampaignControllers::class, 'storeText']);
   Route::post('/app/campaign_updatetextad', [AppCampaignControllers::class, 'updateText']);
   Route::post('/app/campaign_showtextad', [AppCampaignControllers::class, 'showAd']);
   /* Banner Campaign Routes */
   Route::post('/app/campaigncreatebannerad', [AppCampaignControllers::class, 'storeBanner']);
   Route::post('/app/campaign_imageupload', [AppCampaignControllers::class, 'imageUpload']);
   Route::post('/app/campaign_updatebannerad', [AppCampaignControllers::class, 'updateBanner']);
   /* Social Campaign Routes */
   Route::post('/app/campaign_createsocialad', [AppCampaignControllers::class, 'storeSocial']);
   Route::post('/app/campaign_updatesocialad', [AppCampaignControllers::class, 'updateSocial']);
   /* Native Campaign Routes */
   Route::post('/app/campaign_createnativead', [AppCampaignControllers::class, 'storeNative']);
   Route::post('/app/campaign_updatenativead', [AppCampaignControllers::class, 'updateNative']);
   /* PopUnder Campaign Routes */
   Route::post('/app/campaign_createpopunderad', [AppCampaignControllers::class, 'storePopUnder']);
   Route::post('/app/campaign_updatepopunderad', [AppCampaignControllers::class, 'updatePopUnder']);
   /* Common Campaign Routes */
   Route::post('/app/campaign_action',    [AppCampaignControllers::class, 'campaignAction']);
   Route::post('/app/campaign_duplicate', [AppCampaignControllers::class, 'duplicateCampaign']);
   Route::post('/app/campaign_delete', [AppCampaignControllers::class, 'delete']);
   Route::post('/app/campaign_campaignstatus', [AppCampaignControllers::class, 'campaignStatusUpdate']);
   Route::post('/app/campaign_list', [AppCampaignControllers::class, 'list']);
   
   /* Coupon Code Calculation */
     Route::post('app/apply_coupon', [AppCouponUserController::class, 'getcalCoupon']);
    /* ########################### Payment Getway Bitcoin ############################ */
    Route::post('app/payment_bitcoin',[AppPaymentCoinQrController::class,'bitcoin_qrcode']);
    Route::post('app/payment_upscreenshot',[AppPaymentCoinQrController::class,'upload_screen']);
    Route::post('app/payment_upscreenshot_mob',[AppPaymentCoinQrController::class,'upload_screen_mobile']);
  
  });
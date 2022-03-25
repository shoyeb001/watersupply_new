<?php

use App\Http\Controllers\admin\Admin2Controller;
use Illuminate\Support\Facades\Route;
use App\http\Controllers\Backend\ProductController;
use App\http\Controllers\Admin\AdminController;
use App\Http\Controllers\Backend\BillController;
use App\Http\Controllers\Backend\CategoryControler;
use App\Http\Controllers\Backend\CityController;
use App\Http\Controllers\Backend\DeliveryController;
use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\Frontend\OrderController;
use App\Http\Controllers\Frontend\UserController;
use App\Models\Product;
use App\Models\User;
use League\CommonMark\Delimiter\Delimiter;

//frontend

Route::get('/', function () {
    return view('frontend.index');
})->name("home");

Route::get('/signup',[UserController::class,"ViewSignUp"])->name("user.signup.view");

Route::post('/signup/auth',[UserController::class,"UserSignUp"])->name("user.signup");

Route::get('/product/details/{slug}',[IndexController::class, "ProductDetails"])->name("product.details");

Route::get("/products",[IndexController::class,"ShowProductPage"])->name("show.product.page");

Route::get("/user/verify/{email}",[UserController::class,"VerifyUser"])->name("verify.user"); //verify email

Route::get("/login",[UserController::class,"ViewLogin"])->name("user.login.view");

Route::post("/login/auth", [UserController::class, "UserLogin"])->name("user.login");


Route::group(['middleware' => ['userauth']], function () {

    
   //order operations

    Route::get("/order",[OrderController::class, "ViewOrderPage"])->name("view.order");

    Route::post("/order/checkout", [OrderController::class, "OrderCheckout"])->name("order.checkout");
    
    Route::get("/order/cancel/{id}",[OrderController::class,"CancelOrder"])->name("order.cancel");


    Route::get("/myaccount", [UserController::class, "MyAccountPage"])->name("my.account");

    Route::post("/myaccount/personalinfo/update",[UserController::class,"PersonalinfoUpdate"])->name("myaccount.personal.update");

    Route::post("/user/password/update",[UserController::class,"PasswordUpdate"])->name("password.update");

    Route::post("/online/pay",[OrderController::class, "PayOnline"])->name("razorpay.payment.store");
    
    //user logout

    Route::get("/logout",[UserController::class,"Logout"])->name("user.logout");
});

//frontend ends





Route::get('/admin/login', function () {
    return view('admin.admin_login');
})->name("admin.login.view");

Route::post("admin/auth", [AdminController::class, 'AdminLogin'])->name("admin.login");

Route::group(['middleware' => ['adminauth']], function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.admin_index');
    })->name("admin.dashboard");

    Route::get("/category/view", [CategoryControler::class, "ViewCategory"])->name("view.category");

    Route::post("/category/add", [CategoryControler::class, "AddCategory"])->name("category.add");

    Route::get("/category/edit/{id}", [CategoryControler::class, "EditCategory"])->name("edit.category");

    Route::post("category/update/{id}", [CategoryControler::class, "UpdateCategory"])->name("update.category");

    Route::get("category/delete/{id}",[CategoryControler::class,"DeleteCategory"])->name("delete.category");

    //product CRUD

    Route::get("/product/add", [ProductController::class, "AddProduct"])->name("add.product");

    Route::post("/product/store", [ProductController::class, "StoreProduct"])->name("store.product");

    Route::get("/product/manage", [ProductController::class, "ManageProduct"])->name("manage.product");

    Route::get("/product/edit/{id}",[ProductController::class,"EditProduct"])->name("edit.product");

    Route::post("/product/update",[ProductController::class,"UpdateProduct"])->name("update.product");

    Route::post("/product/image/update",[ProductController::class,"ImageUpdate"])->name("product.image.update");

    Route::get("/product/delete/{id}",[ProductController::class,"DeleteProduct"])->name("delete.product");


    //city CRUD 

    Route::get('/city/view', [CityController::class, "ViewCity"])->name("view.city");
    Route::post('/city/store', [CityController::class, 'CityStore'])->name("city.store");
    Route::get('/city/edit/{id}', [CityController::class, 'CityEdit'])->name("city.edit");
    Route::post('/city/update', [CityController::class, 'CityUpdate'])->name("city.update");
    Route::get('/city/delete/{id}', [CityController::class, 'CityDelete'])->name("city.delete");

    //password 

    Route::get('/admin/password/change',[AdminController::class,'ChangePassword'])->name("admin.change.password");

    Route::post('/admin/password/update',[AdminController::class,'UpdatePassword'])->name("admin.update.password");

    Route::get("/admin/logout",[AdminController::class,"AdminLogout"])->name("admin.logout");
});


//admin2 - invoive

Route::get("/admin2/invoice/login", [Admin2Controller::class, "Admin2view"])->name("admin2.login.view");

Route::post("/admin2/login", [Admin2Controller::class, "Admin2Login"])->name("admin2.login");

Route::group(['middleware' => ['admin2auth']], function () {

    Route::get("/admin/invoice", [Admin2Controller::class, "Admin2Dashboard"])->name("admin2.index");

    Route::get("/delivery",[DeliveryController::class, "DeliveryView"])->name("view.delivery");

    Route::get("/delivery/success/{id}",[DeliveryController::class, "DeliverySuccess"])->name("delivery.success");
    
    Route::get("/bill/add/customer",[BillController::class,"AddCustomer"])->name("add.customer");

    Route::post("/bill/customer/store",[BillController::class,"StoreCustomer"])->name("store.customer");

    Route::get("/bill/product/add/{id}",[BillController::class, "ProductAdd"])->name("bill.product.add");
   
    Route::post("/bill/order/store",[BillController::class, "OrderStore"])->name("order.store");

    Route::get("/invoice/offline/{id}",[BillController::class, "OfflineInvoice"])->name("offline.invoice");

    Route::get("/invoice/offline/view/{id}", [BillController::class, "OfflineInvoiceView"])->name("offline.invoice.view");

    Route::get("/invoice/online/{id}",[BillController::class, "OnlineInvoice"])->name("online.invoice");

    Route::get("/invoice/online/view/{id}",[BillController::class, "OnlineInvoiceView"])->name("online.invoice.view");
    
    Route::get("/admin2/logout", [Admin2Controller::class, "Admin2Logout"])->name("admin2.logout");

    Route::get("/credits/view",[Admin2Controller::class, "ViewCredits"])->name("view.credits");

    Route::get("/credit/pay/{id}",[Admin2Controller::class, "PayCredit"])->name("pay.credit");

});




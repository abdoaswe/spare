<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CaruserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\MerchantController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ProductRateController;
use App\Http\Controllers\CategoryBrandController;
use App\Http\Controllers\CategoryModelController;
use App\Http\Controllers\MainCentersRateController;
use App\Http\Controllers\MaintenanceCentersController;
use App\Http\Controllers\WebController;
use App\Http\Controllers\CardController;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\Provided_ServiceController;
use App\Http\Controllers\BookingControrller;
use App\Http\Controllers\OrderDeteilsController;






use App\Http\Controllers\AuthController;



/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// all routs /api here must be api auth


// Route::prefix('admin')->group(function () {

// });

Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('login',[AuthController::class ,'login']);
    Route::post('logout', [AuthController::class ,'logout']);
    Route::post('refresh', [AuthController::class ,'refresh']);
    Route::get('profile', [AuthController::class ,'userProfile']);
    // Route::post('register', [AuthController::class ,'register']);


});





Route::group(['middleware'=>['api','checkpassword'],'namespace'=>'Api'],function(){

    Route::get('/Users',[UserController::class,"index"]);
    Route::get("/Users/create",[UserController::class,"create"]);

    Route::post("/Users/store",[UserController::class,"store"]);
    Route::get ('/Users/{Userid}',[UserController::class,"show"]) ;

    Route::delete("/Users/delete/{id}",[UserController::class,"destroy"]);





});


/////////////////////////////caruser///////////////////////////////////////////

Route::get('/caruser',[CaruserController::class,"index"]);
Route::get("/caruser/create",[CaruserController::class,"create"]);

Route::post("/caruser/store",[CaruserController::class,"store"]);

Route::get ('/caruser/{caruserid}',[CaruserController::class,"show"]) ;
Route::put("/caruserupdate/{id}",[CaruserController::class,"update"]);

Route::delete("/caruser/delete/{id}",[CaruserController::class,"destroy"]);



/////////////////////////////////Home///////////////////////////////////////////
Route::get('/home', [HomeController::class, 'index'])->name('home');


////////////////////////categories////////////////////////////////////

Route::get('/categories',[CategoriesController::class,'index']);
Route::post("/categories/store",[CategoriesController::class,"store"]);
// Route::get("/categories/{id}/edit",[CategoriesController::class,"edit"]);
Route::delete("/categories/delete/{id}",[CategoriesController::class,"destroy"]);




/////////////////////////category_brand///////////////////////////////

Route::get('/categorybrand',[CategoryBrandController::class,'index']);
Route::post("/categorybrand/store",[CategoryBrandController::class,"store"]);
// Route::get("/categorybrand/{id}/edit",[CategoryBrandController::class,"edit"]);
Route::delete("/categorybrand/delete/{id}",[CategoryBrandController::class,"destroy"]);




////////////////////////////category_model////////////////////////////

Route::get('/categorymodel',[CategoryModelController::class,'index']);
Route::post("/categorymodel/store",[CategoryModelController::class,"store"]);
// Route::get("/categorymodel/{id}/edit",[CategoryModelController::class,"edit"]);
Route::delete("/categorymodel/delete/{id}",[CategoryModelController::class,"destroy"]);

////////////////////////////MaintenanceCenters////////////////////////
Route::get('/mainCenters',[MaintenanceCentersController::class,'index']);
Route::get('/mainCenters/Usermain',[MaintenanceCentersController::class,'MaintanShow']);

Route::get('/mainCenters',[MaintenanceCentersController::class,'ShowAllMen']);

Route::post("/mainCenters/store",[MaintenanceCentersController::class,"store"]);
Route::get("/mainCenters/archive",[MaintenanceCentersController::class,"archive"]);

// Route::put("/mainCenters/{id}",[MaintenanceCentersController::class,"update"]);
Route::get('/mainCenters/{id}',[MaintenanceCentersController::class,'show']);
Route::put('/mintance_status/{id}',[MaintenanceCentersController::class,'mintance_status']);
Route::post("/mainCentersUpdate",[MaintenanceCentersController::class,"update"]);



Route::delete("/mainCenters/delete/{id}",[MaintenanceCentersController::class,"destroy"])->withTrashed();
Route::get("/mainCenters/restore/{id}",[MaintenanceCentersController::class,"restore"])->withTrashed();


////////////////////////////MainCentersRate//////////////////////////

Route::get('/mainCentersRate',[MainCentersRateController::class,'index']);
Route::post("/mainCentersRate/store",[MainCentersRateController::class,"store"]);
Route::put("/mainCentersRate/{id}",[MainCentersRateController::class,"update"]);

Route::delete("/mainCentersRate/delete/{id}",[MainCentersRateController::class,"destroy"]);



////////////////////////////////Merchant////////////////////////////////

Route::get('/merchant',[MerchantController::class,'index']);
Route::get('/merchantAll',[MerchantController::class,'showall']);




Route::post("/merchant/store",[MerchantController::class,"store"]);
Route::get("/merchant/archive",[MerchantController::class,"archive"]);

Route::put("/merchant/{id}",[MerchantController::class,"update"]);

Route::put('/merchant_status/{id}',[MerchantController::class,'merchant_status']);

Route::get('/SingleMerchant',[MerchantController::class,'show']);

Route::delete("/merchant/delete/{id}",[MerchantController::class,"destroy"])->withTrashed();


Route::get("/merchant/restore/{id}",[MerchantController::class,"restore"])->withTrashed();










////////////////////////////////product///////////////////////////////


Route::get('/product',[ProductController::class,'index']);
// Route::get('/product',[ProductController::class,'index']);
Route::get('/Allproduct',[ProductController::class,'ProductAll']);
Route::post("/product/store",[ProductController::class,"store"]);
Route::get('/product/archive',[ProductController::class,"archive"]);
Route::get('/product/Adminarchive',[ProductController::class,"Adminarchive"]);



Route::put("/product/{id}/update",[ProductController::class,"update"]);

Route::get('/product/{id}',[ProductController::class,'show']);

Route::delete("/product/delete/{id}",[ProductController::class,"destroy"])->withTrashed();


Route::get('/product/restore/{id}',[ProductController::class,"restore"])->withTrashed();


////////////////////////////////ProductRate///////////////////////////

Route::get('/productrate',[ProductRateController::class,'index']);
Route::post("/productrate/store",[ProductRateController::class,"store"]);
Route::delete("/productrate/delete/{id}",[ProductRateController::class,"destroy"]);


////////////////////////////////card///////////////////////////////

Route::post("/card/multistore",[CardController::class,"multistore"]);
Route::get('/card',[CardController::class,'index']);
Route::get('/Show',[CardController::class,'Allcarts']);



Route::post("/card/store",[CardController::class,"store"]);
Route::post("/cardUp/{id}/{num}",[CardController::class,"update"]);
Route::delete("/card/delete/{id}",[CardController::class,"destroy"]);
Route::get("/card/{id}",[CardController::class,"show"]);
Route::delete("/card/deleteall",[CardController::class,"destroyall"]);
////////////////////////////////order///////////////////////////////


Route::get('/order',[OrderController::class,'index']);
Route::post("/order/store",[OrderController::class,"store"]);
Route::get('/order/archive',[OrderController::class,"archive"]);
Route::get('/order/show/{id}',[OrderController::class,"show"]);
Route::delete("/order/delete/{id}",[OrderController::class,"destroy"])->withTrashed();
Route::get('/order/restore/{id}',[OrderController::class,"restore"])->withTrashed();
////////////////////////////details////////////////////////////////////////////////

Route::get('/ordeteils',[OrderDeteilsController::class,'index']);
Route::get('/ordermerchant',[OrderDeteilsController::class,'ordermerchant']);



////////////////////webcontraoller//////////////////////////////////

Route::post('/web/store',[WebController::class,'store']);
// Route::get('/web',[WebController::class,'rates']);

Route::get('/web/{id}',[WebController::class,'rates']);
Route::get('/websearch/{name}',[WebController::class,'search']);
Route::get('/websearchUser/{id}',[WebController::class,'searchUser']);
Route::get('/searchCostomer/{name}',[WebController::class,'searchCostomer']);


Route::get('/websearchprice/{price}',[WebController::class,'searchprice']);

Route::get('filter/{id}', [WebController::class,"filter"]);
Route::get('/cityfilter/{id}',[WebController::class,'CityFilter']);

Route::get('filterbrand/{id}', [WebController::class,"filterBrand"]);


///////////////////////////NEW UPDATE TABLES//////////////////////////











// /////////////////Booking///////////////////////
Route::get('/Booking',[BookingControrller::class,'index']);
Route::post('/Booking/store','App\Http\Controllers\BookingControrller@store');
Route::delete('/Booking/delete/{id}',[BookingControrller::class,'destroy']);
// /////////////////Offer/////////////////////////
Route::get('/Offer',[OfferController::class,'index']);
Route::post('/Offer/store',[OfferController::class,'store']);
Route::delete('/Offer/delete/{id}',[OfferController::class,'destroy']);
///////////////////Provided_Services////////////////////////
Route::get('/provided','App\Http\Controllers\Provided_ServiceController@index');
Route::post('/provided/store','App\Http\Controllers\Provided_ServiceController@store');
Route::delete('/provided/delete/{id}',[Provided_ServiceController::class,'destroy']);
//////////////////maintenance rate/////////////////////////
Route::get('/maintrate',[MainCentersRateController::class,'index']);
Route::post('/maintrate/store',[MainCentersRateController::class,'store']);
Route::delete('/maintrate/delete/{id}',[MainCentersRateController::class,'destroy']);

/////////////////////////////city////////////////////
// Route::post('/web/city',[WebController::class,'storecity']);
Route::get('/citycat',[WebController::class,'show']);
Route::post('/citycat/store',[WebController::class,'storecity']);




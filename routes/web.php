<?php

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
//(pass the data to view ->with(['name'=>'ahmed atef','age'=> 29 ,'city'=>'cairo']))
//Route::get('/', function () {
//    return view('welcome')->with(['name'=>'ahmed atef','age'=> 29 ,'city'=>'cairo']);
//});

//(pass the data to view لكن يجب تعريفها فى الكنترولر)
//Route::get('/', function () {
  //  $data=[];
    //$data['id']=5;
    //$data['name']='ahmed';
    //$data['age']=30;

    //return view('welcome',$data);
//});

//Route::get('/test1', function () {
//    return 'Welcme';
//});
//
////Route Parameters Required {id}
//Route::get('/test2/{id}', function ($id) {
//    return $id;
//});
//
////Route Parameters optional {id?}
//Route::get('/test3/{id?}', function () {
//    return 'Welcme';
//});

//Route Name
//(->name('show') view للاختصار عند النداء عليها داخل ال)
//(<a href="{{route('show')}}" view ميثود النداء عليها في )
//Route::get('/show-string/{id?}', function ($id) {
//    return $id;
//})->name('show');
//
////namespace->معناه تحديد نطاق محدد لسهولة استخدام ما بداخله
////group->عمل جروب لتنفيذ امر واحد على المجموعة كاملة
////Fornt->controllers ننشئ فولدر بهذا الاسم داخل فولدر
//Route::namespace('Fornt')->group(function (){
//    //all route only access controller or methods in folder name Fornt
//    //(معناه كل الروت تتبع فولدر فورنت ولانتحكم بها الا من الكنترولر الى داخل فولدر فورنت وعدم كتابة فورنت قبل الكنترولر في كل روت 'Fornt/UserController@userAdminName')
//    Route::get('users','UserController@showUserName');
//});

//prefix-> Matches The "/users/show" URL(/users/show مع كل روت  users عدم تكرار )
//



//(اكتب كل حاجه هنا عايز اطبقها على مجموعة الروت ['prefix'=>'users'])
//(الطريقة المتبعة فى الشغل)
//Route::group(['prefix'=>'users','middleware'=>'auth'],function(){
//    //set of routes
//
//    Route::get('/',function(){
//        return 'work';
//    });
//
//    Route::get('show','UserController@showUserName');
//    Route::delete('delete','UserController@showUserName');
//    Route::get('edit','UserController@showUserName');
//    Route::put('update','UserController@showUserName');
//});
//meddleware طريقة كتابة ال
//Route::get('check',function(){
//    return 'middleware';
//})->middleware("auth");

//Route::namespace('Admin')->group(function (){
//    Route::get('second','SecondController@showString');
//});
//namespace->(Controller يستخدم مع ال )
//prefix->(Route يستخدم مع ال )
//Route::group(['namespace'=>'Admin','middleware'=>'auth'],function(){
//    Route::get('second1','SecondController@showString1')->middleware('auth');
//    Route::get('second2','SecondController@showString2');
//    Route::get('second3','SecondController@showString3');
//});
//Route::get('login',function (){
//    return 'login';
//})->name('login');
//resource->(php artisan make:controller NameController --resource روت به الميثود كلها جاهزة ينفذ بالامر)
//resource->(php artisan route:list لمعرفة الروت التي بداخله نكتب)
//Route::resource('news','NewsController');

//All Route on resource
//Route::get('news','NewsController@index');
//Route::get('news/{id}','NewsController@show');
//Route::post('news','NewsController@store');
//Route::get('news/create','NewsController@create');
//Route::get('news/{id}/edit','NewsController@edit');
//Route::post('update/{id}','NewsController@update');
//Route::delete('news/{id}','NewsController@delete');
//composer require laravel/ui="2" --dev->(install->ui->default)
//php artisan ui vue --auth->(install->ui->default auth)
//npm install && npm run dev
//@csrf->token(post من اجل الحماية ويتم التاكد من وجوده في جميع عمليات ال  post يرسل مع ميثود )



//Route::group(['namespace'=>'Fornt',],function (){
//    Route::get('index','UserController@getIndex');
//    Route::get('landing','LandingController@showLading');
//    Route::get('about','LandingController@showabout');
//});
//
//Auth::routes(['verify'=>true]);
//
//Route::get('/', 'HomeController@index')->name('home')->Middleware('verify');

Route::group(['prefix' => LaravelLocalization::setLocale(),
    'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]],function (){
    Route::group(['prefix'=>'offers','namespace'=>'Fornt'],function(){
//    Route::get('store','FirstController@store');
        Route::get('show','FirstController@getFillable');
        //LaravelLocalization::setLocale()(خاص بالترجمة )
        Route::post('store','FirstController@store')->name('offers.store');
        Route::get('index','UserController@getIndex');
        Route::get('create','FirstController@create');
        Route::get('all','FirstController@getAllOffers');
    });
});


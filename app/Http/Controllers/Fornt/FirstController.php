<?php

namespace App\Http\Controllers\Fornt;

use App\Http\Controllers\Controller;
use App\Http\Requests\OfferRequset;
use App\Models\Offer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use LaravelLocalization;


class FirstController extends Controller
{

    public function __construct()
    {
    }

//    public function getFillable(){
//        all request
//        return  Offer::get();
//       select request
//       return Offer::select('name','price','details')->get();
//
//    }

    public function getAllOffers(){
//        ->get() (كله Offer هنا معناه هاتلي جدول ال get)
         $offers = Offer::select(
            'id',
            'name_' . LaravelLocalization::getCurrentLocale() . ' as name',
            'details_' . LaravelLocalization::getCurrentLocale() . ' as details',
            'price'
        )->get();
        return view('offers.all',compact('offers'));
    }

//    public function store(){
//        Offer::create([
//            'name' =>   'name' ,
//            'price' =>  5 ,
//            'details' => "small" ,
//        ]);
//        return 'save successfully';


//    }

    public function create(){
        return view('offers.create');
    }

    public function store(OfferRequset $request)
    {
////       validate data before insert to database
////        Validator->validation class
////        make($request->all()(->all()->array الى $request لتحويل),[rules تاخذ القواعد],[messages تاخذ الرسالة])->array the validation
//        $rule= $this->getRules();
//        $message = $this->getMessages();
//        $validator = Validator::make($request->all(), $rule, $message);
////        fails()->(فشل)
//        if ($validator->fails()) {
//////            errors()اظهار كل الاخطاء
//////            ->errors()->first()اظهار اول خطأ
////            return $validator->errors()->first();
//            //        redirect()->back()->للرجوع للخلف
////        redirect()->to('offers.create')->للرجوع لمسار معين
//            return redirect()->to('offers/create')->withErrors($validator)->withInput($request->all('name','price','details'));
//        }
//      insert
        Offer::create([
            'name_en'    => $request->name_en,
            'name_ar'    => $request->name_ar,
            'details_en' => $request->details_en,
            'details_ar' =>$request->details_ar,
            'price'      => $request->price,
        ]);
        return redirect()->back()->with(['success'=>'تم اضافة العرض بنجاح']);
    }

//    protected function getRules(){
//        return $rule=
//            [
//                'name'=> 'required | max:100 | unique:offers,name',
//                'price'=> 'required | numeric',
//                'details'=>'required'
//            ];
//    }
//    protected function getMessages(){
//        return $message=
//        [
//            'name.required'=> 'اسم العرض مطلوب',
//            'name.max'=>'الاسم اكبر من المسموح به',
//            'name.unique'=>'اسم العرض موجود',
//            'price.required'=>'السعر مطلوب',
//            'price.numeric'=>'سعر العرض يجب ان يكون ارقام فقط',
//            'details.required'=>'التفاصيل مطلوبة',
//        ];

////         https://github.com/mcamara/laravel-localization#installation(لينك الكود من الجيت)
////         composer require mcamara/laravel-localization=>(كود تحميل باكج تعدد اللغات)
////         php artisan vendor:publish --provider="Mcamara\LaravelLocalization\LaravelLocalizationServiceProvider"(كود تفعيل تعدد اللغات)
//        return $message=
//            [
////                trans or ( __ ) ميثود للنداء على ملف الترجمة ('messages.offer name')  نكتب اسم الملف  دوت المفتاح لمصفوفة مثال
//                'name.required'=>trans('messages.offer name'),
//                'name.max'=>trans('messages.name max'),
//                'name.unique'=>trans('messages.name unique'),
//                'price.required'=>__('messages.price required'),
//                'price.numeric'=>trans('messages.price numeric'),
//                'details.required'=>trans('messages.details required'),
//            ];
//    }

    public function editOffer($offer_id){
        return $offer_id;
    }

}

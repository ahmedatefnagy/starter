<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OfferRequset extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return
        [
            'name_en'=> 'required | max:100 | unique:offers,name_en',
            'name_ar'=> 'required | max:100 | unique:offers,name_ar',
            'price'=> 'required | numeric',
            'details_en'=>'required',
            'details_ar'=>'required',
        ];
    }

    public function messages()
    {
//        return
//            [
//                'name.required'=> 'اسم العرض مطلوب',
//                'name.max'=>'الاسم اكبر من المسموح به',
//                'name.unique'=>'اسم العرض موجود',
//                'price.required'=>'السعر مطلوب',
//                'price.numeric'=>'سعر العرض يجب ان يكون ارقام فقط',
//                'details.required'=>'التفاصيل مطلوبة',
//            ];

        //         https://github.com/mcamara/laravel-localization#installation(لينك الكود من الجيت)
//         composer require mcamara/laravel-localization=>(كود تحميل باكج تعدد اللغات)
//         php artisan vendor:publish --provider="Mcamara\LaravelLocalization\LaravelLocalizationServiceProvider"(كود تفعيل تعدد اللغات)
        return $message=
            [
//                trans or ( __ ) ميثود للنداء على ملف الترجمة ('messages.offer name')  نكتب اسم الملف  دوت المفتاح لمصفوفة مثال
            'name_en.required'=>trans('messages.offer name'),
            'name_en.max'=>trans('messages.name max'),
            'name_en.unique'=>trans('messages.name unique'),
            'name_ar.required'=>trans('messages.offer name'),
            'name_ar.max'=>trans('messages.name max'),
            'name_ar.unique'=>trans('messages.name unique'),
            'price.required'=>__('messages.price required'),
            'price.numeric'=>trans('messages.price numeric'),
            'details_en.required'=>trans('messages.details required'),
            'details_ar.required'=>trans('messages.details required'),
        ];
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    //protected $table->(تستخدم في حالة تغيير اسم الجدول عن قواعد الموديل وهي استخدام نفس اسم الموديل لاسم الجدول مع زيادة حرف الاس)
    protected $table = 'Offers';
    //protected $fillable->(يكتب العمدان المسموح لها بالتعامل مع قاعدة البيانات )
    protected $fillable = ['name','price','details','created_at','updated_at'];
    //protected $hidden->( hidden عند النداء على جميع العمدان لايظهر اي عمود مكتوب في  )
    protected $hidden = ['created_at','updated_at'];
//    $timestamps->stop
//    public $timestamps = false;

}

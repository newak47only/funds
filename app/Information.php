<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Information extends Model
{
    //
     protected $table="information";
     protected $fillable=['name','cont_name','cont_phone','staff_name','staff_phone','emp_id','currency','investment','industry','content','status','process','appeal','cont_main','cont_unit','check_id','circule_to','issuer_id','company','reg_cap','scope','country_id','continent_id','major_pro','reg_currency','neg_at'];

    protected $dates = ['created_at','updated_at','neg_at'];
     
     //public function info_nego(){
     //	return  $this->hasOne('App\Emp','id','emp_id');
     //}
     public function info_nego(){
     	return  $this->hasMany('App\Negotiation','info_id','id');
     }
     public function info_sta(){
     	return  $this->hasMany('App\Statistics','info_id','id');
     }
     public function info_loader(){
          return  $this->hasMany('App\Uploader','info_id','id');
     }
     public function info_emp(){
          return  $this->hasOne('App\Emp','id','emp_id');
     }
     public function info_ciremp(){
          return  $this->hasOne('App\Emp','id','circule_id');
     }

     public function info_area(){
          return  $this->hasOne('App\Area','YAT_ID','country_id');
     }
     public function info_continent(){
          return  $this->hasOne('App\Area','YAT_ID','continent_id');
     }

     public function info_industry(){
          return  $this->hasOne('App\Industry','id','industry');
     }
     public function info_major(){
          return  $this->hasOne('App\Majorproject','id','major_pro');
     }
}

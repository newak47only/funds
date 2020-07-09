<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Information,App\Emp,App\Dept,App\Negotiation,App\Recode,App\Industry,App\Area;
use Auth,DB;

class ComparisonController extends Controller
{
     public function  comresult($str){

     	$str = explode(",",$str);
        //利用循环将需要删除的id 一个一个进行执行sql；
        $info_id = $str[0];
        $information = Information::findOrFail($info_id)->toArray();
        //dd($information['name']);
        if($information['country_id'] == 7){

        $hundredper = Information::where([
        	['name','=',$information['name']],
        	['cont_main','=',$information['cont_main']],
        	['cont_unit','=',$information['cont_unit']],
        	['industry','=',$information['industry']],
        	['cont_name','=',$information['cont_name']],
        	['process','>','1'],
            ['country_id','=','7'],
        ])->count();
        $hundredper=$hundredper-1;
        $eightper = Information::orwhere([
        	['cont_main','=',$information['cont_main']],
        	['cont_unit','=',$information['cont_unit']],
        	['industry','=',$information['industry']],
        	['cont_name','=',$information['cont_name']],
        	['process','>','1'],['country_id','=','7'],
        ])->orwhere([
        	['name','=',$information['name']],
        	['cont_unit','=',$information['cont_unit']],
        	['industry','=',$information['industry']],
        	['cont_name','=',$information['cont_name']],
        	['process','>','1'],['country_id','=','7'],
        ])->orwhere([
        	['name','=',$information['name']],
        	['cont_main','=',$information['cont_main']],
        	['industry','=',$information['industry']],
        	['cont_name','=',$information['cont_name']],
        	['process','>','1'],['country_id','=','7'],
        ])->orwhere([
        	['name','=',$information['name']],
        	['cont_main','=',$information['cont_main']],
        	['cont_unit','=',$information['cont_unit']],
        	['cont_name','=',$information['cont_name']],
        	['process','>','1'],['country_id','=','7'],
        ])->orwhere([
        	['name','=',$information['name']],
        	['cont_main','=',$information['cont_main']],
        	['cont_unit','=',$information['cont_unit']],
        	['industry','=',$information['industry']],
        	['process','>','1'],['country_id','=','7'],
        ])->count();
        $eightper=$eightper-1;
        //dd($eightpre);

        $sixtyper = Information::orwhere([
            ['cont_unit','=',$information['cont_unit']],
            ['industry','=',$information['industry']],
            ['cont_name','=',$information['cont_name']],
            ['process','>','1'],['country_id','=','7'],
        ])->orwhere([
            ['cont_main','=',$information['cont_main']],
            ['industry','=',$information['industry']],
            ['cont_name','=',$information['cont_name']],
            ['process','>','1'],['country_id','=','7'],
        ])->orwhere([
            ['cont_main','=',$information['cont_main']],
            ['cont_unit','=',$information['cont_unit']],
            ['cont_name','=',$information['cont_name']],
            ['process','>','1'],['country_id','=','7'],
        ])->orwhere([
            ['cont_main','=',$information['cont_main']],
            ['cont_unit','=',$information['cont_unit']],
            ['industry','=',$information['industry']],
            ['process','>','1'],['country_id','=','7'],
        ])->orwhere([
            ['name','=',$information['name']],
            ['industry','=',$information['industry']],
            ['cont_name','=',$information['cont_name']],
            ['process','>','1'],['country_id','=','7'],
        ])->orwhere([
            ['name','=',$information['name']],
            ['cont_unit','=',$information['cont_unit']],
            ['cont_name','=',$information['cont_name']],
            ['process','>','1'],['country_id','=','7'],
        ])->orwhere([
            ['name','=',$information['name']],
            ['cont_unit','=',$information['cont_unit']],
            ['industry','=',$information['industry']],
            ['process','>','1'],['country_id','=','7'],
        ])->orwhere([
            ['name','=',$information['name']],
            ['cont_main','=',$information['cont_main']],
            ['cont_name','=',$information['cont_name']],
            ['process','>','1'],['country_id','=','7'],
        ])->orwhere([
            ['name','=',$information['name']],
            ['cont_main','=',$information['cont_main']],
            ['industry','=',$information['industry']],
            ['process','>','1'],['country_id','=','7'],
        ])->orwhere([
            ['name','=',$information['name']],
            ['cont_main','=',$information['cont_main']],
            ['cont_unit','=',$information['cont_unit']],
            ['process','>','1'],['country_id','=','7'],
        ])->count();

        $sixtyper = $sixtyper-1;

        $fourtyper = Information::orwhere([
            ['name','=',$information['name']],
            ['cont_main','=',$information['cont_main']],
            ['process','>','1'],['country_id','=','7'],
        ])->orwhere([
            ['name','=',$information['name']],
            ['cont_unit','=',$information['cont_unit']],
            ['process','>','1'],['country_id','=','7'],
        ])->orwhere([
            ['name','=',$information['name']],
            ['industry','=',$information['industry']],
            ['process','>','1'],['country_id','=','7'],
        ])->orwhere([
            ['name','=',$information['name']],
            ['cont_name','=',$information['cont_name']],
            ['process','>','1'],['country_id','=','7'],
        ])->orwhere([
            ['cont_main','=',$information['cont_main']],
            ['cont_unit','=',$information['cont_unit']],
            ['process','>','1'],['country_id','=','7'],
        ])->orwhere([
            ['cont_main','=',$information['cont_main']],
            ['industry','=',$information['industry']],
            ['process','>','1'],['country_id','=','7'],
        ])->orwhere([
            ['cont_main','=',$information['cont_main']],
            ['cont_name','=',$information['cont_name']],
            ['process','>','1'],['country_id','=','7'],
        ])->orwhere([
            ['cont_unit','=',$information['cont_unit']],
            ['industry','=',$information['industry']],
            ['process','>','1'],['country_id','=','7'],
        ])->orwhere([
            ['cont_unit','=',$information['cont_unit']],
            ['cont_name','=',$information['cont_name']],
            ['process','>','1'],['country_id','=','7'],
        ])->orwhere([
            ['industry','=',$information['industry']],
            ['cont_name','=',$information['cont_name']],
            ['process','>','1'],['country_id','=','7'],
        ])->count();

        $fourtyper = $fourtyper-1;

        $twoper = Information::orwhere([
            ['name','=',$information['name']],
            ['process','>','1'],['country_id','=','7'],
        ])->orwhere([
            ['cont_main','=',$information['cont_main']],
            ['process','>','1'],['country_id','=','7'],
        ])->orwhere([
            ['cont_unit','=',$information['cont_unit']],
            ['process','>','1'],['country_id','=','7'],
        ])->orwhere([
            ['industry','=',$information['industry']],
            ['process','>','1'],['country_id','=','7'],
        ])->orwhere([
            ['cont_name','=',$information['cont_name']],
            ['process','>','1'],['country_id','=','7'],
        ])->count();

        $twoper = $twoper-1;

    }else{

                $hundredper = Information::where([
            ['name','=',$information['name']],
            ['cont_main','=',$information['cont_main']],
            ['cont_unit','=',$information['cont_unit']],
            ['industry','=',$information['industry']],
            ['cont_name','=',$information['cont_name']],
            ['process','>','1'],['country_id','!=','7'],
        ])->count();
        $hundredper=$hundredper-1;
        $eightper = Information::orwhere([
            ['cont_main','=',$information['cont_main']],
            ['cont_unit','=',$information['cont_unit']],
            ['industry','=',$information['industry']],
            ['cont_name','=',$information['cont_name']],
            ['process','>','1'],['country_id','!=','7'],
        ])->orwhere([
            ['name','=',$information['name']],
            ['cont_unit','=',$information['cont_unit']],
            ['industry','=',$information['industry']],
            ['cont_name','=',$information['cont_name']],
            ['process','>','1'],['country_id','!=','7'],
        ])->orwhere([
            ['name','=',$information['name']],
            ['cont_main','=',$information['cont_main']],
            ['industry','=',$information['industry']],
            ['cont_name','=',$information['cont_name']],
            ['process','>','1'],['country_id','!=','7'],
        ])->orwhere([
            ['name','=',$information['name']],
            ['cont_main','=',$information['cont_main']],
            ['cont_unit','=',$information['cont_unit']],
            ['cont_name','=',$information['cont_name']],
            ['process','>','1'],['country_id','!=','7'],
        ])->orwhere([
            ['name','=',$information['name']],
            ['cont_main','=',$information['cont_main']],
            ['cont_unit','=',$information['cont_unit']],
            ['industry','=',$information['industry']],
            ['process','>','1'],['country_id','!=','7'],
        ])->count();
        $eightper=$eightper-1;
        //dd($eightpre);

        $sixtyper = Information::orwhere([
            ['cont_unit','=',$information['cont_unit']],
            ['industry','=',$information['industry']],
            ['cont_name','=',$information['cont_name']],
            ['process','>','1'],['country_id','!=','7'],
        ])->orwhere([
            ['cont_main','=',$information['cont_main']],
            ['industry','=',$information['industry']],
            ['cont_name','=',$information['cont_name']],
            ['process','>','1'],['country_id','!=','7'],
        ])->orwhere([
            ['cont_main','=',$information['cont_main']],
            ['cont_unit','=',$information['cont_unit']],
            ['cont_name','=',$information['cont_name']],
            ['process','>','1'],['country_id','!=','7'],
        ])->orwhere([
            ['cont_main','=',$information['cont_main']],
            ['cont_unit','=',$information['cont_unit']],
            ['industry','=',$information['industry']],
            ['process','>','1'],['country_id','!=','7'],
        ])->orwhere([
            ['name','=',$information['name']],
            ['industry','=',$information['industry']],
            ['cont_name','=',$information['cont_name']],
            ['process','>','1'],['country_id','!=','7'],
        ])->orwhere([
            ['name','=',$information['name']],
            ['cont_unit','=',$information['cont_unit']],
            ['cont_name','=',$information['cont_name']],
            ['process','>','1'],['country_id','!=','7'],
        ])->orwhere([
            ['name','=',$information['name']],
            ['cont_unit','=',$information['cont_unit']],
            ['industry','=',$information['industry']],
            ['process','>','1'],['country_id','!=','7'],
        ])->orwhere([
            ['name','=',$information['name']],
            ['cont_main','=',$information['cont_main']],
            ['cont_name','=',$information['cont_name']],
            ['process','>','1'],['country_id','!=','7'],
        ])->orwhere([
            ['name','=',$information['name']],
            ['cont_main','=',$information['cont_main']],
            ['industry','=',$information['industry']],
            ['process','>','1'],['country_id','!=','7'],
        ])->orwhere([
            ['name','=',$information['name']],
            ['cont_main','=',$information['cont_main']],
            ['cont_unit','=',$information['cont_unit']],
            ['process','>','1'],['country_id','!=','7'],
        ])->count();

        $sixtyper = $sixtyper-1;

        $fourtyper = Information::orwhere([
            ['name','=',$information['name']],
            ['cont_main','=',$information['cont_main']],
            ['process','>','1'],['country_id','!=','7'],
        ])->orwhere([
            ['name','=',$information['name']],
            ['cont_unit','=',$information['cont_unit']],
            ['process','>','1'],['country_id','!=','7'],
        ])->orwhere([
            ['name','=',$information['name']],
            ['industry','=',$information['industry']],
            ['process','>','1'],['country_id','!=','7'],
        ])->orwhere([
            ['name','=',$information['name']],
            ['cont_name','=',$information['cont_name']],
            ['process','>','1'],['country_id','!=','7'],
        ])->orwhere([
            ['cont_main','=',$information['cont_main']],
            ['cont_unit','=',$information['cont_unit']],
            ['process','>','1'],['country_id','!=','7'],
        ])->orwhere([
            ['cont_main','=',$information['cont_main']],
            ['industry','=',$information['industry']],
            ['process','>','1'],['country_id','!=','7'],
        ])->orwhere([
            ['cont_main','=',$information['cont_main']],
            ['cont_name','=',$information['cont_name']],
            ['process','>','1'],['country_id','!=','7'],
        ])->orwhere([
            ['cont_unit','=',$information['cont_unit']],
            ['industry','=',$information['industry']],
            ['process','>','1'],['country_id','!=','7'],
        ])->orwhere([
            ['cont_unit','=',$information['cont_unit']],
            ['cont_name','=',$information['cont_name']],
            ['process','>','1'],['country_id','!=','7'],
        ])->orwhere([
            ['industry','=',$information['industry']],
            ['cont_name','=',$information['cont_name']],
            ['process','>','1'],['country_id','!=','7'],
        ])->count();

        $fourtyper = $fourtyper-1;

        $twoper = Information::orwhere([
            ['name','=',$information['name']],
            ['process','>','1'],['country_id','!=','7'],
        ])->orwhere([
            ['cont_main','=',$information['cont_main']],
            ['process','>','1'],['country_id','!=','7'],
        ])->orwhere([
            ['cont_unit','=',$information['cont_unit']],
            ['process','>','1'],['country_id','!=','7'],
        ])->orwhere([
            ['industry','=',$information['industry']],
            ['process','>','1'],['country_id','!=','7'],
        ])->orwhere([
            ['cont_name','=',$information['cont_name']],
            ['process','>','1'],['country_id','!=','7'],
        ])->count();

        $twoper = $twoper-1;

    }


        
        return view('comparison.comresult')->with(compact('eightper','twoper','sixtyper','fourtyper','hundredper','info_id'));

     }

     public function  hundredper($info_id){

        $emps = Emp::get();
        $depts = Dept::get();
     	$information = Information::findOrFail($info_id)->toArray();
        if($information['country_id'] == 7){
             $hundredper = Information::where([
                ['name','=',$information['name']],
                ['cont_main','=',$information['cont_main']],
                ['cont_unit','=',$information['cont_unit']],
                ['industry','=',$information['industry']],
                ['cont_name','=',$information['cont_name']],
                ['process','>','1'],
                ['country_id','=','7'],

            ])->get();

        }else{

             $hundredper = Information::where([
                ['name','=',$information['name']],
                ['cont_main','=',$information['cont_main']],
                ['cont_unit','=',$information['cont_unit']],
                ['industry','=',$information['industry']],
                ['cont_name','=',$information['cont_name']],
                ['process','>','1'],
                ['country_id','!=','7'],

            ])->get();

        }

     	return view('comparison.hundredper')->with(compact('hundredper','emps','depts','info_id'));


     }

    public function  eightper($info_id){

        $emps = Emp::get();
        $depts = Dept::get();
        $information = Information::findOrFail($info_id)->toArray();
        if($information['country_id'] == 7){
        $eightper = Information::orwhere([
            ['cont_main','=',$information['cont_main']],
            ['cont_unit','=',$information['cont_unit']],
            ['industry','=',$information['industry']],
            ['cont_name','=',$information['cont_name']],
            ['process','>','1'],['country_id','=','7'],
        ])->orwhere([
            ['name','=',$information['name']],
            ['cont_unit','=',$information['cont_unit']],
            ['industry','=',$information['industry']],
            ['cont_name','=',$information['cont_name']],
            ['process','>','1'],['country_id','=','7'],
        ])->orwhere([
            ['name','=',$information['name']],
            ['cont_main','=',$information['cont_main']],
            ['industry','=',$information['industry']],
            ['cont_name','=',$information['cont_name']],
            ['process','>','1'],['country_id','=','7'],
        ])->orwhere([
            ['name','=',$information['name']],
            ['cont_main','=',$information['cont_main']],
            ['cont_unit','=',$information['cont_unit']],
            ['cont_name','=',$information['cont_name']],
            ['process','>','1'],['country_id','=','7'],
        ])->orwhere([
            ['name','=',$information['name']],
            ['cont_main','=',$information['cont_main']],
            ['cont_unit','=',$information['cont_unit']],
            ['industry','=',$information['industry']],
            ['process','>','1'],['country_id','=','7'],
        ])->get();
    }else{

        $eightper = Information::orwhere([
            ['cont_main','=',$information['cont_main']],
            ['cont_unit','=',$information['cont_unit']],
            ['industry','=',$information['industry']],
            ['cont_name','=',$information['cont_name']],
            ['process','>','1'],['country_id','!=','7'],
        ])->orwhere([
            ['name','=',$information['name']],
            ['cont_unit','=',$information['cont_unit']],
            ['industry','=',$information['industry']],
            ['cont_name','=',$information['cont_name']],
            ['process','>','1'],['country_id','!=','7'],
        ])->orwhere([
            ['name','=',$information['name']],
            ['cont_main','=',$information['cont_main']],
            ['industry','=',$information['industry']],
            ['cont_name','=',$information['cont_name']],
            ['process','>','1'],['country_id','!=','7'],
        ])->orwhere([
            ['name','=',$information['name']],
            ['cont_main','=',$information['cont_main']],
            ['cont_unit','=',$information['cont_unit']],
            ['cont_name','=',$information['cont_name']],
            ['process','>','1'],['country_id','!=','7'],
        ])->orwhere([
            ['name','=',$information['name']],
            ['cont_main','=',$information['cont_main']],
            ['cont_unit','=',$information['cont_unit']],
            ['industry','=',$information['industry']],
            ['process','>','1'],['country_id','!=','7'],
        ])->get();
    }

        return view('comparison.eightper')->with(compact('eightper','emps','depts','info_id'));


     }

    public function  sixtyper($info_id){

        $emps = Emp::get();
        $depts = Dept::get();
        $information = Information::findOrFail($info_id)->toArray();
        if($information['country_id'] == 7){
        $sixtyper = Information::orwhere([
            ['cont_unit','=',$information['cont_unit']],
            ['industry','=',$information['industry']],
            ['cont_name','=',$information['cont_name']],
            ['process','>','1'],['country_id','=','7'],
        ])->orwhere([
            ['cont_main','=',$information['cont_main']],
            ['industry','=',$information['industry']],
            ['cont_name','=',$information['cont_name']],
            ['process','>','1'],['country_id','=','7'],
        ])->orwhere([
            ['cont_main','=',$information['cont_main']],
            ['cont_unit','=',$information['cont_unit']],
            ['cont_name','=',$information['cont_name']],
            ['process','>','1'],['country_id','=','7'],
        ])->orwhere([
            ['cont_main','=',$information['cont_main']],
            ['cont_unit','=',$information['cont_unit']],
            ['industry','=',$information['industry']],
            ['process','>','1'],['country_id','=','7'],
        ])->orwhere([
            ['name','=',$information['name']],
            ['industry','=',$information['industry']],
            ['cont_name','=',$information['cont_name']],
            ['process','>','1'],['country_id','=','7'],
        ])->orwhere([
            ['name','=',$information['name']],
            ['cont_unit','=',$information['cont_unit']],
            ['cont_name','=',$information['cont_name']],
            ['process','>','1'],['country_id','=','7'],
        ])->orwhere([
            ['name','=',$information['name']],
            ['cont_unit','=',$information['cont_unit']],
            ['industry','=',$information['industry']],
            ['process','>','1'],['country_id','=','7'],
        ])->orwhere([
            ['name','=',$information['name']],
            ['cont_main','=',$information['cont_main']],
            ['cont_name','=',$information['cont_name']],
            ['process','>','1'],['country_id','=','7'],
        ])->orwhere([
            ['name','=',$information['name']],
            ['cont_main','=',$information['cont_main']],
            ['industry','=',$information['industry']],
            ['process','>','1'],['country_id','=','7'],
        ])->orwhere([
            ['name','=',$information['name']],
            ['cont_main','=',$information['cont_main']],
            ['cont_unit','=',$information['cont_unit']],
            ['process','>','1'],['country_id','=','7'],
        ])->get();
    }else{

        $sixtyper = Information::orwhere([
            ['cont_unit','=',$information['cont_unit']],
            ['industry','=',$information['industry']],
            ['cont_name','=',$information['cont_name']],
            ['process','>','1'],['country_id','!=','7'],
        ])->orwhere([
            ['cont_main','=',$information['cont_main']],
            ['industry','=',$information['industry']],
            ['cont_name','=',$information['cont_name']],
            ['process','>','1'],['country_id','!=','7'],
        ])->orwhere([
            ['cont_main','=',$information['cont_main']],
            ['cont_unit','=',$information['cont_unit']],
            ['cont_name','=',$information['cont_name']],
            ['process','>','1'],['country_id','!=','7'],
        ])->orwhere([
            ['cont_main','=',$information['cont_main']],
            ['cont_unit','=',$information['cont_unit']],
            ['industry','=',$information['industry']],
            ['process','>','1'],['country_id','!=','7'],
        ])->orwhere([
            ['name','=',$information['name']],
            ['industry','=',$information['industry']],
            ['cont_name','=',$information['cont_name']],
            ['process','>','1'],['country_id','!=','7'],
        ])->orwhere([
            ['name','=',$information['name']],
            ['cont_unit','=',$information['cont_unit']],
            ['cont_name','=',$information['cont_name']],
            ['process','>','1'],['country_id','!=','7'],
        ])->orwhere([
            ['name','=',$information['name']],
            ['cont_unit','=',$information['cont_unit']],
            ['industry','=',$information['industry']],
            ['process','>','1'],['country_id','!=','7'],
        ])->orwhere([
            ['name','=',$information['name']],
            ['cont_main','=',$information['cont_main']],
            ['cont_name','=',$information['cont_name']],
            ['process','>','1'],['country_id','!=','7'],
        ])->orwhere([
            ['name','=',$information['name']],
            ['cont_main','=',$information['cont_main']],
            ['industry','=',$information['industry']],
            ['process','>','1'],['country_id','!=','7'],
        ])->orwhere([
            ['name','=',$information['name']],
            ['cont_main','=',$information['cont_main']],
            ['cont_unit','=',$information['cont_unit']],
            ['process','>','1'],['country_id','!=','7'],
        ])->get();

    }

        return view('comparison.sixtyper')->with(compact('sixtyper','emps','depts','info_id'));


     }

    public function  fourtyper($info_id){

        $emps = Emp::get();
        $depts = Dept::get();
        $information = Information::findOrFail($info_id)->toArray();
        if($information['country_id'] == 7){
        $fourtyper = Information::orwhere([
            ['name','=',$information['name']],
            ['cont_main','=',$information['cont_main']],
            ['process','>','1'],['country_id','=','7'],
        ])->orwhere([
            ['name','=',$information['name']],
            ['cont_unit','=',$information['cont_unit']],
            ['process','>','1'],['country_id','=','7'],
        ])->orwhere([
            ['name','=',$information['name']],
            ['industry','=',$information['industry']],
            ['process','>','1'],['country_id','=','7'],
        ])->orwhere([
            ['name','=',$information['name']],
            ['cont_name','=',$information['cont_name']],
            ['process','>','1'],['country_id','=','7'],
        ])->orwhere([
            ['cont_main','=',$information['cont_main']],
            ['cont_unit','=',$information['cont_unit']],
            ['process','>','1'],['country_id','=','7'],
        ])->orwhere([
            ['cont_main','=',$information['cont_main']],
            ['industry','=',$information['industry']],
            ['process','>','1'],['country_id','=','7'],
        ])->orwhere([
            ['cont_main','=',$information['cont_main']],
            ['cont_name','=',$information['cont_name']],
            ['process','>','1'],['country_id','=','7'],
        ])->orwhere([
            ['cont_unit','=',$information['cont_unit']],
            ['industry','=',$information['industry']],
            ['process','>','1'],['country_id','=','7'],
        ])->orwhere([
            ['cont_unit','=',$information['cont_unit']],
            ['cont_name','=',$information['cont_name']],
            ['process','>','1'],['country_id','=','7'],
        ])->orwhere([
            ['industry','=',$information['industry']],
            ['cont_name','=',$information['cont_name']],
            ['process','>','1'],['country_id','=','7'],
        ])->get();
    }else{

        $fourtyper = Information::orwhere([
            ['name','=',$information['name']],
            ['cont_main','=',$information['cont_main']],
            ['process','>','1'],['country_id','!=','7'],
        ])->orwhere([
            ['name','=',$information['name']],
            ['cont_unit','=',$information['cont_unit']],
            ['process','>','1'],['country_id','!=','7'],
        ])->orwhere([
            ['name','=',$information['name']],
            ['industry','=',$information['industry']],
            ['process','>','1'],['country_id','!=','7'],
        ])->orwhere([
            ['name','=',$information['name']],
            ['cont_name','=',$information['cont_name']],
            ['process','>','1'],['country_id','!=','7'],
        ])->orwhere([
            ['cont_main','=',$information['cont_main']],
            ['cont_unit','=',$information['cont_unit']],
            ['process','>','1'],['country_id','!=','7'],
        ])->orwhere([
            ['cont_main','=',$information['cont_main']],
            ['industry','=',$information['industry']],
            ['process','>','1'],['country_id','!=','7'],
        ])->orwhere([
            ['cont_main','=',$information['cont_main']],
            ['cont_name','=',$information['cont_name']],
            ['process','>','1'],['country_id','!=','7'],
        ])->orwhere([
            ['cont_unit','=',$information['cont_unit']],
            ['industry','=',$information['industry']],
            ['process','>','1'],['country_id','!=','7'],
        ])->orwhere([
            ['cont_unit','=',$information['cont_unit']],
            ['cont_name','=',$information['cont_name']],
            ['process','>','1'],['country_id','!=','7'],
        ])->orwhere([
            ['industry','=',$information['industry']],
            ['cont_name','=',$information['cont_name']],
            ['process','>','1'],['country_id','!=','7'],
        ])->get();


    }

        return view('comparison.fourtyper')->with(compact('fourtyper','emps','depts','info_id'));


     }


    public function  twoper($info_id){

        $emps = Emp::get();
        $depts = Dept::get();
        $information = Information::findOrFail($info_id)->toArray();
        if($information['country_id'] == 7){
        $twoper = Information::orwhere([
            ['name','=',$information['name']],
            ['process','>','1'],['country_id','=','7'],
        ])->orwhere([
            ['cont_main','=',$information['cont_main']],
            ['process','>','1'],['country_id','=','7'],
        ])->orwhere([
            ['cont_unit','=',$information['cont_unit']],
            ['process','>','1'],['country_id','=','7'],
        ])->orwhere([
            ['industry','=',$information['industry']],
            ['process','>','1'],['country_id','=','7'],
        ])->orwhere([
            ['cont_name','=',$information['cont_name']],
            ['process','>','1'],['country_id','=','7'],
        ])->get();
    }else{

        $twoper = Information::orwhere([
            ['name','=',$information['name']],
            ['process','>','1'],['country_id','!=','7'],
        ])->orwhere([
            ['cont_main','=',$information['cont_main']],
            ['process','>','1'],['country_id','!=','7'],
        ])->orwhere([
            ['cont_unit','=',$information['cont_unit']],
            ['process','>','1'],['country_id','!=','7'],
        ])->orwhere([
            ['industry','=',$information['industry']],
            ['process','>','1'],['country_id','!=','7'],
        ])->orwhere([
            ['cont_name','=',$information['cont_name']],
            ['process','>','1'],['country_id','!=','7'],
        ])->get();

    }

        //dd($twoper);

        return view('comparison.twoper')->with(compact('twoper','emps','depts','info_id'));


     }





}

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
        $hundredper = Information::where([
        	['name','=',$information['name']],
        	['cont_main','=',$information['cont_main']],
        	['cont_unit','=',$information['cont_unit']],
        	['industry','=',$information['industry']],
        	['cont_name','=',$information['cont_name']],
        	['process','>','1'],
        ])->count();
        $hundredper=$hundredper-1;
        $eightpre = Information::orwhere([
        	['cont_main','=',$information['cont_main']],
        	['cont_unit','=',$information['cont_unit']],
        	['industry','=',$information['industry']],
        	['cont_name','=',$information['cont_name']],
        	['process','>','1'],
        ])->orwhere([
        	['name','=',$information['name']],
        	['cont_unit','=',$information['cont_unit']],
        	['industry','=',$information['industry']],
        	['cont_name','=',$information['cont_name']],
        	['process','>','1'],
        ])->orwhere([
        	['name','=',$information['name']],
        	['cont_main','=',$information['cont_main']],
        	['industry','=',$information['industry']],
        	['cont_name','=',$information['cont_name']],
        	['process','>','1'],
        ])->orwhere([
        	['name','=',$information['name']],
        	['cont_main','=',$information['cont_main']],
        	['cont_unit','=',$information['cont_unit']],
        	['cont_name','=',$information['cont_name']],
        	['process','>','1'],
        ])->orwhere([
        	['name','=',$information['name']],
        	['cont_main','=',$information['cont_main']],
        	['cont_unit','=',$information['cont_unit']],
        	['industry','=',$information['industry']],
        	['process','>','1'],
        ])->count();
        $eightpre=$eightpre-1;
        //dd($eightpre);

        
        return view('comparison.comresult')->with(compact('eightpre','hundredper','info_id'));

     }

     public function  hundredper($info_id){

        $emps = Emp::get();
        $depts = Dept::get();
     	$information = Information::findOrFail($info_id)->toArray();
     	$hundredper = Information::where([
        	['name','=',$information['name']],
        	['cont_main','=',$information['cont_main']],
        	['cont_unit','=',$information['cont_unit']],
        	['industry','=',$information['industry']],
        	['cont_name','=',$information['cont_name']],
        	['process','>','1'],
        ])->get();

     	return view('comparison.hundredper')->with(compact('hundredper','emps','depts'));


     }


}

<?php

namespace App\Http\Controllers;
use App\Emp,App\Information,App\Negotiation,App\Infoprocess,App\Dept,App\Recode,App\industry;
use Carbon\Carbon;
use Auth,DB;

use Illuminate\Http\Request;

class Foreigncontroller extends Controller
{
    
    public function list_city(){

        $emps = Emp::get();

        $depts = Dept::get();

        $information = Information::where('country_id','!=','7')->whereIn('process',[2,3,4,5,6])->get();


        return view('foreign.list_city')->with(compact('information','emps','depts'));
    }

    public function report_list(){

        $emps = Emp::get();

        $information = Information::where([

            ['is_show','=','1'],

            ['process','<','4']

        ])->get();

        foreach ($information as $key => $value) {

            $value->recodenum = Recode::where('info_id',$value->id)->count();

        }

        return view('foreign.report_list')->with(compact('information','emps'));

    }

    public function outlist_city(){


        $emps = Emp::get();

        $information=Information::where([
                    ['circule_id','!=','0'],

                    ['country_id','!=','7'],

             ])->whereIn('process',[7,8,9])->get();



        foreach ($information as $key => $value) {

            $recodenum = Recode::where('info_id',$value->id)->count();

            $f_emp = Emp::where('id',$value->emp_id)->first();

            $n_emp = Emp::where('id',$value->circule_id)->first();

            $c_emp = Emp::where('id',$value->check_id)->first(); 
   
                $value->circule_f_dept = $f_emp->dept->dept_name;

                $value->circule_f_name = $f_emp->username;

                $value->circule_n_dept = $n_emp->dept->dept_name;

                $value->circule_n_name = $n_emp->username;

                $value->track = $c_emp->username;

                $value->recodenum = $recodenum;
  
        }

        return view('foreign.outlist_city')->with(compact('information','emps'));

    }

    public function ownlist_city(){


        $emps = Emp::get();

        $information=Information::where([
                    ['circule_id','=','0'],
                    ['country_id','!=','7'],
             ])->whereIn('process',[7,8,9])->get();


        foreach ($information as $key => $value) {

            $recodenum = Recode::where('info_id',$value->id)->count();

            $f_emp = Emp::where('id',$value->emp_id)->first();

            $i_emp = Emp::where('id',$value->issuer_id)->first(); 
   
                $value->dept = $f_emp->dept->dept_name;

                $value->issuer = $i_emp->username;

                $value->recodenum = $recodenum;
  
        }

        return view('foreign.ownlist_city')->with(compact('information','emps'));

    }







}


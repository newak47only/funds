<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Recode,App\Emp,App\Information,App\Negotiation,App\Dept;
use Auth,DB;


class NegotiationController extends Controller
{
    //
    public function index()
    {
    
        $admin_id=Auth::user()->id;
        //dd($admin_id);
        $admin=Emp::where('id',$admin_id)->firstOrFail();
        //dd($admin->dept->dept_name);

        //独立完成项目
        $information=Information::where([
                    ['is_show','=','2'],
                    ['process','>','3'],
                    ['circule_id','=','0']
             ])->get();

        $info = [];
        foreach ($information as $key => $value) {
            $recodenum = Recode::where('info_id',$value->id)->count();
            $info[]=[
                'id'=> $value->id,
                'name' => $value->name,
                'cont_name' => $value->cont_name,
                'cont_phone' => $value->cont_phone,
                'emp_id' => $value->emp_id,
                'staff_name' => $value->staff_name,
                'staff_phone' => $value->staff_phone,
                'currency' => $value->currency,
                'investment' => $value->investment,
                'industry' => $value->industry,
                'investment' => $value->investment,
                'status' => $value->status,
                'process' => $value->process,
                'is_show' => $value->is_show,
                'dept' =>$admin->dept->dept_name,
                'recodenum'=>$recodenum,
             ]; 
        }
        //流转项目
        $info1 = [];
        $information1=Information::where([
                    ['process','>','3'],
                    ['circule_id','!=','0']
             ])->get();
        foreach ($information1 as $key => $value) {
            $nego = Negotiation::where([
                        ['info_id','=',$value->id],
                        ['actiontype','=','13'],
                        ['result','=','4'],
                    ])->first();
                    $n_emp=Emp::where('id',$nego['director_id'])->firstOrFail(); 
                    $circule = Dept::where('id',  $nego['status'])->first();
                    $info1[]=[
                        'id'=> $value->id,
                        'name' => $value->name,
                        'cont_name' => $value->cont_name,
                        'cont_phone' => $value->cont_phone,
                        'emp_id' => $value->emp_id,
                        'staff_name' => $value->staff_name,
                        'staff_phone' => $value->staff_phone,
                        'currency' => $value->currency,
                        'industry' => $value->industry,
                        'investment' => $value->investment,
                        'status' => $value->status,
                        'process' => $value->process,
                        'is_show' => $value->is_show,
                        'created_at' => $value->created_at,
                        'dept'  => $dept['dept_name'],
                        'circule_n_dept' => $n_emp->dept->dept_name,
                        'circule_n_name' => $n_emp->username,
                        'circule_n_phone' => $n_emp->phone,
                        'circule_f_dept' => $dept['dept_name'],
                        'circule_f_name' => $value->info_emp->username,
                        'circule_f_phone'=>$value->info_emp->phone,
                        'circule_to'    =>$circule['dept_name'],

                    ];    
        }


            //dd($info);            
            return view('negotiation.index')->with(compact('info','info1'));
    }

    public function index1(){
        $admin_id=Auth::user()->id;
        //dd($admin_id);
        $admin=Emp::where('id',$admin_id)->firstOrFail();
        //dd($admin->dept->dept_name);
        $admin_id = Auth::user()->id;
        //获取用户信息
        $emp = Emp::findOrFail($admin_id);
        //获取用户部门领导id
        $admin_director_id = $emp->dept->director_id;
        //dd($admin_director_id);
        $emp_arry = array ();
        //判断用户是否为所在用户组领导
        $dept_id=$emp->dept_id;
        //获取用户所在组成员
        $emps=Emp::where('dept_id',$emp->dept->id)->get();
            //获取用户所在组成员id数组
        foreach ($emps as $key => $value) {
            $emp_arry[]= array(
                $key=>$value->id,
            );
        } 

        //全区独立完成项目
        $information=Information::whereIn('emp_id',$emp_arry)->where([
                    ['process','>','3'],
                    ['circule_id','=','0'],
                    ['is_show','=','2'],
             ])->get();

        $info = [];
        foreach ($information as $key => $value) {
            $recodenum = Recode::where('info_id',$value->id)->count();
            $info[]=[
                'id'=> $value->id,
                'name' => $value->name,
                'cont_name' => $value->cont_name,
                'cont_phone' => $value->cont_phone,
                'emp_id' => $value->emp_id,
                'staff_name' => $value->staff_name,
                'staff_phone' => $value->staff_phone,
                'currency' => $value->currency,
                'investment' => $value->investment,
                'industry' => $value->industry,
                'investment' => $value->investment,
                'status' => $value->status,
                'process' => $value->process,
                'is_show' => $value->is_show,
                'dept' =>$admin->dept->dept_name,
                'recodenum'=>$recodenum,
             ]; 
        }
        //流转项目
        $info1 = [];
        $information1=Information::whereIn('circule_id',$emp_arry)->where('process','>','3')->get();
        foreach ($information1 as $key => $value) {
            $c_emp=Emp::where('id',$value->emp_id)->firstOrFail();
            $recodenum = Recode::where('info_id',$value->id)->count();
            $info1[]=[
                'id'=> $value->id,
                'name' => $value->name,
                'cont_name' => $value->cont_name,
                'cont_phone' => $value->cont_phone,
                'emp_id' => $value->emp_id,
                'staff_name' => $value->staff_name,
                'staff_phone' => $value->staff_phone,
                'currency' => $value->currency,
                'investment' => $value->investment,
                'industry' => $value->industry,
                'investment' => $value->investment,
                'status' => $value->status,
                'process' => $value->process,
                'is_show' => $value->is_show,
                'circule_f_dept' => $c_emp->dept->dept_name,
                'circule_f_name' => $c_emp->name,
                'circule_f_phone' => $c_emp->phone,
                'circule_n_dept' =>$admin->dept->dept_name,
                'recodenum'=>$recodenum,
             ]; 
        }
        //首谈地项目
        $info2 = [];
        $information2=Information::whereIn('emp_id',$emp_arry)->where([
                    ['process','>','3'],
                    ['circule_id','!=','0'],
             ])->get();
        foreach ($information2 as $key => $value) {
            $n_emp=Emp::where('id',$value->circule_id)->firstOrFail();  
            $recodenum = Recode::where('info_id',$value->id)->count();          
            $info2[]=[
                'id'=> $value->id,
                'name' => $value->name,
                'cont_name' => $value->cont_name,
                'cont_phone' => $value->cont_phone,
                'emp_id' => $value->emp_id,
                'staff_name' => $value->staff_name,
                'staff_phone' => $value->staff_phone,
                'currency' => $value->currency,
                'investment' => $value->investment,
                'industry' => $value->industry,
                'investment' => $value->investment,
                'status' => $value->status,
                'process' => $value->process,
                'is_show' => $value->is_show, 
                'circule_n_dept' => $n_emp->dept->dept_name,
                'circule_n_name' => $n_emp->name,
                'circule_n_phone' => $n_emp->phone,
                'circule_f_dept' => $admin->dept->dept_name,
                'recodenum'=>$recodenum,
             ]; 
        }
            //dd($info);            
            return view('negotiation.index1')->with(compact('info','info1','info2'));       


    }
    public function index2(){
        $admin_id=Auth::user()->id;
        //dd($admin_id);
        $admin=Emp::where('id',$admin_id)->firstOrFail();
        //dd($admin->dept->dept_name);

        //独立完成项目
        $information=Information::where([
                    ['emp_id','=',$admin_id],
                    ['process','>','3'],
                    ['circule_id','=','0']
             ])->get();

        $info = [];
        foreach ($information as $key => $value) {
            $recodenum = Recode::where('info_id',$value->id)->count();
            $info[]=[
                'id'=> $value->id,
                'name' => $value->name,
                'cont_name' => $value->cont_name,
                'cont_phone' => $value->cont_phone,
                'emp_id' => $value->emp_id,
                'staff_name' => $value->staff_name,
                'staff_phone' => $value->staff_phone,
                'currency' => $value->currency,
                'investment' => $value->investment,
                'industry' => $value->industry,
                'investment' => $value->investment,
                'status' => $value->status,
                'process' => $value->process,
                'is_show' => $value->is_show,
                'dept' =>$admin->dept->dept_name,
                'recodenum'=>$recodenum,
             ]; 
        }
        //流转项目
        $info1 = [];
        $information1=Information::where([
                    ['circule_id','=',$admin_id],
                    ['process','>','3'],
             ])->get();
        foreach ($information1 as $key => $value) {
            $c_emp=Emp::where('id',$value->emp_id)->firstOrFail();
            $recodenum = Recode::where('info_id',$value->id)->count();
            $info1[]=[
                'id'=> $value->id,
                'name' => $value->name,
                'cont_name' => $value->cont_name,
                'cont_phone' => $value->cont_phone,
                'emp_id' => $value->emp_id,
                'staff_name' => $value->staff_name,
                'staff_phone' => $value->staff_phone,
                'currency' => $value->currency,
                'investment' => $value->investment,
                'industry' => $value->industry,
                'investment' => $value->investment,
                'status' => $value->status,
                'process' => $value->process,
                'is_show' => $value->is_show,
                'circule_f_dept' => $c_emp->dept->dept_name,
                'circule_f_name' => $c_emp->name,
                'circule_f_phone' => $c_emp->phone,
                'circule_n_dept' =>$admin->dept->dept_name,
                'recodenum'=>$recodenum,
             ]; 
        }

        $info2 = [];
        $information2=Information::where([
                    ['emp_id','=',$admin_id],
                    ['process','>','3'],
                    ['circule_id','!=','0'],
             ])->get();
        foreach ($information2 as $key => $value) {
            $n_emp=Emp::where('id',$value->circule_id)->firstOrFail();  
            $recodenum = Recode::where('info_id',$value->id)->count();          
            $info2[]=[
                'id'=> $value->id,
                'name' => $value->name,
                'cont_name' => $value->cont_name,
                'cont_phone' => $value->cont_phone,
                'emp_id' => $value->emp_id,
                'staff_name' => $value->staff_name,
                'staff_phone' => $value->staff_phone,
                'currency' => $value->currency,
                'investment' => $value->investment,
                'industry' => $value->industry,
                'investment' => $value->investment,
                'status' => $value->status,
                'process' => $value->process,
                'is_show' => $value->is_show, 
                'circule_n_dept' => $n_emp->dept->dept_name,
                'circule_n_name' => $n_emp->name,
                'circule_n_phone' => $n_emp->phone,
                'circule_f_dept' => $admin->dept->dept_name,
                'recodenum'=>$recodenum,
             ]; 
        }
            //dd($info);            
            return view('negotiation.index2')->with(compact('info','info1','info2'));

    }

    public function ownlist_all(){
        
        $admin_id = Auth::user()->id;
        //获取用户信息
        $emp = Emp::findOrFail($admin_id);
        //获取用户部门领导id
        $admin_director_id = $emp->dept->director_id;
        //dd($admin_director_id);
        $emp_arry = array ();
        //判断用户是否为所在用户组领导
        $dept_id=$emp->dept_id;
        //获取用户所在组成员
        $empd=Emp::where('dept_id',$emp->dept->id)->get();
            //获取用户所在组成员id数组
        foreach ($empd as $key => $value) {
            if($value->is_leader == 0){
            $emp_arry[]= array(
                $key=>$value->id,
            );
            }
        }

        $emps = Emp::get();

        //全区独立完成项目
        $information=Information::whereIn('emp_id',$emp_arry)->where([
                    ['process','>','6'],
                    ['process','<','10'],
                    ['circule_id','=','0'],
             ])->get();

        foreach ($information as $key => $value) {
            $recodenum = Recode::where('info_id',$value->id)->count();
           
                $value->dept = $emp->dept->dept_name;
                $value->recodenum = $recodenum;

        }
        //流转项目

            //dd($info);            
        return view('negotiation.ownlist_all')->with(compact('information','emps'));       


    }

    public function inlist_all(){

        $admin_id = Auth::user()->id;
        //获取用户信息
        $emp = Emp::findOrFail($admin_id);
        //获取用户部门领导id
        $admin_director_id = $emp->dept->director_id;
        //dd($admin_director_id);
        $emp_arry = array ();
        //判断用户是否为所在用户组领导
        $dept_id=$emp->dept_id;
        //获取用户所在组成员
        $empd=Emp::where('dept_id',$emp->dept->id)->get();
            //获取用户所在组成员id数组
        foreach ($empd as $key => $value) {
            if($value->is_leader == 0){
            $emp_arry[]= array(
                $key=>$value->id,
            );
            }
        }

        $emps = Emp::get();

        $information=Information::whereIn('circule_id',$emp_arry)->whereIn('process',[7,8,9])->get();

        foreach ($information as $key => $value) {

            $c_emp=Emp::where('id',$value->emp_id)->firstOrFail();
            $f_emp=Emp::where('id',$value->circule_id)->firstOrFail();

            $recodenum = Recode::where('info_id',$value->id)->count();


                $value->circule_f_dept = $c_emp->dept->dept_name;
                $value->circule_f_name = $c_emp->name;
                $value->circule_n_dept = $emp->dept->dept_name;
                $value->circule_n_name = $f_emp->username;
                $value->recodenum = $recodenum;

        }
      
            return view('negotiation.inlist_all')->with(compact('information','emps'));       
    }

    public function outlist_all(){

        $admin_id = Auth::user()->id;
        //获取用户信息
        $emp = Emp::findOrFail($admin_id);
        //获取用户部门领导id
        $admin_director_id = $emp->dept->director_id;
        //dd($admin_director_id);
        $emp_arry = array ();
        //判断用户是否为所在用户组领导
        $dept_id=$emp->dept_id;
        //获取用户所在组成员
        $empd=Emp::where('dept_id',$emp->dept->id)->get();
            //获取用户所在组成员id数组
        foreach ($empd as $key => $value) {
            if($value->is_leader == 0){
            $emp_arry[]= array(
                $key=>$value->id,
            );
            }
        }
        //首谈地项目

        $information=Information::whereIn('emp_id',$emp_arry)->where([
                    ['process','>','6'],
                    ['process','<','10'],
                    ['circule_id','!=','0'],
             ])->get();

        foreach ($information as $key => $value) {
            $n_emp=Emp::where('id',$value->circule_id)->firstOrFail(); 
            $f_emp = Emp::where('id',$value->emp_id)->firstOrFail(); 
            $recodenum = Recode::where('info_id',$value->id)->count();          
            
                $value->circule_n_dept = $n_emp->dept->dept_name;
                $value->circule_n_name = $n_emp->username;
                $value->circule_f_dept = $f_emp->dept->dept_name;
                $value->circule_f_name = $f_emp->username;
                $value->recodenum = $recodenum;

        }
            //dd($info);            
            return view('negotiation.outlist_all')->with(compact('information'));       
    }

    public function ownlist(){
        $admin_id=Auth::user()->id;
        //dd($admin_id);
        $admin=Emp::where('id',$admin_id)->firstOrFail();
        //dd($admin->dept->dept_name);
        $emps = Emp::get();
        //独立完成项目
        $information=Information::where([
                    ['emp_id','=',$admin_id],
                    ['circule_id','=','0']
             ])->whereIn('process',[7,8,9])->get();

        $info = [];
        foreach ($information as $key => $value) {
            $recodenum = Recode::where('info_id',$value->id)->count();
   
                $value->dept = $admin->dept->dept_name;

                $value->recodenum = $recodenum;
  
        }

        return view('negotiation.ownlist')->with(compact('information','emps'));

    }

    public function inlist(){

        $admin_id=Auth::user()->id;
        //dd($admin_id);
        $admin=Emp::where('id',$admin_id)->firstOrFail();
        //dd($admin->dept->dept_name);
        $emps = Emp::get();

        $information = Information::where([

                ['circule_id','=',$admin_id],

             ])->whereIn('process',[7,8,9])->get();

        foreach ($information as $key => $value) {
        
            $c_emp=Emp::where('id',$value->emp_id)->firstOrFail();

            $recodenum = Recode::where('info_id',$value->id)->count();

                $value->circule_f_dept  =  $c_emp->dept->dept_name;
                $value->circule_f_name  =  $c_emp->name;
                $value->circule_f_phone  =  $c_emp->phone;
                $value->circule_n_dept  =  $admin->dept->dept_name;
                $value->recodenum  =  $recodenum;

        }
        return view('negotiation.inlist')->with(compact('information','emps'));
    }

    public function outlist(){
        $admin_id=Auth::user()->id;
        //dd($admin_id);
        $admin=Emp::where('id',$admin_id)->firstOrFail();
        //dd($admin->dept->dept_name);

        $information = Information::where([
                    ['emp_id','=',$admin_id],
                    ['circule_id','!=','0'],
             ])->whereIn('process',[7,8,9])->get();
        foreach ($information  as $key => $value) {
            $n_emp=Emp::where('id',$value->circule_id)->firstOrFail();  
            $recodenum = Recode::where('info_id',$value->id)->count();          

                $value->circule_n_dept = $n_emp->dept->dept_name;
                $value->circule_n_name = $n_emp->name;
                $value->circule_n_phone = $n_emp->phone;
                $value->circule_f_dept = $admin->dept->dept_name;
                $value->recodenum  = $recodenum;
        }
            return view('negotiation.outlist')->with(compact('information'));
    }



    public function tclist(){

        $admin_id=Auth::user()->id;

        $admin=Emp::where('id',$admin_id)->firstOrFail();
        //dd($admin->dept->dept_name);
         $gray = '本人发布项目列表';
        //独立完成项目


        $information = Information::where([
                    ['issuer_id','=',$admin_id],
                    ['process','>','6'],
                    ['process','<','10'],
             ])->get();

        foreach ($information as $key => $value) {

            $recodenum = Recode::where('info_id',$value->id)->count();

            $n_emp=Emp::where('id',$value->circule_id)->firstOrFail(); 

            $f_emp=Emp::where('id',$value->emp_id)->firstOrFail(); 


                $value->circule_n_dept = $n_emp->dept->dept_name;
                $value->circule_n_name  = $n_emp->username;
                $value->circule_f_dept  =  $f_emp->dept->dept_name;
                $value->circule_f_name  =  $f_emp->username;
                $value->recodenum = $recodenum;
 
        }
        return view('negotiation.tclist')->with(compact('information','gray'));


    }

    public function tctracklist(){

        $admin_id=Auth::user()->id;
        //dd($admin_id);
        $admin=Emp::where('id',$admin_id)->firstOrFail();
        //dd($admin->dept->dept_name);
         $gray = '本人跟踪项目列表';
        //独立完成项目
        $information=Information::where([
                    ['check_id','=',$admin_id],
                    ['process','>','6'],
                    ['process','<','10'],
             ])->get();

        foreach ($information as $key => $value) {

            $recodenum = Recode::where('info_id',$value->id)->count();

            $n_emp=Emp::where('id',$value->circule_id)->firstOrFail(); 

            $f_emp=Emp::where('id',$value->emp_id)->firstOrFail(); 

            $value->circule_n_dept = $n_emp->dept->dept_name;
            $value->circule_n_name  = $n_emp->username;
            $value->circule_f_dept  =  $f_emp->dept->dept_name;
            $value->circule_f_name  =  $f_emp->username;
            $value->recodenum = $recodenum;
        }
        return view('negotiation.tctracklist')->with(compact('information','gray'));
    }

    public function tclist_all(){

        $admin_id = Auth::user()->id;
        //获取用户信息
        $emp = Emp::findOrFail($admin_id);
        //获取用户部门领导id
        $admin_director_id = $emp->dept->director_id;
        //dd($admin_director_id);
        $emp_arry = array ();
        //判断用户是否为所在用户组领导
        $dept_id=$emp->dept_id;
        //获取用户所在组成员
        $empd=Emp::where('dept_id',$emp->dept->id)->get();
            //获取用户所在组成员id数组
        foreach ($empd as $key => $value) {
            if($value->is_leader == 0){
            $emp_arry[]= array(
                $key=>$value->id,
            );
            }
        }

         $gray = '本部门发布落地项目列表';
        //独立完成项目


        $information = Information::whereIn('issuer_id', $emp_arry)->where([
                    ['process','>','6'],
                    ['process','<','10'],
             ])->get();

        foreach ($information as $key => $value) {

            $recodenum = Recode::where('info_id',$value->id)->count();

            $n_emp=Emp::where('id',$value->circule_id)->firstOrFail(); 

            $f_emp=Emp::where('id',$value->emp_id)->firstOrFail(); 

            $c_emp=Emp::where('id',$value->check_id)->firstOrFail();


                $value->circule_n_dept = $n_emp->dept->dept_name;
                $value->circule_n_name  = $n_emp->username;
                $value->circule_f_dept  =  $f_emp->dept->dept_name;
                $value->circule_f_name  =  $f_emp->username;
                $value->circule_c_name  =  $c_emp->username;
                $value->recodenum = $recodenum;
 
        }
        return view('negotiation.tclist_all')->with(compact('information','gray'));


    }

    public function tctracklist_all(){

        $admin_id = Auth::user()->id;
        //获取用户信息
        $emp = Emp::findOrFail($admin_id);
        //获取用户部门领导id
        $admin_director_id = $emp->dept->director_id;
        //dd($admin_director_id);
        $emp_arry = array ();
        //判断用户是否为所在用户组领导
        $dept_id=$emp->dept_id;
        //获取用户所在组成员
        $empd=Emp::where('dept_id',$emp->dept->id)->get();
            //获取用户所在组成员id数组
        foreach ($empd as $key => $value) {
            if($value->is_leader == 0){
            $emp_arry[]= array(
                $key=>$value->id,
            );
            }
        }

         $gray = '本部门跟踪落地项目列表';
        //独立完成项目


        $information = Information::whereIn('check_id', $emp_arry)->where([
                    ['process','>','6'],
                    ['process','<','10'],
             ])->get();

        foreach ($information as $key => $value) {

            $recodenum = Recode::where('info_id',$value->id)->count();

            $n_emp=Emp::where('id',$value->circule_id)->firstOrFail(); 

            $f_emp=Emp::where('id',$value->emp_id)->firstOrFail(); 

            $c_emp=Emp::where('id',$value->check_id)->firstOrFail();


                $value->circule_n_dept = $n_emp->dept->dept_name;
                $value->circule_n_name  = $n_emp->username;
                $value->circule_f_dept  =  $f_emp->dept->dept_name;
                $value->circule_f_name  =  $f_emp->username;
                $value->circule_c_name  =  $c_emp->username;
                $value->recodenum = $recodenum;
 
        }
        return view('negotiation.tctracklist_all')->with(compact('information','gray'));
    }

    public function show($id)
    {
    	//echo $id;

    	$negotiation = Negotiation::findOrFail($id);
        $users = Auth::user();
    	//dd($informations);
    	return view('negotiation.add')->with(compact('informations','users'));
    }

    
     


    public function add($id)
    {
        //echo $id;
        //$negotiation = Negotiation::findOrFail($id);
        $informations = Information::findOrFail($id);
        $users = Auth::user();
        //dd($informations);
        $eaction = '项目落地';
        $actiontype = '7';
        return view('negotiation.add')->with(compact('informations','users','eaction','actiontype'));
    }


    public function store(Request $request)
    {

         $data=$request->all();

             $Negotiation=Negotiation::create([
                'info_id' =>$data['info_id'],
                'emp_id'  =>Auth::id(),
                'currency' =>$data['currency'],
                'investment' =>$data['investment'],
                'status' =>0,
                'contract_file' => $data['contract_file'],
                'actiontype' =>$data['actiontype'],
                'neg_at' =>$data['neg_at'],
                'remark' =>$data['remark'],
                //'contract_file' =>$data['contract_file'],

            ]);
             $info_id=$data['info_id'];
             //DB::update('update student set name = ? where id = ?',[$name,$id]);
             $test=DB::update('update information set process = ? where id = ?',[7,$info_id]);
             $test=DB::update('update information set company = ? where id = ?',[$data['company'],$info_id]);
             $test=DB::update('update information set reg_cap = ? where id = ?',[$data['reg_cap'],$info_id]);
             //dd($test);
             $result=$Negotiation->save();
            
             DB::commit();
             return $result? '1':'0';
    }

    public function edit($id)
    {
        $negotiation=Negotiation::findOrFail($id);
       
        //dd($negotiation);
        $info_id=Negotiation::findOrFail($id)->info_id;

        $info_name=Information::findOrFail($info_id)->name;
        //echo $negotiation->currency;
        
        
        return view('negotiation.edit')->with(compact('negotiation','info_name'));
    }

    public function update(Request $request, $id)
    {
        
        $negotiation=Negotiation::findOrFail($id);

         $data=$request->all();
         
         $negotiation->update($data);
         $info_id=$data['info_id'];
         if($data['status'] == 1){
            DB::update('update information set process = ? where id = ?',[1,$info_id]);
            DB::update('update information set status = ? where id = ?',[0,$info_id]);
         }elseif ($data['status'] == 2) {
             DB::update('update information set status = ? where id = ?',[0,$info_id]);
         }
       
        /*$negotiation=Negotiation::findOrFail($id);

        if($request->status ==0){

            $test=DB::update('update information set status = ? where id = ?',[$status,$info_id]);

        }elseif($request->status==1){

        }
        $test=DB::update('update information set status = ? where id = ?',[$status,$info_id]);

        $negotiation->update($request->all());*/
        return redirect()->route('negotiation.index')->with(['success'=>1,'message'=>'更新成功']);
    }

    public function list($id)
    {
        $nego=Negotiation::where([
            ['info_id','=',$id],
            ['actiontype','=','13'],
            ['result','=','1']
        ])->get();

        foreach ($nego as $key => $value) {
            $datetime2 = carbon::parse($value->neg_at);
            $days = (new Carbon)->diffIndays($datetime2, true);
            $day = 7-$days;
            $value->check_day = $day;
            $value->rate = round($day/7*100).'%';                
        }
        dd($nego);
        return view('negotiation.edit')->with(compact('nego'));

    }



}

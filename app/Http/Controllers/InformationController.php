<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Information,App\Emp,App\Dept,App\Negotiation,App\Recode,App\Industry,App\Area,App\Majorproject;
use Auth,DB;

class InformationController extends Controller
{
    //
    public function index(){
        $admin_id=Auth::user()->id;
        //dd($admin_id);
        $emp = Emp::findOrFail($admin_id);
        $admin_director_id = $emp->dept->director_id;
        $dept_id=$emp->dept_id;
        //dd($dept_id);
        $emp_arry = array ();
       
            //获取用户所在组成员
            $emps=Emp::where('dept_id',$dept_id)->get();
            //获取用户所在组成员id数组
            foreach ($emps as $key => $value) {
                $emp_arry[]= array(
                     $key=>$value->id,
                  );        
            }
            //dd($emps);

        $info1 =[];
        $info2 =[];
        $info3 =[];
        //输出市局列表
        if ($dept_id == '6') {
            //获取所有is_show状态为2的信息
            $information=Information::where([
                ['is_show','=','2'],
                ['process','<','2']
            ])->get();

            foreach ($information as $key => $value) {
                $dept = Dept::where('id',$value->info_emp->dept_id)->first();
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
                    ];
            }
            return view('information.index')->with(compact('info1'));      

        }elseif($admin_id == $admin_director_id && $dept_id != '6' && $dept_id != '13' ){
            //本人的洽谈项目
            $information=Information::where('emp_id',$admin_id)->where('process','<','2')->get();
            foreach ($information as $key => $value) {
                $recodenum = Recode::where([['info_id','=',$value->id],['emp_id',$value->emp_id]])->count();
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
                        'recodenum' =>$recodenum 
                    ];

                    
            }
            //上报的洽谈项目

            $information1=Information::whereIn('emp_id',$emp_arry)->where([
                ['process','<','3'],
                ['is_show', '>', '0'],
            ])->get();
            //dd($information); 
            foreach ($information1 as $key => $k) {
                $nego = Negotiation::where([
                    ['info_id','=',$k->id],
                    ['actiontype','=','11'],


                ])->get();
                foreach ($nego as $key => $kk) {
                    $recodenum1 = Recode::where([['info_id','=',$kk->info_id],['emp_id',$kk->emp_id]])->count();                  
                    $info2[]=[
                        'id'=> $k->id,
                        'name' => $k->name,
                        'cont_name' => $k->cont_name,
                        'cont_phone' => $k->cont_phone,
                        'emp_id' => $k->emp_id,
                        'staff_name' => $k->staff_name,
                        'staff_phone' => $k->staff_phone,
                        'currency' => $k->currency,
                        'investment' => $k->investment,
                        'industry' => $k->industry,

                        'status' => $k->status,
                        'process' => $k->process,
                        'is_show' =>$k->is_show,
                        'created_at' => $k->created_at, 
                        'nego_id' => $kk->id,
                        'recodenum'=>$recodenum1,
                    ];
                }

                
            }
            $reportnum = Negotiation::where([
                    ['director_id','=','0'],
                    ['actiontype','=','11'],
                ])->count();

            //流转项目
            $nego1 = Negotiation::whereIn('emp_id',$emp_arry)->where([
                    ['actiontype','=','5'],
                    ['result','=','0'],
            ])->get();
            foreach ($nego1 as $key => $v) {
                $information1=Information::where('id',$v->info_id)->where([
                    ['process', '=', '1'],
                ])->get();
                foreach ($information1 as $key => $vv) {
                    $recodenum2 = Recode::where([['info_id','=',$vv->id],['emp_id',$vv->emp_id]])->count();
                    $info3[]=[
                        'id'=> $vv->id,
                        'name' => $vv->name,
                        'cont_name' => $vv->cont_name,
                        'cont_phone' => $vv->cont_phone,
                        'currency' => $vv->currency,
                        'investment' => $vv->investment,
                        'industry' => $vv->industry,
                        'staff_name' => $vv->staff_name,
                        'staff_phone' => $vv->staff_phone,
                        'emp_id' => $vv->emp_id,
                        'status' => $vv->status,
                        'process' => $vv->process,
                        'is_show' => $vv->is_show,
                        'created_at' => $vv->created_at, 
                        'nego_id' => $v->id,
                        'recodenum'=>$recodenum2,
                    ];
                }
            }
            $circulenum = Information::whereIn('emp_id',$emp_arry)->where('process', '=', '1')->count();

            return view('information.index2')->with(compact('info1','info2','info3','reportnum','circulenum'));   

        }elseif($admin_id != $admin_director_id && $dept_id != '6' && $dept_id != '13' ){
             $information=Information::where([
                    ['emp_id','=',$admin_id],
                    ['process','<','2'],
             ])->orwhere([
                    ['emp_id','=',$admin_id],
                    ['process','=','9'],
             ])->get();
             //dd($information);
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
                        'created_at' => $value->created_at,
                        'recodenum'=>$recodenum,
                    ];
                }        
              //dd($info);
              return view('information.index1')->with(compact('info'));


        }elseif ($admin_id == $admin_director_id && $dept_id == '13') {
            $information=Information::where('emp_id',$admin_id)->where('process','<','2')->get();
            foreach ($information as $key => $value) {
                $recodenum = Recode::where([['info_id','=',$value->id],['emp_id',$value->emp_id]])->count();
                    $info1[]=[
                        'id'=> $value->id,
                        'name' => $value->name,
                        'cont_name' => $value->cont_name,
                        'cont_phone' => $value->cont_phone,
                        'cont_main' => $value->cont_main,
                        'cont_unit' => $value->cont_unit,
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
                        'recodenum' =>$recodenum 
                    ];

                    
            }
            //上报的洽谈项目

            $information1=Information::whereIn('emp_id',$emp_arry)->where([
                ['process','<','3'],
                ['is_show', '>', '0'],
            ])->get();
            //dd($information); 
            foreach ($information1 as $key => $k) {
                $nego = Negotiation::where([
                    ['info_id','=',$k->id],
                    ['actiontype','=','11'],


                ])->get();
                foreach ($nego as $key => $kk) {
                    $recodenum1 = Recode::where([['info_id','=',$kk->info_id],['emp_id',$kk->emp_id]])->count();                  
                    $info2[]=[
                        'id'=> $k->id,
                        'name' => $k->name,
                        'cont_name' => $k->cont_name,
                        'cont_phone' => $k->cont_phone,
                        'cont_main' => $k->cont_main,
                        'cont_unit' => $k->cont_unit,
                        'emp_id' => $k->emp_id,
                        'staff_name' => $k->staff_name,
                        'staff_phone' => $k->staff_phone,
                        'currency' => $k->currency,
                        'investment' => $k->investment,
                        'industry' => $k->industry,

                        'status' => $k->status,
                        'process' => $k->process,
                        'is_show' =>$k->is_show,
                        'created_at' => $k->created_at, 
                        'nego_id' => $kk->id,
                        'recodenum'=>$recodenum1,
                    ];
                }

                
            }
            $reportnum = Negotiation::where([
                    ['director_id','=','0'],
                    ['actiontype','=','11'],
                ])->count();

            //流转项目
            $nego1 = Negotiation::whereIn('emp_id',$emp_arry)->where([
                    ['actiontype','=','5'],
                    ['result','=','0'],
            ])->get();
            foreach ($nego1 as $key => $v) {
                $information1=Information::where('id',$v->info_id)->where([
                    ['process', '=', '1'],
                ])->get();
                foreach ($information1 as $key => $vv) {
                    $recodenum2 = Recode::where([['info_id','=',$vv->id],['emp_id',$vv->emp_id]])->count();
                    $info3[]=[
                        'id'=> $vv->id,
                        'name' => $vv->name,
                        'cont_name' => $vv->cont_name,
                        'cont_phone' => $vv->cont_phone,
                        'cont_main' => $vv->cont_main,
                        'cont_unit' => $vv->cont_unit,
                        'currency' => $vv->currency,
                        'investment' => $vv->investment,
                        'industry' => $vv->industry,
                        'staff_name' => $vv->staff_name,
                        'staff_phone' => $vv->staff_phone,
                        'emp_id' => $vv->emp_id,
                        'status' => $vv->status,
                        'process' => $vv->process,
                        'is_show' => $vv->is_show,
                        'created_at' => $vv->created_at, 
                        'nego_id' => $v->id,
                        'recodenum'=>$recodenum2,
                    ];
                }
            }
            $circulenum = Information::whereIn('emp_id',$emp_arry)->where('process', '=', '1')->count();

            return view('information.index3')->with(compact('info1','info2','info3','reportnum','circulenum'));  


        }elseif($admin_id != $admin_director_id && $dept_id == '13'){

            $information=Information::where([
                    ['emp_id','=',$admin_id],
                    ['process','<','2'],
             ])->orwhere([
                    ['emp_id','=',$admin_id],
                    ['process','=','9'],
             ])->get();
             //dd($information);
              $info = [];
                foreach ($information as $key => $value) {
                    $recodenum = Recode::where('info_id',$value->id)->count();   
                    $info[]=[
                        'id'=> $value->id,
                        'name' => $value->name,
                        'cont_name' => $value->cont_name,
                        'cont_phone' => $value->cont_phone,
                        'cont_main' => $value->cont_main,
                        'cont_unit' => $value->cont_unit,
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
                        'created_at' => $value->created_at,
                        'recodenum'=>$recodenum,
                    ];
                }        
              //dd($info);
              return view('information.index4')->with(compact('info'));

        }
    }

    public function ownlist(){

        $admin_id=Auth::user()->id; 
        $information=Information::where([
            ['emp_id','=',$admin_id],
            ['process','=','0'],
        ])->get();


        foreach ($information as $key => $value) {
             $recodenum = Recode::where('info_id',$value->id)->count();   
           
                        $value->recodenum= $recodenum;
                        //dd($value->info_area->YAT_LEVEL);
        }        
              //dd($info);
              return view('information.ownlist')->with(compact('information'));
    }

    public function list_all(){


        $admin_id=Auth::user()->id;

        $emp = Emp::findOrFail($admin_id);

        $admin_director_id = $emp->dept->director_id;

        $dept_id=$emp->dept_id;

        $emp_arry = array ();
       
        //获取用户所在组成员
        $emps=Emp::where('dept_id',$dept_id)->get();
        //获取用户所在组成员id数组
        foreach ($emps as $key => $value) {

            if($value->is_leader == 0){

            $emp_arry[]= array(

                     $key=>$value->id,

                  ); 
            }

        }

        $emps=Emp::get();

        $information1=Information::whereIn('emp_id',$emp_arry)->where([

            ['process','=','0'],

        ])->get();

        foreach ($information1 as $key => $value) {

            $value->recodenum = Recode::where('info_id',$value->id)->count();

        }


        return view('information.list_all')->with(compact('information1','emps'));   
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

        return view('information.report_list')->with(compact('information','emps'));

    }

    public function tctolist(){

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

        $emps=Emp::get();
            //获取用户所在组成员id数组
        $depts = Dept::get();   

        $information = Information::where([
            ['status','=',$dept_id],

            ['process','=','23'],

        ])->orwhere([
            ['circule_to','=',$dept_id],

            ['process','=','23'],

        ])->get();

        foreach ($information as $key => $value) {

            $value->recodenum = Recode::where('info_id',$value->id)->count();

        }


        return view('information.tctolist')->with(compact('information','emps','depts'));

    }

    public function show($id){
        $admin_id=Auth::user()->id;
        //dd($admin_id);
        $information=Information::where('id',$id)->firstOrFail();
        //dd($information->emp_id); 
        $emps = Emp::all();
        $depts = Dept::all();
            //dd($information->name);
           
            $major = Majorproject::all();
        return view('information.show')->with(compact('information','major','emps','depts'));
    }

    public function create(){
        $emp_id=Auth::user()->id;
        $emp = Emp::where('id',$emp_id)->firstOrFail();
        $industry = Industry::get();
        $majorproject = Majorproject::get();
        $continent = Area::where('YAT_LEVEL','1')->get();

        //dd($emp);
        return view('information.create')->with(compact('emp_id','emp','industry','continent','majorproject'));
    }

    public function store(Request $request){
        $data=$request->all();
        $validatedData = $request->validate([
        //'name' => 'unique:App\Information,name',
        //'cont_main' => 'unique:App\Information,cont_main',
        //'cont_name' => 'unique:App\Information,cont_name',
        //'cont_phone' => 'unique:App\Information,cont_phone',
        ]);
        //$errors = $validatedData->errors();
        //return response() -> json($errors);
        //dd($data);

        $result=Information::create($data);
        return  $result ? '1' : '0';
    }

    public function getAreaId(Request $request){

        $data = $request->all();

        $country = Area::where('YAT_PARENT_ID', $data['id'])->get(['YAT_ID','YAT_CNNAME']);

        return response()->json($country);


    }


    public function tccreate(){
        $emp_id=Auth::user()->id;
        $emp=Emp::where('id',$emp_id)->firstOrFail();
        //dd($emp);
        $industry = Industry::get();
        //dd($industry);
        return view('information.tccreate')->with(compact('emp_id','industry'));
    }

    public function tcstore(Request $request){
        $data=$request->all();
        //$validatedData = $request->validate([
        //'name' => 'unique:App\Information,name',
        //'cont_main' => 'unique:App\Information,cont_main',
        //'cont_name' => 'unique:App\Information,cont_name',
        //'cont_phone' => 'unique:App\Information,cont_phone',
       // ]);
        //$errors = $validatedData->errors();
        //return response() -> json($errors);

        $result=Information::create($data);
        return  $result ? '1' : '0';
    }

    public function edit($id){
        $emp_id=$id;
        $information=Information::findOrFail($id);
        $continent = Area::where('YAT_LEVEL','1')->get();
        $industry = Industry::get();
        $majorproject = Majorproject::get();
        return view('information.edit')->with(compact('information','emp_id','continent','industry','majorproject'));
    }

    public function update(Request $request, $id){
        $information=Information::findOrFail($id);

        $data=$request->all();

        $result=$information->update($data);

        return  $result ? '1' : '0';
    }

    //区管理员分派投促中心任务
    public function apportion($id){

        $admin_id = Auth::user()->id;
        $admin_dept = Emp::findOrFail($admin_id);
        $information = Information::findOrFail($id);
        //echo $negotiation->currency;
        $emps= Emp::where('dept_id',$admin_dept->dept_id)->where('is_leader','0')->where('username','!=','')->get(); 

        $actiontype = '24';

        $eaction = '区内分派';     

        return view('information.apportion')->with(compact('information','eaction','actiontype','emps'));


    }

    public function appstore(Request $request, $id){

            $data=$request->all(); 

            $Negotiation=Negotiation::create([
                'info_id' =>$data['info_id'],
                'emp_id'  =>Auth::id(),
                'currency' =>$data['currency'],
                'investment' =>$data['investment'],
                'eaction' =>$data['eaction'],
                'actiontype' =>$data['actiontype'],
                'status' => $data['status'],
            ]);

            $result=$Negotiation->save($data);
            $information = Information::findOrFail($id);

            if(empty($information->emp_id)){

                 DB::update('update information set process = ? where id = ?',[0,$id]);
                DB::update('update information set emp_id = ? where id = ?',[$data['status'],$id]);

            }else{
                
                DB::update('update information set process = ? where id = ?',[6,$id]);
                DB::update('update information set circule_id = ? where id = ?',[$data['status'],$id]);

            }

            DB::update('update information set updated_at = ? where id = ?',[Carbon::now(),$id]);

            return $result ? '1' : '0';

    }



    public function  termination($str){

        $str = explode(",",$str);
        //利用循环将需要删除的id 一个一个进行执行sql；
        foreach($str as $v){

        $result = DB::update('update information set process = ? where id = ?',['99',$v]);
        
        }
    }

    public function destroy($id){
        return response()->json([
            'error'=>1,
            'msg'=>'员工不能删除'
        ]);
    }


    	
}


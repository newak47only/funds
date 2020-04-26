<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Emp,App\Information,App\Negotiation,App\Infoprocess,App\Dept,App\Recode;
use Carbon\Carbon;
use Auth,DB,Input;

class CirculeController extends Controller
{
    //
    public function index()
    {
    
        $information=Information::wherein('process',[2,3])->get();
            foreach ($information as $key => $value) {
                $dept = Dept::where('id',$value->info_emp->dept_id)->first();
                if ($value->process == '2') {
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
                        'circule_n_dept' => '0',
                        'circule_n_name' => '0',
                        'circule_n_phone' => '0',
                        'circule_f_dept' => $dept['dept_name'],
                        'circule_f_name' => $value->info_emp->username,
                        'circule_f_phone'=>$value->info_emp->phone,
                    ];                

                }elseif($value->process == '3'){
                    $nego = Negotiation::where([
                        ['info_id','=',$value->id],
                        ['actiontype','=','13'],
                        ['result','=','1'],
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

            }
        return view('circule.index')->with(compact('info1'));
            
    }

    public function index1()
    {
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
            $emp_arry[]= array(
                $key=>$value->id,
            );
        } 
        $emps=Emp::get();
            //获取用户所在组成员id数组
        $depts = Dept::get();          
         //本区流转转出项目
        $information1=Information::where('process','2')->whereIn('emp_id', $emp_arry)->get();
        //本区可转入项目
        $nego1=Negotiation::where([['actiontype','=','5'],['result','=','1']])->whereNotIn('emp_id',  $emp_arry)->whereIn('status',['0',$dept_id])->get();
        //本区流转转入项目
        $nego2=Negotiation::where([
            ['director_id','=',$admin_id],
            ['result','<','3'],
            ['actiontype','=','13']
        ])->get();
        
        foreach ($nego2 as $key => $v) {

            $information3=Information::where([
                    ['id','=',$v->info_id],
                    ['process','=','2'],
                ])->get(); 
                foreach ($information3 as $key => $vv) {

                    $datetime2 = carbon::parse($v->neg_at);
                    $days = (new Carbon)->diffIndays($datetime2, true);
                    $day = 7-$days;
                    $v->check_day = $day;                             
                }
            }        

        return view('circule.index1')->with(compact('nego2','nego1','information1','emps','depts')); 

    }

    public function index2()
    {
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
            $emp_arry[]= array(
                $key=>$value->id,
            );
        } 
        $emps=Emp::get();
            //获取用户所在组成员id数组
        $depts = Dept::get();     
            //我发布的流转项目
        $information1=Information::where('emp_id', '=', $admin_id)->where('process','2')->get();
            //dd($information1);
            /*foreach ($information1 as $key => $value) {
                if($value->process ==2){
                    $nego = Negotiation::where([
                    ['info_id','=',$value->id],
                    ['actiontype','=','5'],
                    ['result','<','3'],
                ])->first();
                    
                    $f_emp=Emp::where('id',$admin_id)->firstOrFail();
                     $circule = Dept::where('id',$nego['status'])->first();
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
                        'updated_at' => $nego['updated_at'],
                        'result' => 0,
                        'circule_f_dept' => $emp->dept->dept_name,
                        'circule_f_name' => $f_emp->name,
                        'circule_f_phone'=>$f_emp->phone,
                        'circule_to'    =>$circule['dept_name'],
                        ];                               
                }elseif ($value->process ==3) {

                    $nego = Negotiation::where([
                    ['info_id','=',$value->id],
                    ['actiontype','=','13'],
                    ['result','<','3'],
                ])->firstOrFail();
                    //dd($nego->director_id);
                    $n_emp=Emp::where('id',$nego->director_id)->firstOrFail();
                    $f_emp=Emp::where('id',$admin_id)->firstOrFail();
                     $circule = Dept::where('id',$nego->status)->firstOrFail()->dept_name;
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
                        'result' => 1,
                        'updated_at' => $nego['updated_at'],
                        'circule_n_dept' => $n_emp->dept->dept_name,
                        'circule_n_name' => $n_emp->name,
                        'circule_n_phone' => $n_emp->phone,
                        'circule_f_dept' => $f_emp->dept->dept_name,
                        'circule_f_name' => $f_emp->name,
                        'circule_f_phone'=>$f_emp->phone,
                        'circule_to'    =>$circule,
                        ];                   
                }
                                                        
            }*/
            //我可以流转的项目
        $nego1=Negotiation::where([['actiontype','=','5'],['result','=','1']])->whereNotIn('emp_id',  $emp_arry)->whereIn('status',['0',$dept_id])->get();
            //dd($information2);
            /*foreach ($information2 as $key => $k) {
                $nego1=Negotiation::where([
                    ['info_id','=',$k->id],
                    ['actiontype','=','5'],
                    ['result','=','1'],
                    ['status','=','0'],
                ])->orwhere([
                    ['info_id','=',$k->id],
                    ['actiontype','=','5'],
                    ['result','=','1'],
                    ['status','=', $dept_id ],
                ])->first();
                //dd($nego1['status']);
                   $f_emp=Emp::where('id',$k->emp_id)->firstOrFail();
                $circule = Dept::where('id',$nego1['status'])->first();
                    $info1[]=[
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
                        'is_show' => $k->is_show,
                        'circule_f_dept' =>$f_emp->dept->dept_name,
                        'updated_at' => $nego1['updated_at'],
                        'nego_id'=> $nego1['id'],
                        'circule_to'    =>$circule['dept_name'],
                    ];                               
        
            }*/

            //我正在流转的项目
            $nego2=Negotiation::where([
                ['director_id','=',$admin_id],
                ['result','<','3'],
                ['actiontype','=','13']
            ])->get();
            //$information3=Information::where('process','=','10')->where('emp_id', '!=', $admin_id)->get();
            //dd($info);
            foreach ($nego2 as $key => $v) {

                $information3=Information::where([
                    ['id','=',$v->info_id],
                    ['process','=','2'],
                ])->get(); 
                foreach ($information3 as $key => $vv) {

                    $datetime2 = carbon::parse($v->neg_at);
                    $days = (new Carbon)->diffIndays($datetime2, true);
                    $day = 7-$days;
                    $v->check_day = $day;                             
                }

                $count=Recode::where([['emp_id','=',$v->emp_id],['info_id','=',$v->info_id]])->orwhere([['emp_id','=',$v->director_id],['info_id','=',$v->info_id]])->count();

                $num[] =[
                    'nego_id' =>$v->id,
                    'count' => $count,
                ];
            }


        return view('circule.index2')->with(compact('information1','nego1','nego2','emps','depts','num'));        

    }

    public function index3(){
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
        $emps=Emp::get();
            //获取用户所在组成员id数组
        $depts = Dept::get();
        $info = [];
        $info1 =[];
        $info2 =[];       
            //本人流转项目
        $information1=Information::where([
            ['emp_id', '=', $admin_id],
            ['process', '=', '2']
        ])->get();
        $information2=Information::where([
            ['check_id', '=', $admin_id],
            ['emp_id','!=',$admin_id],
            ['process', '=', '2']
        ])->get();
        return view('circule.index3')->with(compact('information2','information1','emps','depts'));        

    }


    public function index4(){
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
            $emp_arry[]= array(
                $key=>$value->id,
            );
        } 
        $emps=Emp::get();
            //获取用户所在组成员id数组
        $depts = Dept::get();       
            //本局流转项目
        $information1=Information::where('process','2')->whereIn('emp_id',$emp_arry)->get();
        /*foreach ($information1 as $key => $value) {
            $nego1 = Negotiation::where([['info_id','=',$value->emp_id],['result','=','2']])->whereIn('actiontype',[5,13])->get();
            foreach ($nego1 as $key => $val) {
                if($val->actiontype ==13){
                    $datetime2 = Carbon::parse($v->neg_at);
                    $days = (new Carbon)->diffIndays($datetime2, true);
                    $day = 7-$days;
                    $val->check_day=$days;
                }
            }
        }*/

        //本局跟踪流转项目
        $information2=Information::where('process','2')->whereNotIn('emp_id',$emp_arry)->get();
        return view('circule.index4')->with(compact('information2','information1','emps','depts'));        

    }


    public function list()
    {
    
        $admin_id = Auth::user()->id;
        //获取用户信息
        $emp = Emp::findOrFail($admin_id);
        //获取用户部门领导id
        $admin_director_id = $emp->dept->director_id;
        //dd($admin_director_id);
        $info = [];
        $negotiation=Negotiation::where([
            ['director_id','=',$admin_id],
            ['actiontype','=','5'],
        ])->get();
        foreach ($negotiation as $key => $value) {
            $information = Information::where([
                ['id','=',$value->info_id],
                ['process','=','10']
            ])->get();
            foreach ($information as $key => $val) {
                 $info[]=[
                       'id'=> $val->id,
                        'name' => $val->name,
                        'cont_name' => $val->cont_name,
                        'cont_phone' => $val->cont_phone,
                        'emp_id' => $val->emp_id,
                        'status' => $val->status,
                        'process' => $val->process,
                        'is_show' => $val->is_show,
                        'nego_id' => $value->id,
                        ];                              
                
            }
        }
            //dd($info);
            return view('circule.index1')->with(compact('info'));
    }

    public function show($id)
    {
    	//echo $id;

    	$informations = Information::findOrFail($id);
        $users = Auth::user();
    	//dd($informations);
    	return view('circule.add')->with(compact('informations','users'));
    }

    //提交流转申请
    public function add($id)
    {
        //echo $id;
        //$negotiation = Negotiation::findOrFail($id);
        $informations = Information::findOrFail($id);
        $users = Auth::user();
        $depts = Dept::all();
        //dd($informations);
        $eaction = '项目流转申请';
        $actiontype = '5';
        return view('circule.add')->with(compact('informations','users','eaction','actiontype','depts'));
    }


    public function store(Request $request)
    {

         $data=$request->all();
         //dd($data);
             $Negotiation=Negotiation::create([
                'info_id' =>$data['info_id'],
                'emp_id'  =>Auth::id(),
                'currency' =>$data['currency'],
                'investment' =>$data['investment'],
                'status' =>$data['status'],
                'eaction' =>$data['eaction'],
                'actiontype' =>$data['actiontype'],
                'remark' =>$data['remark'],
                'contract_file' =>$data['contract_file'],

            ]);
             $info_id=$data['info_id'];
             //DB::update('update student set name = ? where id = ?',[$name,$id]);
             $test=DB::update('update information set process = ? where id = ?',[1,$info_id]);
             //dd($test);
             $result=$Negotiation->save();
             DB::commit();
             return  $result ? '1' : '0';
    }

    public function edit($id)
    {
        $negotiation=Negotiation::findOrFail($id);
       
        //dd($id);
        $info_id=Negotiation::findOrFail($id)->info_id;

        $info_name=Information::findOrFail($info_id)->name;
        //echo $negotiation->currency;
        $users = Auth::user();
        $daction = '申请流转';
        
        
        return view('circule.edit')->with(compact('negotiation','info_name','users','daction'));
    }

    public function update(Request $request, $id)
    {
        //dd($id);
        $negotiation=Negotiation::findOrFail($id);

         $data=$request->all();
         $data['neg_at']=time();
         //dd($data);
         
         $result=$negotiation->update($data);
         $admin_id=Auth::user()->id;
         $info_id=$data['info_id'];
         if ($negotiation->result==4 ){
             DB::update('update information set process = ? where id = ?',[4,$info_id]); 
             DB::update('update information set circule_id = ? where id = ?',[$admin_id,$info_id]); 

         }elseif ($negotiation->result==3) {
            DB::update('update information set process = ? where id = ?',[2,$info_id]);
            $status=Information::findOrFail($info_id);
            $mun = $status['status']-1;
            DB::update('update information set process = ? where id = ?',[$mun,$info_id]);
         }
         return $result ? 1 : 0;

    }

    public function redit($id)
    {
        $negotiation=Negotiation::findOrFail($id);
       
        //dd($id);
        $info_id=Negotiation::findOrFail($id)->info_id;

        $info_name=Information::findOrFail($info_id)->name;
        //echo $negotiation->currency;
        $users = Auth::user();           
        return view('circule.redit')->with(compact('negotiation','info_name','users'));
    }
    //流转申报数据库操作
    public function rupdate(Request $request, $id)
    {
        $negotiation=Negotiation::findOrFail($id);

         $data=$request->all();
        $this->validate($request,[
            'report'=>'required',
        ]);

        if($data['result']=='1'){
            $randomemp=Emp::where('dept_id','13')->inRandomOrder()->first();
             //dd($randomemp['id']);
             
            DB::update('update information set check_id = ? where id = ?',[$randomemp['id'],$negotiation->info_id]);
            DB::update('update information set process = ? where id = ?',[2,$negotiation->info_id]);
         }elseif ($data['result']=='2') {
             DB::update('update information set process = ? where id = ?',[0,$negotiation->info_id]);
         }         
         $result=$negotiation->update($data);

         return  $result ? '1' : '0';
       

    }

    public function check($id){

        $negotiation=Negotiation::findOrFail($id);
       
        //dd($id);
        $info_id=Negotiation::findOrFail($id)->info_id;

        $info_name=Information::findOrFail($info_id)->name;

        $dept = Dept::findOrFail($negotiation->status)->dept_name;

        
        //echo $negotiation->currency;
        $users = Auth::user();  
        $daction = '项目流转审批';     

        return view('circule.check')->with(compact('negotiation','info_name','users','daction','dept'));

    }

    //开始流转
    public function start_circule($id)
    {
        $negotiation = Negotiation::findOrFail($id);

        $informations = Information::findOrFail($negotiation->info_id);
        //dd($informations);
        $users = Auth::user();
        $dept = Dept::findOrFail($negotiation->status)->dept_name;
        //dd($informations);
        $daction = '流转项目转入';
        $eaction = '流转项目转出';
        $actiontype = '13';
        return view('circule.start')->with(compact('informations','negotiation','users','eaction','actiontype','daction','dept'));
    }

     public function start_store(Request $request)
    {

         $data=$request->all();
         $data['neg_at'] = Carbon::now();
         //dd($data['neg_at']);
         //dd($data);
             $Negotiation=Negotiation::create([
                'info_id' =>$data['info_id'],
                'emp_id'  =>$data['emp_id'],
                'currency' =>$data['currency'],
                'investment' =>$data['investment'],
                'status' =>$data['status'],
                'eaction' =>$data['eaction'],
                'actiontype' =>$data['actiontype'],
                'daction' =>$data['daction'],
                'remark' =>$data['remark'],
                'contract_file' =>$data['contract_file'],
                'director_id' =>$data['director_id'],
                'contract_file' =>$data['contract_file'],
                'result' =>$data['result'],
                'neg_at' => $data['neg_at']
            ]);
             $info_id=$data['info_id'];
             //dd($info_id);
             $status=Information::findOrFail($info_id);
             $mun = $status['status'];
             $mun++;
             //DB::update('update student set name = ? where id = ?',[$name,$id]);
             $test=DB::update('update information set status = ? where id = ?',[$mun,$info_id]);
             //dd($test);
             $result=$Negotiation->save();

             DB::commit();
             return  $result ? '1' : '0';
    }











}

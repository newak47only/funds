<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Emp,App\Information,App\Negotiation,App\Infoprocess,App\Dept,App\Recode,App\industry;
use Carbon\Carbon;
use Auth,DB;

class CirculeController extends Controller
{


    
    public function list_city(){

        $emps = Emp::get();

        $depts = Dept::get();

        $information = Information::whereIn('process',[2,3,4,5,6])->get();

        return view('circule.list_city')->with(compact('information','emps','depts'));
    }

    public function list_all(){
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
            ['process','=','4'],
            ['circule_to','=','0'],
        ])->whereNotIn('emp_id',  $emp_arry)->get();

        foreach ($information as $key => $value) {

            foreach ($value->info_nego as $key => $k) {

                if($k->actiontype == '5' && $k->emp_id == $admin_id)
                {

                    $value->is_claim = '1' ;

                    break;

                }else {

                    $value->is_claim = '0';
                }

            }

        }

        return view('circule.list_all')->with(compact('information','emps','depts'));  
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
        $emps=Emp::get();
            //获取用户所在组成员id数组
        $depts = Dept::get();  

        $information = Information::where('circule_to',$dept_id)->whereIn('process',[5,6])->get();
        //本区流转转入项目       
        return view('circule.inlist_all')->with(compact('information','emps','depts')); 

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

        $emps=Emp::get();
            //获取用户所在组成员id数组
        $depts = Dept::get();   
        $information1=Information::whereIn('emp_id', $emp_arry)->whereNotIn('process',[0,7,8,9,10,11,12,13,14,15,16,17,18,19,20])->get();

        return view('circule.outlist_all')->with(compact('information1','emps','depts')); 
    }


    public function outlist(){

        $admin_id = Auth::user()->id;
        $emps=Emp::get();
        $depts = Dept::get();      
            //我发布的流转项目
        $information1=Information::where('emp_id', '=', $admin_id)->whereIn('process',[2,3,4,5,6,21,22,23])->get();
        foreach ($information1 as $key => $value) 
        {
            $value->num = Recode::where('info_id',$value->id)->count();
            
        }

        //dd($information1);
        
        return view('circule.outlist')->with(compact('information1','emps','depts')); 
    }

    public function inlist(){
        
        $admin_id = Auth::user()->id;
        $emps=Emp::get();
        $depts = Dept::get(); 

        $information = Information::where('circule_id',$admin_id)->where('process','6')->get(); 

        foreach ($information as $key => $val) {

            $negotiation=Negotiation::where([
                ['info_id','=',$val->id],
                ['actiontype','=','6'],
                ['status','=',$admin_id]
            ])->first(); 
            if(empty($negotiation)){

                $datetime2 = carbon::parse($val->updated_at);

            }else {

                $datetime2 = carbon::parse($negotiation->created_at);
                
            }
            
            $days = (new Carbon)->diffIndays($datetime2, true);
            $day = 7-$days;
            $val->check_day = $day; 
            $val->num = Recode::where([['info_id','=',$val->id],['emp_id','=',$admin_id]])->count();  
        }

        return view('circule.inlist')->with(compact('information','emps','depts'));   

    }



    public function tclist(){
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
            //本人流转项目
        $information1=Information::where([
            ['issuer_id', '=', $admin_id],
            ['process', '<', '7']
        ])->orwhere([
            ['issuer_id', '=', $admin_id],
            ['process', '>', '20']
        ])->get();

        return view('circule.tclist')->with(compact('information1','emps','depts'));        
    }

    public function tctracklist(){
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
            //本人流转项目

        $information=Information::where([
            ['check_id', '=', $admin_id],
            ['emp_id','!=',$admin_id],
            ['issuer_id','!=',$admin_id],
        ])->whereIn('process',[4,5,6])->get();
        return view('circule.tctracklist')->with(compact('information','emps','depts'));        
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
        $emps=Emp::get();
            //获取用户所在组成员id数组
        $depts = Dept::get();  
        $empd=Emp::where('dept_id',$emp->dept->id)->get();
            //获取用户所在组成员id数组
        foreach ($empd as $key => $value) {
            if($value->is_leader == 0){
                $emp_arry[]= array(
                $key=>$value->id,
                );
            }

        }     
            
        $information1=Information::whereIn('issuer_id',$emp_arry )->where([
            ['process', '<', '7'],
        ])->orwhere('process','>','20')->get();

        return view('circule.tclist_all')->with(compact('information1','emps','depts'));        
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
        $emps=Emp::get();
            //获取用户所在组成员id数组
        $depts = Dept::get(); 
        $empd=Emp::where('dept_id',$emp->dept->id)->get();
        foreach ($empd as $key => $value) {
            if($value->is_leader == 0){
                $emp_arry[]= array(
                $key=>$value->id,
                );
            }

        }       
            

        $information2=Information::whereNotIn('issuer_id', $emp_arry)->where([
            ['process', '>', '2'],
            ['process', '<', '7'],
        ])->get();
        return view('circule.tctracklist_all')->with(compact('information2','emps','depts'));        
    }

    public function list() {
    
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

    public function show($id){
    	//echo $id;

    	$informations = Information::findOrFail($id);
        $users = Auth::user();
    	//dd($informations);
    	return view('circule.add')->with(compact('informations','users'));
    }

    //第一步 acitontype 1提交流转申请
    public function add($id){
        $informations = Information::findOrFail($id);
        $users = Auth::user();
        $depts = Dept::all();
        //dd($informations);
        $eaction = '流转申请';
        $actiontype = '1';
        return view('circule.add')->with(compact('informations','users','eaction','actiontype','depts'));
    }

    public function store(Request $request){

         $data=$request->all();
         //dd($data);
             $Negotiation=Negotiation::create([
                'info_id' =>$data['info_id'],
                'emp_id'  =>Auth::id(),
                'currency' =>$data['currency'],
                'investment' =>$data['investment'],
                'eaction' =>$data['eaction'],
                'actiontype' =>$data['actiontype'],
                'remark' =>$data['remark'],
                'contract_file' =>$data['contract_file'],

            ]);
             $info_id=$data['info_id'];
             //DB::update('update student set name =4 ? where id = ?',[$name,$id]);
             $information = Information::findOrFail($info_id);
             if($information->issuer_id == Auth::id() ){

                DB::update('update information set process = ? where id = ?',[1,$info_id]);
                
             }else{

                DB::update('update information set process = ? where id = ?',[21,$info_id]);
               

             }
              DB::update('update information set updated_at = ? where id = ?',[Carbon::now(),$info_id]);

             
             //dd($test);
             $result=$Negotiation->save();
             DB::commit();
             return  $result ? '1' : '0';
    }

    //第二步 acitontype 2 项目分发
    public function check($id){
        $information = Information::findOrFail($id);
        //echo $negotiation->currency;
        $nego= Negotiation::where('info_id',$id)->where('actiontype','1')->first();

        $remark = $nego['remark'];
        $depts= Dept::get();
        $actiontype = '2';
        $eaction = '项目分发';     

        return view('circule.check')->with(compact('information','eaction','actiontype','remark','depts'));

    }

    public function rupdate(Request $request, $id){

        $data=$request->all();

        $Negotiation=Negotiation::create([
                'info_id' =>$data['info_id'],
                'emp_id'  =>Auth::id(),
                'currency' =>$data['currency'],
                'investment' =>$data['investment'],
                'eaction' =>$data['eaction'],
                'actiontype' =>$data['actiontype'],
                'status' =>$data['status'],
                'remark' =>$data['remark'],
        ]);

        /*$empmun=Emp::where([
            ['dept_id','=','13'],
            ['is_leader','=','0'],
            ['username','!=','']
        ])->count();
        //dd($empmun);
        $actiontype2 = Negotiation::where('actiontype','2')->count();
        $mun =  $actiontype2%$empmun;
        $mun = $mun-1;
        //dd($mun);

        $emps=Emp::where([
            ['dept_id','=','13'],
            ['is_leader','=','0'],
            ['username','!=','']
        ])->get();

        foreach ($emps as $key => $value) {
            if($key == $mun){
                $check_id = $value->id;
                break;
            }
        }*/

        //if($data['status'] != 0){
            //DB::update('update information set check_id = ? where id = ?',[$check_id,$id]);
            //DB::update('update information set circule_to = ? where id = ?',[$data['status'],$id]);
            //DB::update('update information set status = ? where id = ?',[$data['status'],$id]); 
            //DB::update('update information set process = ? where id = ?',[3,$id]);        

       // }else {
            //DB::update('update information set check_id = ? where id = ?',[$check_id,$id]);
            DB::update('update information set circule_to = ? where id = ?',[$data['status'],$id]); 
            DB::update('update information set process = ? where id = ?',[2,$id]);
            DB::update('update information set updated_at = ? where id = ?',[Carbon::now(),$id]);  
        //}  
        
        $result=$Negotiation->save($data);

        return  $result ? '1' : '0';

    }

    //第三步 acitontype 3 流转审核
    public function examine($id){

            $information = Information::findOrFail($id);
            //echo $negotiation->currency;
            $nego= Negotiation::where('info_id',$id)->where('actiontype','1')->first();

            $remark = $nego['remark'];
            $depts= Dept::get();
            $actiontype = '3';
            $eaction = '流转审核';     

            return view('circule.examine')->with(compact('information','eaction','actiontype','remark','depts'));

    }

    public function examupdate(Request $request, $id){

            $data=$request->all(); 

            $Negotiation=Negotiation::create([
                'info_id' =>$data['info_id'],
                'emp_id'  =>Auth::id(),
                'currency' =>$data['currency'],
                'investment' =>$data['investment'],
                'eaction' =>$data['eaction'],
                'actiontype' =>$data['actiontype'],
                'remark' =>$data['remark'],
            ]);

            $result=$Negotiation->save($data);

            $information = Information::where('id',$id)->first();

            if($data['result'] ==0){

                if( $information->check_id != 0 ){

                DB::update('update information set process = ? where id = ?',[5,$id]);

                }elseif ($information->check_id == 0) {

                DB::update('update information set process = ? where id = ?',[3,$id]);

                }


            }
            elseif ($data['result'] == 1) {

                DB::update('update information set process = ? where id = ?',[1,$id]);
            }
            DB::update('update information set updated_at = ? where id = ?',[Carbon::now(),$id]);

            return $result ? '1' : '0';

    }


    //第四步 actiontype 4 指派跟踪人
    public function assign($id){

        $information = Information::findOrFail($id);

        $admin_id = Auth::user()->id;
        //获取用户信息
        $emp = Emp::findOrFail($admin_id);

        $emp_arry = array ();

        $empd=Emp::where('dept_id',$emp->dept->id)->get();
        foreach ($empd as $key => $value) {
            if($value->is_leader == 0){
                $emp_arry[]= array(
                'id' => $value->id,
                'username' => $value->username,
                );
            }

        }  


        $actiontype = '4';

        $eaction = '分派跟踪人';     

        return view('circule.assign')->with(compact('information','eaction','actiontype','emp_arry'));

    }

    public function assignupdate(Request $request, $id){

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
        if($information->circule_to == 0 ){

            DB::update('update information set process = ? where id = ?',[$data['result'],$id]);
            
            DB::update('update information set check_id = ? where id = ?',[$data['status'],$id]); 

        }else {

            DB::update('update information set process = ? where id = ?',['5',$id]);
            DB::update('update information set check_id = ? where id = ?',[$data['status'],$id]); 

        }
            DB::update('update information set updated_at = ? where id = ?',[Carbon::now(),$id]);

        return $result ? '1' : '0';

    }


    //第五步 actiontype 5 项目认领
    public function claim($id){
        $admin_id = Auth::user()->id;
        $emp = Emp::where('id',$admin_id)->first();
        DB::update('update information set  circule_to= ? where id = ?',[$emp->dept_id,$id]);

        DB::update('update information set  process= ? where id = ?',['5',$id]);
        DB::update('update information set updated_at = ? where id = ?',[Carbon::now(),$id]);
        $Negotiation=Negotiation::create([
                'info_id' =>$id,
                'emp_id'  =>$admin_id,
                'eaction' =>'项目认领',
                'actiontype' =>'5',
            ]);
        $Negotiation->save();
        return response()->json([
            'error'=>1,
            'msg'=>'认领不成功'
        ]);
    }

    //第六步 actiontype 6  区内分发
    public function owncheck($id){
        $admin_id = Auth::user()->id;
        $admin_dept = Emp::findOrFail($admin_id);
        $information = Information::findOrFail($id);
        //echo $negotiation->currency;
        $emps= Emp::where('dept_id',$admin_dept->dept_id)->where('is_leader','0')->where('username','!=','')->get();  
        return view('circule.owncheck')->with(compact('information','emps'));
    }

    public function ownupdate(Request $request,$id){
        $data=$request->all();
        $Negotiation=Negotiation::create([
                'info_id' =>$data['info_id'],
                'emp_id'  =>Auth::user()->id,
                'eaction' =>'区内分发',
                'actiontype' =>'6',
                'status' => $data['status'],
                'updated_at'=> date('Y-m-dh:i:s',time()),

            ]);
        $result=$Negotiation->save();

        $information = Information::findOrFail($id);

        DB::update('update information set circule_id = ? where id = ?',[$data['status'],$data['info_id']]);
        DB::update('update information set process = ? where id = ?',['6',$data['info_id']]);
        DB::update('update information set updated_at = ? where id = ?',[Carbon::now(),$id]);

        return $result ? "1" : "0";
    }


    //第七步 actiontype 7  流转结果
    public function redit($id){
        
        $information= Information::findOrFail($id);
        $negotiation=Negotiation::where('info_id','=',$information->id)->where('actiontype','=','1')->first();
        $users = Auth::user();
        $actiontype = '7';
        return view('circule.redit')->with(compact('negotiation','information','users','actiontype'));
    }

    public function update(Request $request, $id){
        //dd($id);
         $data=$request->all();
         //dd($data);
             $Negotiation=Negotiation::create([
                'info_id' =>$data['info_id'],
                'emp_id'  =>Auth::id(),
                'currency' =>$data['currency'],
                'investment' =>$data['investment'],
                'eaction' =>'流转结果',
                'actiontype' =>'7',
                'remark' =>$data['remark'],
                'neg_at' =>$data['neg_at'],
            ]);
        $Negotiation->update($data);

         if ($data['result']=='0' ){
             DB::update('update information set process = ? where id = ?',[7,$id]); 
             DB::update('update information set company = ? where id = ?',[$data['company'],$id]);
             DB::update('update information set reg_cap = ? where id = ?',[$data['reg_cap'],$id]);
            DB::update('update information set investment = ? where id = ?',[$data['investment'],$id]);
             DB::update('update information set reg_cap = ? where id = ?',[$data['scope'],$id]);
         }elseif ($data['result']=='1') {
            DB::update('update information set process = ? where id = ?',[21,$id]);
            DB::update('update information set circule_id = ? where id = ?',[0,$id]);
             DB::update('update information set status = ? where id = ?',[0,$id]); 
             DB::update('update information set circule_to = ? where id = ?',[0,$id]); 
         }
         DB::update('update information set updated_at = ? where id = ?',[Carbon::now(),$id]);
        DB::commit();

        $result = $data['result'];

         return $result;

    }



    public function edit($id){
        $negotiation=Negotiation::findOrFail($id);
       
        //dd($id);
        $info_id=Negotiation::findOrFail($id)->info_id;

        $info_name=Information::findOrFail($info_id)->name;
        //echo $negotiation->currency;
        $users = Auth::user();
        $daction = '申请流转';
        
        
        return view('circule.edit')->with(compact('negotiation','info_name','users','daction'));
    }

    //开始流转
    public function start_circule($id){
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

    public function start_store(Request $request){

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




    //区管理员终止流转
    public function cirstop($id){

        $information = Information::findOrFail($id);
        $result = $information->update([
            'status'=> '0',
            'process' =>'4',
        ]);

        DB::update('update information set circule_id = ? where id = ?',['0',$id]);
        DB::commit();
        return $result ? '1' : '0';
    }

    //市投促局招商 重置流转

    public function cirreset($id){

        $information = Information::findOrFail($id);
        //echo $negotiation->currency;
        $nego= Negotiation::where('info_id',$id)->where('actiontype','1')->first();

        $remark = $nego['remark'];

        $depts= Dept::get();

        $actiontype = '21';

        $eaction = '流转重置';     

        return view('circule.cirreset')->with(compact('information','eaction','actiontype','remark','depts'));


     }

    public function resetupdate(Request $request,$id){

        $data=$request->all();
         
        $Negotiation=Negotiation::create([
                'info_id' =>$data['info_id'],
                'emp_id'  =>Auth::id(),
                'currency' =>$data['currency'],
                'investment' =>$data['investment'],
                'eaction' =>$data['eaction'],
                'actiontype' =>$data['actiontype'],
                'status' =>$data['status'],
                'remark' =>$data['remark'],
        ]);

        $result=$Negotiation->update($data);


        DB::update('update information set circule_id = ? where id = ?',['0',$id]);

        DB::update('update information set circule_to = ? where id = ?',[$data['status'],$id]);

        if($data['status']==0){

            DB::update('update information set process = ?  where id = ?',['4',$id]);

        }else {

            DB::update('update information set process = ?  where id = ?',['5',$id]);
        }

        

        DB::update('update information set status= ? where id = ?',['0',$id]);

        DB::commit();

        return $result ? '1' : '0';

    }



    //tc 提交分派转申请
    public function tcadd($id){
        $informations = Information::findOrFail($id);
        $users = Auth::user();
        $depts = Dept::all();
        //dd($informations);
        $eaction = '项目分派';
        $actiontype = '22';
        return view('circule.tcadd')->with(compact('informations','users','eaction','actiontype','depts'));
    }

    public function tcstore(Request $request,$id){

         $data=$request->all();
         //dd($data);
             $Negotiation=Negotiation::create([
                'info_id' =>$data['info_id'],
                'emp_id'  =>Auth::id(),
                'currency' =>$data['currency'],
                'investment' =>$data['investment'],
                'eaction' =>$data['eaction'],
                'actiontype' =>$data['actiontype'],
                'remark' =>$data['remark'],
                'contract_file' =>$data['contract_file'],
                'status' => $data['status'],

            ]);

             //DB::update('update student set name = ? where id = ?',[$name,$id]);
             $information = Information::findOrFail($id);
             if(empty($information->emp_id)){
                $test=DB::update('update information set status = ? where id = ?',[$data['status'],$id]);

             }else{
                    $test=DB::update('update information set circule_to = ? where id = ?',[$data['status'],$id]);

             }
             $test=DB::update('update information set process = ? where id = ?',['22',$id]);
             
             //dd($test);
             $result=$Negotiation->save();
             DB::commit();
             return  $result ? '1' : '0';
    }

    //tc 审核分派申请
    public function tccheck($id){

        $information = Information::findOrFail($id);
            //echo $negotiation->currency;
        $nego= Negotiation::where('info_id',$id)->where('actiontype','22')->first();

        $remark = $nego['remark'];
            
        $depts= Dept::get();

        $actiontype = '23';

        $eaction = '分派审核';     

        return view('circule.tccheck')->with(compact('information','eaction','actiontype','depts','remark'));

    }

    public function tccheckupdate(Request $request, $id){

            $data=$request->all(); 

            $Negotiation=Negotiation::create([
                'info_id' =>$data['info_id'],
                'emp_id'  =>Auth::id(),
                'currency' =>$data['currency'],
                'investment' =>$data['investment'],
                'eaction' =>$data['eaction'],
                'actiontype' =>$data['actiontype'],
                'remark' =>$data['remark'],
                'result' => $data['result'],
            ]);

            $result=$Negotiation->save($data);

            if($data['result'] == 0){

                DB::update('update information set process = ? where id = ?',[23,$id]);

            }elseif ($data['result'] == 1) {

                DB::update('update information set process = ? where id = ?',[21,$id]);
                 DB::update('update information set status = ? where id = ?',[0,$id]);
                 DB::update('update information set circule_to = ? where id = ?',[0,$id]);
            }
            

            return $result ? '1' : '0';

    }



}

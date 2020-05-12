<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Dept,App\Information,App\Emp,App\Negotiation,App\Recode;

use Auth,DB;

use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $admin = Auth::user();
        $dept = Dept::where('id',$admin->dept_id)->firstOrFail();
        $dept_name = $dept->dept_name;
        //dd($dept->director_id);
        if($admin->dept_id == '6'){
            $status = 0;


        }elseif ($admin->id == $dept->director_id && $dept->id != '6' && $dept->id != '13') {
            $status = 1;
 
        }elseif($admin->id != $dept->director_id && $dept->id != '6' && $dept->id != '13'){
            $status =2;

        }elseif ($admin->id == $dept->director_id && $dept->id == '13') {
            $status =3;
        }elseif ($admin->id != $dept->director_id && $dept->id == '13') {
            $status =4;
        }
        //dd($status);
        return view('index1')->with(compact('status','dept_name'));

    }

    public function welcome()
    {
        
        $admin_id=Auth::user()->id;
        $info_count = Information::where('emp_id', $admin_id)->count();
        //dd($info_count);
        $nego_count = Information::where([
            ['emp_id','=',$admin_id],
            ['process','=','0'],

        ])->count();
        $cir_count = Negotiation::where([
            ['director_id','=',$admin_id],
            ['actiontype','=','5'],
            ['result','=','0'],
        ])->count();
        //dd($info_nego_count);
        $info_nego_count = $nego_count+$cir_count;
        //dd($info_nego_count);
        $info_cir_count = Information::where('emp_id',$admin_id)->whereIn('process',[1,10])->count();
        $info_land_count = Information::where([
            ['emp_id','=',$admin_id],
            ['process','>=','2'],
        ])->count();

        $startTime = Carbon::now()->startOfDay();
        $endTime = Carbon::now()->endOfDay();
        //dd($endTime);
        $info_new_count = Information::where('emp_id', $admin_id)->whereBetween('created_at',[$startTime,$endTime])->count();
        $recode_count =Recode::where('emp_id', $admin_id)->count();

        $depts = Dept::whereNotIn('id',[0,6,13])->get();

        foreach ($depts as $key => $value) {
            
            $emp_arry = array ();
       
            //获取用户所在组成员
            $emps=Emp::where('dept_id',$value->id)->get();
            
            //获取用户所在组成员id数组
            foreach ($emps as $key => $val) {

                if($val->is_leader == 0){

                    $emp_arry[]= array(

                    $key=>$val->id,

                  ); 
                }

            }

            $num1 = Information::whereIn('emp_id',$emp_arry)->count();
            $num2 = Information::whereIn('emp_id',$emp_arry)->whereIn('process',[3,4,5,6])->count();
            $value->num1 = $num1;
            $value->num2 = $num2;

            $dept[]=array(

                    $key=>$value->dept_name,

                  ); 

        }


        return view('welcome')->with(compact('depts','info_count','info_nego_count','info_cir_count','info_land_count','info_new_count','recode_count','dept'));
        //return view('welcome');
    }
}

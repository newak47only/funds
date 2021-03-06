<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Emp,App\Dept;
use Auth,Hash,DB,Response;

class EmpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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
        $emps=Emp::whereIn('id',$emp_arry)->orderBy('id','DESC')->get();
        return view('emp.index')->with(compact('emps'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $depts=Dept::recursion(Dept::orderBy('rank','ASC')->get());

        return view('emp.create')->with(compact('depts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=$request->all();
        //dd($data);

        /*$this->validate($request,[
            'name'=>'required',
            'email'=>'required|unique:emp,email',
            'password'=>'required',
            'dept_id'=>'required',
        ]);*/

        $data['password']=Hash::make($data['password']);

        $result=Emp::create($data);

        return  $result ? '1' : '0';
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $emp=Emp::where('id',$id)->first();
        //dd($emp);
        return view('emp.show')->with(compact('emp'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $emp=Emp::findOrFail($id);
        $depts=Dept::recursion(Dept::orderBy('rank','ASC')->get());
        return view('emp.edit')->with(compact('emp','depts'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $emp=Emp::findOrFail($id);

        $data=$request->all();

        //dd($data);

        if(isset($data['password']) && !empty($data['password'])){
            $data['password']=Hash::make($data['password']);
        }else{
            unset($data['password']);
        }

        //dd($da8ta);

        /*$this->validate($request,[
            'name'=>'required',
            'email'=>'required|unique:emp,email,'.$id,
            'workno'=>'required|unique:emp,workno,'.$id,
            'dept_id'=>'required',
            'username'=>'required',
            'phone'=>'required',

        ]);*/

        $result = $emp->update($data);
        return  $result ? '1' : '0';
        //return redirect()->route('emp.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $emp=Emp::findOrFail($id);

        $emp->delete();
        return response()->json([
            'error'=>1,
            'msg'=>'员工不能删除'
        ]);
    }

    public function aajax($str){
        //获取到ajax传来的需要删除的id
        //dd($str);
        //把传来的所有id改为数组形式  explode  字符串转数组
        $str = explode(",",$str);
        //利用循环将需要删除的id 一个一个进行执行sql；
        foreach($str as $v){
            Emp::where('id','=',$v)->delete();
        }

    }

        public function addemp()
    {

       

        for($x=1; $x<=50; $x++){

            $data = [] ;

            $name = '';

            $name = 'cxzs'.$x;

            $data ['name'] = $name;

            $data ['dept_id'] = '11'; 

            $data['password']=Hash::make('123456');

            //dd($data);

            $result=Emp::create($data);
        }

    }
 
}

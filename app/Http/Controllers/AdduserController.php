<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Dept,App\Emp;

class AdduserController extends Controller
{
    //
    public function addemp()
    {

    	$data = [] ;

    	for($x=1; $x<=3; $x++){

    		$data [] = [

    			'password' => '123456',
    			'name'	   => '',
    			'dept_id'  => '7',

    		];

    		$data['name'] .= $x;

    		$data['password']=Hash::make($data['password']);

    		dd($data);

        	$result=Emp::create($data);

        	return view('emp.index');
    	}

    }
}

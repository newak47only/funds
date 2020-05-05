<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Input;
use App\Role;
use App\Permisson;

class RoleController extends Controller
{
    //
    public function index(){


    $role=Role::get();
    //dd($role);

    return view('role.index')->with(compact('role'));

    }

    public function assign(){

    	if(Input::method()=='post'){

    		$data = Input::only(['id','auth_id']);

    		$role = new Role();
    		
    		return $role->assignPerm($data);


    	}else{

    		$top= Permisson::where('pid','0')->get();

    		$cat= Permisson::where('pid','!=','0')->get();

    		return view('role.assign')->with(compact('top','cat'));
    	}
    }
}

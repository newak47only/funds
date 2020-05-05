<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //
    protected $table="role";

    //将分派的权限进行处理
    public function assignPer($data){

    	$post['auth_ids'] = implode(',',$data['auth_id']);

    	$tmp = Permission::where('pid','!=','0')->whereIn('id',$data['auth_ids'])->get();

    	$ac='';

    	foreach ($tmp as $key => $value) {
    		
    		$ac = $ac . $value -> controller . '@' . $value ->action . ',';
    	}

    	$post['auth_ac'] = strtolower(rtrim($ac,','));

    	return self::where('id',$data['id'])->update();
    }
}

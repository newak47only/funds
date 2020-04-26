<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Emp extends Authenticatable
{
    //
    use Notifiable;

    protected $table="emp";

    protected $fillable = [
        'name', 'email', 'password','workno','dept_id','leave','username','phone','remark'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

    public function dept(){
        return $this->hasOne('App\Dept','id','dept_id');
    }
}

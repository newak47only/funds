<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    //
    protected $table="area";
    protected $fillable=['YAT_ID','YAT_PARENT_ID','YAT_PATH','YAT_LEVEL','YAT_CNNAME','YAT_ENNAME','YAT_CNPINYIN','YAT_CODE'];
}

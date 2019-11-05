<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class CauHoi extends Model
{
    protected $table ='cau_hoi';


    public function LK_CauHoi_LinhVuc(){
    	return $this->belongsTo('App\LinhVuc','linh_vuc_id','id');
    }
}

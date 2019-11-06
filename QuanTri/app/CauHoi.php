<?php

namespace App;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class CauHoi extends Model
{
	use SoftDeletes;
    protected $table = 'cau_hoi';
    protected $dates = ['deleted_at'];
}

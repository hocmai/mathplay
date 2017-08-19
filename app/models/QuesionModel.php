<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuesionModel extends Model
{
    protected $table = 'quesion';
    protected $primaryKey = 'quesion_id';

    protected $fillable = ['*'];
    public $timestamps = false;

    /**
     * n-n
     * 1 cau hoi thuoc nhieu bai tap
     * 1 bai tap co nhieu cau hoi
     */
    public function lession(){
    	return $this->belongsToMany('App\LessionModel');
    }
}

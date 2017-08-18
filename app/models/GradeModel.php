<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GradeModel extends Model
{
    protected $table = 'grade';
    protected $primaryKey = 'grade_id';

    protected $filltable = ['*'];
    public $timestamps = false;

    public function user(){
    	return $this->belongsTo('App\User', 'author', 'id');
    }


    /**
     * 1-n
     * 1 lop hoc co nhieu mon hoc
     */
    public function subject(){
    	return $this->hasMany('App\Models\SubjectModel', 'grade_id');
    }

    /**
     * 1-n
     * 1 lop hoc duoc luu trong nhieu Lich su lam bai cua hoc sinh
     */
    public function study_history(){
    	return $this->belongto('App\Models\StudyHistoryModel');
    }
}

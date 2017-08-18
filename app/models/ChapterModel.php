<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChapterModel extends Model
{
    protected $table = 'chapter';
    protected $primaryKey = 'chapter_id';

    protected $filltable = ['*'];
    public $timestamps = false;

    /**
     * 1-n
     * 1 chuyen de chi thuoc 1 mon hoc
     */
    public function subject(){
    	return $this->belongto('App\SubjectModel');
    }

    /**
     * 1-n
     * 1 chuyen de duoc luu trong nhieu Lich su lam bai cua hoc sinh
     */
    public function study_history(){
    	return $this->belongto('App\StudyHistoryModel');
    }



    /**
     * 1-n
     * 1 chuyen de co nhieu bai tap
     */
    public function lession(){
    	return $this->hasMany('App\LessionModel');
    }
}

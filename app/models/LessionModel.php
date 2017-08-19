<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LessionModel extends Model
{
    protected $table = 'lession';
    protected $primaryKey = 'lession_id';

    protected $fillable = ['*'];
    public $timestamps = false;

    /**
     * 1-n
     * 1 bai tap thuoc 1 chuyen de
     */
    public function lession(){
    	return $this->belongto('App\ChapterModel');
    }

    /**
     * 1-n
     * 1 bai tap duoc luu trong nhieu Lich su lam bai cua hoc sinh
     */
    public function study_history(){
    	return $this->belongto('App\StudyHistoryModel');
    }



    /**
     * n-n
     * 1 bai tap co nhieu cau hoi
     * 1 cau hoi thuoc nhieu bai tap
     */
    public function question(){
    	return $this->belongsToMany('App\QuesionModel', 'lession_question');
    }
}

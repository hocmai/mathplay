<?php

use Illuminate\Database\Eloquent\Model;

class GradeModel extends Eloquent
{
    protected $table = 'grade';
    protected $primaryKey = 'grade_id';

    protected $fillable = ['grade_id', 'author', 'title', 'description', 'slug', 'created', 'changed', 'weight', 'status'];
    public $timestamps = false;

    public function user(){
    	return $this->belongsTo('User', 'author', 'id');
    }


    /**
     * 1-n
     * 1 lop hoc co nhieu mon hoc
     */
    public function subject(){
    	return $this->hasMany('SubjectModel', 'grade_id');
    }

    /**
     * 1-n
     * 1 lop hoc duoc luu trong nhieu Lich su lam bai cua hoc sinh
     */
    public function study_history(){
    	return $this->belongto('StudyHistoryModel');
    }
}
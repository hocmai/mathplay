<?php

// use Illuminate\Auth\UserInterface;
// use Illuminate\Auth\Reminders\RemindableInterface;
// use Illuminate\Database\Eloquent\SoftDeletingTrait;
use Illuminate\Database\Eloquent\Model;

class SubjectModel extends Eloquent
{
    protected $table = 'subject';
    protected $primaryKey = 'subject_id';

    protected $fillable = ['subject_id', 'title', 'description', 'author'];
    public $timestamps = false;

    // 1 subject duoc tao boi 1 user
    public function user(){
    	return $this->belongto('UserModel', 'author', 'id');
    }

    // 1 mon hoc chi thuoc 1 lop hoc
    public function grade(){
    	return $this->belongto('GradeModel', 'grade_id', 'grade_id');
    }
}

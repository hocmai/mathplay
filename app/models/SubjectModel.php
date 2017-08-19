<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubjectModel extends Model
{
    protected $table = 'subject';
    protected $primaryKey = 'subject_id';

    protected $fillable = ['*'];
    public $timestamps = false;

    // 1 subject duoc tao boi 1 user
    public function user(){
    	return $this->belongto('App\Models\UserModel');
    }

    // 1 mon hoc chi thuoc 1 lop hoc
    public function grade(){
    	return $this->belongto('App\Models\GradeModel');
    }
}

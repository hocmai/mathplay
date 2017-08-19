<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;
//use Illuminate\Database\Eloquent\SoftDeletingTrait;

class User extends Eloquent
{
	//use SoftDeletingTrait;
    protected $table = 'users';
    protected $hidden = array('password', 'remember_token');
    protected $fillable = ['id', 'password', 'username', 'email', 'created', 'changed', 'status'];
    public $timestamps = false;
    //protected $dates = ['deleted_at'];

    /**
     * 1-n
     * 1 lop hoc co nhieu mon hoc
     */
    public function grade(){
    	return $this->hasMany('GradeModel', 'grade_id');
    }

}
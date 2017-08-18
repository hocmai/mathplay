<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;
//use Illuminate\Database\Eloquent\SoftDeletingTrait;

class User extends Eloquent
{
	//use SoftDeletingTrait;
    protected $table = 'users';
    protected $hidden = array('password', 'remember_token');
    protected $fillable = ['*'];
    public $timestamps = false;
    //protected $dates = ['deleted_at'];

}
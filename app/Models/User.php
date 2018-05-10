<?php
// use Illuminate\Contracts\Auth;
use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class User extends Eloquent implements UserInterface, RemindableInterface
{
    use UserTrait, RemindableTrait;
	use SoftDeletingTrait;

    protected $table = 'users';

    protected $hidden = array('password', 'remember_token');
    protected $fillable = array('email', 'password', 'username', 'school', 'full_name', 'address', 'phone', 'grade_id', 'status');
    protected $dates = ['deleted_at'];

    /**
     * 1-n
     * 1 lop hoc co nhieu mon hoc
     */
    public function grades()
    {
        return $this->belongsTo('Grade', 'grade_id', 'id');
    }

}
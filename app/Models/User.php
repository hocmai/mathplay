<?php
// use Illuminate\Contracts\Auth;
namespace App\Models;
use Hash;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authentical;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\Authenticatable;

class User extends Authentical implements Authenticatable
{
    use Notifiable;
	use SoftDeletes;

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
        return $this->belongsTo('App\Models\Grade', 'grade_id', 'id');
    }

}
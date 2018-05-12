<?php
namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authentical;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\Auth;

class Admin extends Authentical implements Authenticatable
{
    use Notifiable;
	use SoftDeletes;
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'admins';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');
	protected $fillable = array('email', 'password', 'role_id', 'username', 'status');
    protected $dates = ['deleted_at'];

    public static function isAdmin()
    {
    	if(!Auth::guard('admin')->check()){
    		return false;
    	}
    	if(Auth::guard('admin')->user()->role_id == ADMIN){
			return true;
		}
		else{
			return false;
		}
    }
    public static function isEditor()
    {
    	if(Auth::guard('admin')->user()->role_id == EDITOR){
			return true;
		}
		else{
			return false;
		}
    }
    public static function isSeo()
    {
    	if(Auth::guard('admin')->user()->role_id == SEO){
			return true;
		}
		else{
			return false;
		}
    }
    public function role()
    {
        return $this->belongsTo('App\Models\Role', 'role_id', 'id');
    }
}

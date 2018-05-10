<?php
namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable {

	use Notifiable, SoftDeletes;

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
    	if(Auth::admin()->get()->role_id == ADMIN){
			return true;
		}
		else{
			return false;
		}
    }
    public static function isEditor()
    {
    	if(Auth::admin()->get()->role_id == EDITOR){
			return true;
		}
		else{
			return false;
		}
    }
    public static function isSeo()
    {
    	if(Auth::admin()->get()->role_id == SEO){
			return true;
		}
		else{
			return false;
		}
    }
    public function role()
    {
        return $this->belongsTo('Role', 'role_id', 'id');
    }
}

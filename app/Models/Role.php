<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
	use SoftDeletes;
    protected $table = 'roles';
    protected $fillable = ['name', 'description'];
    protected $dates = ['deleted_at'];

    public function admins()
    {
        return $this->hasMany('App\Models\Admin', 'role_id', 'id');
    }

    public function user()
    {
        return $this->hasMany('App\Models\Users', 'role_id', 'id');
    }
}
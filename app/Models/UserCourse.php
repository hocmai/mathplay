<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class UserCourse extends Model
{
    protected $table = 'user_course';
    protected $fillable = [
        'id',
        'user_id',
        'hocmai_course_id',
        'grade_slug'
    ];
    
    public function user(){

        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }

    public function grade()
    {
        return $this->belongsTo('App\Models\Grade', 'grade_slug', 'slug');
    }
}

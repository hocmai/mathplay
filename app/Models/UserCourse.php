<?php
class UserCourse extends Eloquent
{
    protected $table = 'user_course';
    protected $fillable = [
        'id',
        'user_id',
        'hocmai_course_id',
        'grade_slug'
    ];
    
    public function user(){

        return $this->belongsTo('User', 'user_id', 'id');
    }

    public function grade()
    {
        return $this->belongsTo('Grade', 'grade_slug', 'slug');
    }
}

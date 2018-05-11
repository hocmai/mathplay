<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StudyHistory extends Model
{
	use SoftDeletes;
    
    protected $table = 'study_history';
    protected $fillable = [
        'author',
        'grade_id',
        'subject_id',
        'chapter_id',
        'lession_id',
        'score',
        'current_question',
        'completed',
        'difficult',
        'time_use',
        'star',
        'status',
    ];

    protected $dates = ['deleted_at'];
    
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'author', 'id');
    }
    
    public function grade()
    {
        return $this->belongsTo('App\Models\Grade', 'grade_id', 'id');
    }
    
    public function subject()
    {
        return $this->belongsTo('App\Models\Subject', 'subject_id', 'id');
    }
    
    public function chapter()
    {
        return $this->belongsTo('App\Models\Chapter', 'chapter_id', 'id');
    }
    
    public function lession()
    {
        return $this->belongsTo('App\Models\Lession', 'lession_id', 'id');
    }
}

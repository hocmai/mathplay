<?php
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class StudyHistory extends Eloquent
{
	use SoftDeletingTrait;
    
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
        return $this->belongsTo('User', 'author', 'id');
    }
    
    public function grade()
    {
        return $this->belongsTo('Grade', 'grade_id', 'id');
    }
    
    public function subject()
    {
        return $this->belongsTo('Subject', 'subject_id', 'id');
    }
    
    public function chapter()
    {
        return $this->belongsTo('Chapter', 'chapter_id', 'id');
    }
    
    public function lession()
    {
        return $this->belongsTo('Lession', 'lession_id', 'id');
    }
}

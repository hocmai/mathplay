<?php
// use Illuminate\Database\Eloquent\SoftDeletingTrait;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;

class Lession extends Eloquent implements SluggableInterface
{
    // use SoftDeletingTrait;
    use SluggableTrait;

    //// Use custom publish status, get only published
    use PublishedTrait;

    protected $table = 'lessions';
    protected $fillable = [
        'title',
        'chapter_id',
        'author_id',
        'subject_id',
        'grade_id',
        'status',
        'weight',
        'slug',
        'description',
        'config',
    ];
    // protected $dates = ['deleted_at'];

    protected $sluggable = array(
        'build_from' => 'title',
        'save_to'    => 'slug',
    );

    protected $include_trashed = true;

    public function author()
    {
        return $this->belongsTo('Admin', 'author_id', 'id');
    }
    
    public function chapter()
    {
        return $this->belongsTo('Chapter', 'chapter_id', 'id');
    }
    
    public function question()
    {
        return $this->belongsToMany('Question', 'lession_question', 'lession_id', 'qid');
    }

    public function grade()
    {
        return $this->belongsTo('Grade', 'grade_id', 'id');
    }

    public function subject()
    {
        return $this->belongsTo('Subject', 'subject_id', 'id');
    }
}
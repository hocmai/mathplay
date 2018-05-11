<?php
// use Illuminate\Database\Eloquent\SoftDeletingTrait;
namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;

class Lession extends Model
{
    // use SoftDeletingTrait;
    // use SluggableTrait;
    use SoftDeletes;
    use Sluggable;
    use SluggableScopeHelpers;
    //// Use custom publish status, get only published
    // use PublishedTrait;

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

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    protected $include_trashed = true;

    public function author()
    {
        return $this->belongsTo('App\Models\Admin', 'author_id', 'id');
    }
    
    public function chapter()
    {
        return $this->belongsTo('App\Models\Chapter', 'chapter_id', 'id');
    }
    
    public function question()
    {
        return $this->belongsToMany('App\Models\Question', 'lession_question', 'lession_id', 'qid');
    }

    public function grade()
    {
        return $this->belongsTo('App\Models\Grade', 'grade_id', 'id');
    }

    public function subject()
    {
        return $this->belongsTo('App\Models\Subject', 'subject_id', 'id');
    }
}
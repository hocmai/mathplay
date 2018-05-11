<?php
namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;

class Chapter extends Model
{
    use SoftDeletes;
    use Sluggable;
    use SluggableScopeHelpers;
    
    //// Use custom publish status, get only published
    // use PublishedTrait;

    protected $table = 'chapters';
    protected $fillable = [
        'title',
        'subject_id',
        'author_id',
        'grade_id',
        'status',
        'weight',
        'slug',
        'description',
    ];
    protected $dates = ['deleted_at'];

   public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
    
    public function author()
    {
        return $this->belongsTo('App\Models\Admin', 'author_id', 'id');
    }
    
    public function subject()
    {
        return $this->belongsTo('App\Models\Subject', 'subject_id', 'id');
    }

    public function lession()
    {
        return $this->hasMany('App\Models\Lession', 'chapter_id', 'id');
    }

    public function grade()
    {
        return $this->belongsTo('App\Models\Grade', 'grade_id', 'id');
    }
 
}
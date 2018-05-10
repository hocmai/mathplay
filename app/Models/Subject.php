<?php
namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;

class Subject extends Model 
{
    use SoftDeletes;
    use Sluggable;
    use SluggableScopeHelpers;

    //// Use custom publish status, get only published
    // use PublishedTrait;

    protected $table = 'subjects';
    protected $fillable = [
        'title',
        'author_id',
        'description',
        'grade_id',
        'status',
        'weight',
        'slug',
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
    
    public function grade()
    {
        return $this->belongsTo('App\Models\Grade', 'grade_id', 'id');
    }
    
    public function chapter()
    {
        return $this->hasMany('App\Models\Chapter');
    }
 
}
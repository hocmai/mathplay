<?php
use Illuminate\Database\Eloquent\SoftDeletingTrait;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;

class Subject extends Eloquent implements SluggableInterface
{
    use SoftDeletingTrait;
    use SluggableTrait;

    //// Use custom publish status, get only published
    use PublishedTrait;

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

    protected $sluggable = array(
        'build_from' => 'title',
        'save_to'    => 'slug',
    );
    
    public function author()
    {
        return $this->belongsTo('Admin', 'author_id', 'id');
    }
    
    public function grade()
    {
        return $this->belongsTo('Grade', 'grade_id', 'id');
    }
    
    public function chapter()
    {
        return $this->hasMany('Chapter');
    }
 
}
<?php
use Illuminate\Database\Eloquent\SoftDeletingTrait;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;

class Grade extends Eloquent implements SluggableInterface
{
    use SoftDeletingTrait;
    use SluggableTrait;

    //// Use custom publish status, get only published
    use PublishedTrait;

    protected $table = 'grades';
    protected $dates = ['deleted_at'];

    protected $sluggable = array(
        'build_from' => 'title',
        'save_to'    => 'slug',
    );

    protected $fillable = [
        'title',
        'description',
        'slug',
        'weight',
        'status',
        'author_id'
    ];

    public function subject()
    {
        return $this->hasMany('Subject', 'grade_id', 'id');
    }

    public function chapter()
    {
        return $this->hasMany('Chapter', 'grade_id', 'id');
    }

    public function lession()
    {
        return $this->hasMany('Lession', 'grade_id', 'id');
    }

    public function author(){
        return $this->belongsTo('Admin', 'author_id', 'id');
    }
 
}
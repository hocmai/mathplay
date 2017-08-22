<?php
use Illuminate\Database\Eloquent\SoftDeletingTrait;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;

class Chapter extends Eloquent implements SluggableInterface
{
    use SoftDeletingTrait;
    use SluggableTrait;
    protected $table = 'chapters';
    protected $fillable = [
        'title',
        'subject_id',
        'author_id',
        'status',
        'weight',
        'slug',
        'description',
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
    
    public function subject()
    {
        return $this->belongsTo('Subject', 'subject_id', 'id');
    }
 
}
<?php
use Illuminate\Database\Eloquent\SoftDeletingTrait;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;

class Subject extends Eloquent implements SluggableInterface
{
    use SoftDeletingTrait;
    use SluggableTrait;
    protected $table = 'subjects';
    protected $fillable = [
        'title',
        'grade_id',
        'author_id',
        'status',
        'weight_number',
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
 
}
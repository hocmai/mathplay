<?php
use Illuminate\Database\Eloquent\SoftDeletingTrait;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;

class Lession extends Eloquent implements SluggableInterface
{
    use SoftDeletingTrait;
    use SluggableTrait;
    protected $table = 'lessions';
    protected $fillable = [
        'title',
        'chapter_id',
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
    
    public function chapter()
    {
        return $this->belongsTo('Chapter', 'chapter_id', 'id');
    }
 
}
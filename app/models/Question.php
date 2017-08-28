<?php
use Illuminate\Database\Eloquent\SoftDeletingTrait;
// use Cviebrock\EloquentSluggable\SluggableInterface;
// use Cviebrock\EloquentSluggable\SluggableTrait;

class Question extends Eloquent
{
    // use SoftDeletingTrait;
    // use SluggableTrait;
    protected $table = 'questions';
    protected $fillable = [
        'title',
        'type',
        'content',
        'config',
    ];
    protected $dates = ['deleted_at'];

    public function author()
    {
        return $this->belongsTo('Admin', 'author_id', 'id');
    }


    public function lession()
    {
        return $this->belongsToMany('Lession', 'lession_question', 'qid');
    }
 
}
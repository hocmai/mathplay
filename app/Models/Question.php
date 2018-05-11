<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletingTrait;
// use Cviebrock\EloquentSluggable\SluggableInterface;
// use Cviebrock\EloquentSluggable\SluggableTrait;

class Question extends Model
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
    // protected $dates = ['deleted_at'];

    public function author()
    {
        return $this->belongsTo('App\Models\Admin', 'author_id', 'id');
    }


    public function lession()
    {
        return $this->belongsToMany('App\Models\Lession', 'lession_question', 'qid', 'lession_id');
    }
 
}
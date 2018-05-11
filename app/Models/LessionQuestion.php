<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletingTrait;
// use Cviebrock\EloquentSluggable\SluggableInterface;
// use Cviebrock\EloquentSluggable\SluggableTrait;

class LessionQuestion extends Model
{
    // use SoftDeletingTrait;
    // use SluggableTrait;
    protected $table = 'lession_question';
    protected $fillable = [
        'lession_id',
        'qid',
        'config',
    ];
    public $timestamps = false;

}
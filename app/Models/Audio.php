<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletingTrait;
// use Cviebrock\EloquentSluggable\SluggableInterface;
// use Cviebrock\EloquentSluggable\SluggableTrait;

class Audio extends Model
{
    // use SoftDeletingTrait;
    // use SluggableTrait;
    
    //// Use custom publish status, get only published
    // use PublishedTrait;

    protected $table = 'audio';
    protected $fillable = [
        'title',
        'url',
        'slug',
    ]; 
}
<?php
// use Illuminate\Database\Eloquent\SoftDeletingTrait;
// use Cviebrock\EloquentSluggable\SluggableInterface;
// use Cviebrock\EloquentSluggable\SluggableTrait;

class Audio extends Eloquent
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
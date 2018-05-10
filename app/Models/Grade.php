<?php
namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;

class Grade extends Model
{
    use SoftDeletes;
    use Sluggable;
    use SluggableScopeHelpers;
    //// Use custom publish status, get only published

    protected $table = 'grades';
    protected $dates = ['deleted_at'];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

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
        return $this->hasMany('App\Models\Subject', 'grade_id', 'id');
    }

    public function chapter()
    {
        return $this->hasMany('App\Models\Chapter', 'grade_id', 'id');
    }

    public function lession()
    {
        return $this->hasMany('App\Models\Lession', 'grade_id', 'id');
    }

    public function author(){
        return $this->belongsTo('App\Models\Admin', 'author_id', 'id');
    }
 
}
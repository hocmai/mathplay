<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DifficultModel extends Model
{
 	protected $table = 'difficulty';
    protected $primaryKey = 'diff_id';

    protected $fillable = ['*'];
    public $timestamps = false;
}

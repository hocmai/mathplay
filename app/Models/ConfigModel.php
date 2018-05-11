<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class ConfigModel  extends Model
{
    protected $table = 'config';
    protected $fillable = ['name', 'collection', 'data'];
    protected $primaryKey = ['name', 'collection'];
    
    public $timestamps = false;
    public $incrementing = false;
}
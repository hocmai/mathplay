<?php
class ConfigModel  extends Eloquent
{
    protected $table = 'config';
    protected $fillable = ['name', 'collection', 'data'];
    protected $primaryKey = ['name', 'collection'];
    
    public $timestamps = false;
    public $incrementing = false;
}
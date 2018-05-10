<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FileModel extends Model
{
    protected $table = 'file';
    protected $primaryKey = 'fid';

    protected $filltable = ['*'];
    public $timestamps = false;

    /**
     * 1-n
     * 1 file duoc tao boi 1 User
     * 1 user tao duoc nhieu File
     */
    public function user(){
    	return $this->belongto('App\UserModel');
    }
}

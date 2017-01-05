<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    public $timestamps = true;
    //protected $fillable = array('name', 'description', 'path');
    /*public $table = "files";*/
    public $fillable = ['name', 'description', 'path'];

    public function addFile(File $file, $userId)
    {
        $file->user_id=$userId;
        return $this->save($file);
    }

}

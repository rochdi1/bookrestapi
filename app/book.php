<?php

namespace App;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class book extends Model
{
    //
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $fillable = ['isbn', 'title'];
    //protected $primaryKey = 'isbn';

   

    public function authors()
    {
        return $this->belongsToMany('App\author');
    }


    public function thumbnails()
    {
        return $this->hasMany('App\thumbnail');
    }

}

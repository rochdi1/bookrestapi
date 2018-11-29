<?php

namespace App;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class thumbnail extends Model
{
    //
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    
    protected $fillable = ['book_id', 'url', 'title'];

    public function book()
    {
        return $this->belongsTo('App\book');
    }

}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Article extends Model
{
    //
    use SoftDeletes;
//    protected $table = 'articles';
//    protected $primaryKey = 'id';
//    public $incrementing = 'false';  // ete autoincrementov parametr chunenq
//      public $timestamps = 'false';  //ete chenq uzum ogtagorcel

    protected $fillable = ['name','text','img'];
    protected $dates = ['deleted_at'];

//    protected $guarded = ['*'];  // tuyl chi talis avelacnel bazayum

    public function User(){
        return $this->belongsTo('App\User');
    }

}

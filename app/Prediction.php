<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prediction extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'predictions';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['ref_date', 'prediction', 'name', 'comment', 'created_at'];
    
    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];
    
    /**
     * createメソッド利用時に、入力を受け付けないカラムの指定
     *
     * @var array
     */
    protected $guarded = array('id'); // この行を追加。
    
    
}

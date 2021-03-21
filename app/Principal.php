<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Principal extends Model
{
    protected  $fillable =  ['nome','phone','email','logo'];
    protected $table = 'dados';

     public function user(){
    return $this->belongsTo(User::class);
    }

}

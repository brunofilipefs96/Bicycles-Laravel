<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bicycle extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'brand',
        'model',
        'color',
        'price'
    ];

    public function person(){
        return $this->belongsTo(Person::class);
    }
}

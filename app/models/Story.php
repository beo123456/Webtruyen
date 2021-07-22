<?php

namespace App\models;
use App\models\Category;

use Illuminate\Database\Eloquent\Model;

class Story extends Model
{
    protected $table = 'stories';
    public $timestamps = false;
    public function Category_foreign(){
        return $this->belongsTo(Category::class,'category_id','id');
    }
}

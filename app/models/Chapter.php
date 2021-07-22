<?php

namespace App\models;
use App\models\Story;

use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    protected $table = 'chapters';
    public function Story_Foreign(){
        return $this->belongsTo(Story::class,'story_id','id');
    }
}

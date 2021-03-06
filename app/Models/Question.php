<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Auth;

class Question extends Model
{

    protected $table = 'question';

    // Primary Key
    public $primaryKey = 'id';
    
    // Timestamps
    public $timestamps = true;

    protected $fillable = [
        'question', 'survey_id'
    ];

    public function survey()
    {
        return $this->belongsTo('App\Models\Survey');
    }

    public function answer()
    {
        return $this->hasMany('App\Models\Answer');
    }

    public function recipient()
    {
        return $this->hasMany('App\Models\QuestionRecipient');
    }

    public function recipientOne()
    {
        return $this->hasOne('App\Models\QuestionRecipient');
    }
}

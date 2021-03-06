<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Auth;

class QuestionRecipient extends Model
{

    protected $table = 'question_recipient';

    // Primary Key
    public $primaryKey = 'id';
    
    // Timestamps
    public $timestamps = true;

    protected $fillable = [
        'question_id',
        'survey_id',
        'user_id',
        'answer',
        'is_answer'
    ];

    public function question()
    {
        return $this->belongsTo('App\Models\Question');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}

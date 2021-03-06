<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Auth;

class Survey extends Model
{

    protected $table = 'survey';

    // Primary Key
    public $primaryKey = 'id';
    
    // Timestamps
    public $timestamps = true;

    protected $fillable = [
        'survey_set'
    ];

    public function user()
    {
        return $this->hasMany('App\User');
    }

    public function question()
    {
        return $this->hasMany('App\Models\Question');
    }
}

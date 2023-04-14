<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SurveyInfoHeader extends Model
{
    use HasFactory;
    protected $fillable = [
        'interviewerId',
        'surveySetId',
        'dateCreated',
        'interviewedName',
        'interviewedPhone',
        'neighborhood',
        'municipality',
    ];

    public function interviewers()
    {
        return $this->belongsTo(Interviewer::class);
    }
    public function answers()
    {
        return $this->hasMany(Answer::class,"infoHeaderId");
    }
    
    public function survey_sets()
    {
        return $this->belongsTo(SurveySet::class);
    }
}

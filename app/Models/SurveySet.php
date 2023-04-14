<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SurveySet extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'dateCreated',
    ];

    public function questions()
    {
        return $this->hasMany(Question::class,'surveyId');
    }
    public function survey_info_headers()
    {
        return $this->hasMany(SurveyInfoHeader::class,"surveySetId");
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    protected $fillable = [
        'questionName',
        'isRequired',
        'inputTypeId',
        'surveyId'
    ];

    public function input_types()
    {
        return $this->hasMany(InputType::class);
    }
    public function survey_sets()
    {
        return $this->belongsTo(SurveySet::class);
    }
    public function options()
    {
        return $this->hasMany(Option::class, 'questionId');
    }
}

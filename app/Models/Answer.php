<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;

    protected $fillable = [
        'answerSelected',
        'variableSelected',
        'infoHeaderId',
        'optionId',
    ];
    public function survey_info_headers()
    {
        return $this->belongsTo(SurveyInfoHeader::class);
    }
    public function options()
    {
        return $this->belongsTo(Option::class);
    }
}

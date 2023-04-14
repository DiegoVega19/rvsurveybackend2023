<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Interviewer extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'lastName',
        'email',
        'isAdmin',
        'isEnabled'
    ];

    public function survey_info_headers()
    {
        return $this->hasMany(SurveyInfoHeader::class,"interviewerId");
    }
}

<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use App\Models\SurveyQuestionsTranslation;
use App\Models\SurveyQuestionOptionsTranslation;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Language extends Model
{
    use HasFactory;

    protected $table = 'languages';

    protected $fillable = [
        'name',
        'iso_code',
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function surveyQuestionsTranslations()
    {
        return $this->hasMany(SurveyQuestionsTranslation::class);
    }

    public function surveyQuestionOptionsTranslations()
    {
        return $this->hasMany(SurveyQuestionOptionsTranslation::class);
    }
}

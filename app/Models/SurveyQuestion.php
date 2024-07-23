<?php

namespace App\Models;

use App\Models\Survey;
use App\Models\SurveyQuestionOption;
use Illuminate\Database\Eloquent\Model;
use App\Models\SurveyQuestionsTranslation;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SurveyQuestion extends Model
{
    use HasFactory;

    protected $table = 'survey_questions';

    protected $fillable = [
        'survey_id',
        'type',
        'allow_multiple_answers',
    ];

    public function survey()
    {
        return $this->belongsTo(Survey::class);
    }

    public function translations()
    {
        return $this->hasMany(SurveyQuestionsTranslation::class);
    }

    public function options()
    {
        return $this->hasMany(SurveyQuestionOption::class);
    }
}

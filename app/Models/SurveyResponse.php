<?php

namespace App\Models;

use App\Models\SurveysUser;
use App\Models\SurveyQuestion;
use App\Models\SurveyQuestionOption;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SurveyResponse extends Model
{
    use HasFactory;

    protected $table = 'survey_responses';

    protected $fillable = [
        'surveys_users_id',
        'survey_question_id',
        'survey_question_option_id',
        'text',
    ];

    public function surveysUser()
    {
        return $this->belongsTo(SurveysUser::class, 'surveys_users_id');
    }

    public function question()
    {
        return $this->belongsTo(SurveyQuestion::class, 'survey_question_id');
    }

    public function option()
    {
        return $this->belongsTo(SurveyQuestionOption::class, 'survey_question_option_id');
    }
}

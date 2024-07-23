<?php

namespace App\Models;

use App\Models\SurveyQuestion;
use Illuminate\Database\Eloquent\Model;
use App\Models\SurveyQuestionOptionsTranslation;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SurveyQuestionOption extends Model
{
    use HasFactory;

    protected $table = 'survey_question_options';

    protected $fillable = [
        'survey_question_id',
    ];

    public function question()
    {
        return $this->belongsTo(SurveyQuestion::class, 'survey_question_id');
    }

    public function translations()
    {
        return $this->hasMany(SurveyQuestionOptionsTranslation::class);
    }
}


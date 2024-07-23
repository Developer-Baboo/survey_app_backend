<?php

namespace App\Models;

use App\Models\Language;
use App\Models\SurveyQuestion;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SurveyQuestionsTranslation extends Model
{
    use HasFactory;

    protected $table = 'survey_questions_translations';

    protected $fillable = [
        'survey_question_id',
        'language_id',
        'text',
    ];

    public function question()
    {
        return $this->belongsTo(SurveyQuestion::class, 'survey_question_id');
    }

    public function language()
    {
        return $this->belongsTo(Language::class);
    }
}

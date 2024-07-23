<?php

namespace App\Models;

use App\Models\Language;
use App\Models\SurveyQuestionOption;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SurveyQuestionOptionsTranslation extends Model
{
    use HasFactory;

    protected $table = 'survey_question_options_translations';

    protected $fillable = [
        'survey_question_option_id',
        'language_id',
        'text',
    ];

    public function option()
    {
        return $this->belongsTo(SurveyQuestionOption::class, 'survey_question_option_id');
    }

    public function language()
    {
        return $this->belongsTo(Language::class);
    }
}

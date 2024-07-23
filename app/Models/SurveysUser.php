<?php

namespace App\Models;

use App\Models\User;
use App\Models\Survey;
use App\Models\SurveyResponse;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SurveysUser extends Model
{
    use HasFactory;

    protected $table = 'surveys_users';

    protected $fillable = [
        'surveyee_id',
        'survey_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'surveyee_id');
    }

    public function survey()
    {
        return $this->belongsTo(Survey::class);
    }

    public function responses()
    {
        return $this->hasMany(SurveyResponse::class, 'surveys_users_id');
    }
}

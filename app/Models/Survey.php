<?php

namespace App\Models;

use App\Models\Deduction;
use App\Models\SurveyQuestion;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Survey extends Model
{
    use HasFactory;

    protected $table = 'surveys';

    protected $fillable = [
        'type',
        'name',
        'order',
        'full_reward',
        'timer_hours',
        'reduced_reward',
        'expiry',
        'status',
        'pushed_at',
    ];

    public function questions()
    {
        return $this->hasMany(SurveyQuestion::class);
    }

    public function deductions()
    {
        return $this->hasMany(Deduction::class);
    }
}

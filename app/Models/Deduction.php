<?php

namespace App\Models;

use App\Models\User;
use App\Models\Survey;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Deduction extends Model
{
    use HasFactory;

    protected $table = 'deductions';

    protected $fillable = [
        'survey_id',
        'user_id',
        'amount',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function survey()
    {
        return $this->belongsTo(Survey::class);
    }
}

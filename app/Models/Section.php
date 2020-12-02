<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Section extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ['course_id','title', 'slug', 'description'];

    public function lessons() {
        return $this->hasMany(Lesson::class);
    }

    public function course() {
        return $this->belongsTo(Course::class);
    }

    public function getTotalTimeLessonAttribute()
    {
        return $this->lessons()->select(DB::raw("SEC_TO_TIME(SUM(TIME_TO_SEC(duration))) as  total"))->first();
    }
}

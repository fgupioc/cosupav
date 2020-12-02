<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    use HasFactory;
    use SoftDeletes;

    const STATUS = ['Publish', 'Future', 'Draft', 'Pending', 'Private', 'Trash', 'Auto-Draft', 'Inherit'];

    protected $fillable = ['title', 'uuid', 'slug', 'logo', 'description', 'to_learn', 'requirements', 'condition'];

    public function getPathLogoAttribute()
    {
        return "{$this->uuid}/{$this->logo}";
    }

    public function getShowLogoAttribute()
    {
        return "files/logos/{$this->uuid}/{$this->logo}";
    }

    public function sections()
    {
        return $this->hasMany(Section::class)->with('lessons');
    }

    public function getTotalTimeSectionAttribute()
    {
        $total = 0;
        foreach ($this->sections as $section) {
            foreach ($section->lessons as $lesson) {
                if ($lesson->condition == 'Publish') {
                    $parts = explode(":", $lesson->duration);
                    $total += $parts[2] + $parts[1] * 60 + $parts[0] * 3600;
                }
            }
        }
        return gmdate("H:i:s", $total);
    }

    public function getTotalLessonsAttribute()
    {
        $total = 0;
        foreach ($this->sections as $item) {
            $total += $item->lessons->count();

        }
        return $total;
    }

    public function scopeListLessons($query, $course_id)
    {
        return $query->join('sections', 'courses.id', '=', 'sections.course_id')
            ->join("lessons", "sections.id", "=", "lessons.section_id")
            ->select("lessons.*")
            ->where('courses.id', $course_id);
    }
}

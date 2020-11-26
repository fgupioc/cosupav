<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lesson extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['section_id', 'title', 'slug', 'subtitle', 'duration', 'url', 'description'];

    public function section() {
        return $this->belongsTo(Section::class);
    }
}

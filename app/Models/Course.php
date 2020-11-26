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
}

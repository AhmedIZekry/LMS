<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CourseCategory extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'icon',
        'status',
        'show_at_trending',
        'image',
        'parent_id'
    ];

    function subCategories():hasMany
    {
        return $this->hasMany(CourseCategory::class, 'parent_id');
    }
}

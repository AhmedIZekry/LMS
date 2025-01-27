<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable =[
        'title',
        'slug',
        'seo_description',
        'thumbnail',
        "demo_video_source",
        'price',
        'discount',
        'description',
        'category_id',
        'course_level_id',
        'course_language_id',
        'capacity',
        'duration',
        'certificate',
        'qan',
    ];
}

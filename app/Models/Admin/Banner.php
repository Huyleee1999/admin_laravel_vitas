<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Banner extends Model
{
    use HasFactory;

    protected $table = 'vitas_blog_banners';

    protected $fillable = [
        'title',
        'description',
        'status',
        // 'image'
        'type',
        'slug',
        'created_at',
        'updated_at'
    ];
}

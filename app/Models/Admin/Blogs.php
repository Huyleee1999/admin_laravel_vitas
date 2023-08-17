<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\Professions;
use App\Models\Admin\Experts;


class Blogs extends Model
{
    use HasFactory;

    protected $table = 'vitas_blog_blogs';

    protected $fillable = [
        'name',
        'descripstion',
        'content',
        'status',
        'type',
        'slug',
        'profession_id',
        'expert_id',
        'is_highlight',
        'created_at',
        'updated_at'
    ];

    public function experts() {
        return $this->belongsTo(Experts::class, 'expert_id', 'id');
    }

    public function professions() {
        return $this->belongsTo(Professions::class, 'profession_id', 'id');
    }
}


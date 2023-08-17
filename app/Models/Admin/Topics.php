<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\Professions;
use App\Models\Admin\Forums;

class Topics extends Model
{
    use HasFactory;

    protected $table = 'vitas_blog_topics';

    protected $fillable = [
        'name',
        'icon',
        'status',
        'profession_id',
        'description',
        'slug',
        'created_at',
        'updated_at'
    ];

    public function professions() {
        return $this->belongsTo(Professions::class, 'profession_id', 'id');
    }

    public function forums() {
    return $this->hasMany(Forums::class, 'topic_id', 'id');
    }
}

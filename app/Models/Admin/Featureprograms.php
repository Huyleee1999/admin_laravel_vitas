<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\Professions;
use App\Models\Admin\Experts;
use App\Models\Admin\Tags;
use App\Models\Admin\ExpertPrograms;
use App\Models\Admin\Tagprograms;


class Featureprograms extends Model
{
    use HasFactory;

    protected $table = 'vitas_blog_featureprograms';

    protected $fillable = [
        'name',
        'description',
        'content',
        'profession_id',
        'is_highlight',
        'status',
        'created_at',
        'updated_at',
        'slug'
    ];

    public function professions() {
        return $this->belongSto(Professions::class, 'profession_id', 'id');
    }

    public function experts() {
        return $this->belongsToMany(Experts::class, ExpertPrograms::class, 'expert_id', 'program_id');
    }

    // public function tags() {
    //     return $this->belongsToMany(Tags::class, Tagprograms::class, 'program_id', 'tag_id');
    // }

    public function tagprograms() {
        return $this->hasMany(Tagprograms::class, 'program_id', 'id');
    }

}

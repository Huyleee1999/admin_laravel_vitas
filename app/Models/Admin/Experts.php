<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\Featureprograms;
use App\Models\Admin\Blogs;
use App\Models\Admin\Evaluates;
use App\Models\Admin\ExpertPrograms;


class Experts extends Model
{
    use HasFactory;

    protected $table = 'users';

    protected $fillable = [
        'name',
        'email',
        'is_actived',
        'created_at',
        'updated_at',
        'username',
        'phone',
        'city_id',
        'professions_id',
        'company',
        'experience',
        'status',
        'type',
        'is_highlight',
        'description',
        'price',
        'content',
        'position',
        'project',
        'certificate',
        'slug'
        // 'name',
        // 'phone',
        // 'email',
        // 'city_id',
        // 'created_at',
        // 'updated_at',
    ];

    public function featureprograms() {
        return $this-> belongsToMany(Featureprograms::class, ExpertPrograms::class, 'program_id', 'expert_id');
    }

    public function blogs() {
        return $this-> hasMany(Blogs::class, 'expert_id', 'id');
    }

    public function evaluates() {
        return $this-> hasMany(Evaluates::class, 'expert_id', 'id');
    }
}


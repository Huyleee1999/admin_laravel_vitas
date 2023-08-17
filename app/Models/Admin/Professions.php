<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\Contacts;
use App\Models\Admin\Blogs;
use App\Models\Admin\Featureprograms;
use App\Models\Admin\Questions;
use App\Models\Admin\Topics;


class Professions extends Model
{
    use HasFactory;

    protected $table = 'vitas_blog_professions';

    protected $fillable = [
        'name',
        'status',
        'created_at',
        'updated_at'
    ];

    public function blogs() {
        return $this-> hasMany(Blogs::class, 'profession_id', 'id');
    }

    public function contacts() {
        return $this-> hasMany(Contacts::class, 'profession_id', 'id');
    }

    public function programs() {
        return $this-> hasMany(Featureprograms::class, 'profession_id', 'id');
    }

    public function questions() {
        return $this-> hasMany(Questions::class, 'profession_id', 'id');
    }

    public function topics() {
        return $this-> hasMany(Topics::class, 'profession_id', 'id');
    }
}

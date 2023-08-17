<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\Featureprograms;
use App\Models\Admin\Tagprograms;

class Tags extends Model
{
    use HasFactory;

    protected $table = 'vitas_blog_tags';

    protected $fillable = [
        'name',
        'status',
        'created_at',
        'updated_at'
    ];

    // public function programs() {
    //     return $this->belongsToMany(Featureprograms::class, Tagprograms::class, 'tag_id', 'program_id');
    // }

    public function tagprograms() {
        return $this->hasMany(Tagprograms::class, 'tag_id', 'id');
    }
}

<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\Topics;
use App\Models\Admin\Users;
use App\Models\Admin\Comments;

class Forums extends Model
{
    use HasFactory;

    protected $table = 'vitas_blog_forums';

    protected $fillable = [
        'name',
        'content',
        'created_by',
        'topic_id',
        'status',
        'is_highlight',
        'created_at',
        'updated_at',
        'slug'
    ];

    public function topics() {
        return $this->belongsTo(Topics::class, 'topic_id', 'id');
    }

    public function users() {
        return $this->belongsTo(Users::class, 'created_by', 'id');
    }

    public function comments() {
        return $this->hasMany(Comments::class, 'forum_id', 'id');
    }
}

<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\Forums;
use App\Models\Admin\Users;

class Comments extends Model
{
    use HasFactory;

    protected $table = 'vitas_blog_comments';

    protected $fillable = [
        'content',
        'like',
        'forum_id',
        'user_id',
        'status',
        'created_at',
        'updated_at'
    ];

    public function forums() {
        return $this->belongsTo(Forums::class, 'forum_id', 'id');
    }

    public function users() {
        return $this->belongsTo(Users::class, 'user_id', 'id');
    }
}

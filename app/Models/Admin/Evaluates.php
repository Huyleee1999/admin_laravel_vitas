<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\Users;
use App\Models\Admin\Experts;

class Evaluates extends Model
{
    use HasFactory;

    protected $table = 'vitas_blog_evaluates';

    protected $fillable = [
        'rate',
        'expert_id',
        'user_id',
        'content',
        'status',
        'created_at',
        'updated_at'
    ];

    public function users() {
        return $this->belongsTo(Users::class, 'user_id', 'id');
    }

    public function experts() {
        return $this->belongsTo(Experts::class, 'expert_id', 'id');
    }
}

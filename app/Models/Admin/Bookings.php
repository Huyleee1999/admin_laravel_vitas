<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\Experts;

class Bookings extends Model
{
    use HasFactory;

    protected $table = 'vitas_blog_bookings';

    protected $fillable = [
        'name',
        'date',
        'time',
        'phone',
        'content',
        'link',
        'expert_id',
        'created_at',
        'updated_at',
        'user_id'
    ];

    public function experts() {
        return $this->belongsTo(Experts::class, 'expert_id', 'id');
    }
}

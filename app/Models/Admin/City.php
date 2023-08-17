<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\Users;


class City extends Model
{
    use HasFactory;

    protected $table = 'vitas_blog_cities';

    protected $fillable = [
        'name',
        'gso_id',
        'created_at',
        'updated_at'
    ];

    public function users() {
        return $this->hasOne(Users::class);
    }
}

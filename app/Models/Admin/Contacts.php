<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\Professions;

class Contacts extends Model
{
    use HasFactory;

    protected $table = 'vitas_blog_contacts';

    protected $fillable = [
        'name',
        'phone',
        'content',
        'email',
        'profession_id',
        'created_at',
        'updated_at'
    ];

    public function professions() {
        return $this->belongsTo(Professions::class, 'profession_id', 'id');
    }
}

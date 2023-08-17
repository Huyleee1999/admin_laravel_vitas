<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\Professions;
use App\Models\Admin\City;
use App\Models\Admin\Bookings;
use App\Models\Admin\Comments;
use App\Models\Admin\Evaluates;
use App\Models\Admin\Forums;


class Users extends Model
{
    use HasFactory;

    protected $table = 'users';

    protected $fillable = [
        'name',
        'email',
        'password',
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
        'certificate'
        // 'name',
        // 'phone',
        // 'email',
        // 'city_id',
        // 'created_at',
        // 'updated_at',
    ];

    public function professions() {
        return $this->belongsTo(Professions::class, 'profession_id', 'id');
    }

    public function city() {
        return $this->belongsTo(City::class, 'city_id', 'id');
    }

    public function bookings() {
        return $this->hasMany(Bookings::class, 'user_id', 'id');
    }

    public function comments() {
        return $this->hasMany(Comments::class, 'user_id', 'id');
    }

    public function evaluates() {
        return $this->hasMany(Evaluates::class, 'user_id', 'id');
    }

    public function forums() {
        return $this->hasMany(Forums::class, 'created_by', 'id');
    }
}

<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\Experts;
use App\Models\Admin\Featureprograms;



class ExpertPrograms extends Model
{
    use HasFactory;

    protected $table = 'vitas_blog_expertprograms';

    protected $fillable = [
       
        'expert_id',
        'program_id',
        'created_at',
        'updated_at'
    ];

    public function experts() {
        return $this->belongsTo(Experts::class, 'expert_id', 'id');
    }

    public function featureprograms() {
        return $this->belongsTo(Featureprograms::class, 'program_id', 'id');
    }
    
}

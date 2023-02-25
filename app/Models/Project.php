<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $table = "projects";

    public function project(){
        return $this->hasMany(Projectfiles::class,'project_id','id');
    }

    public function student(){
        return $this->belongsTo(Students::class, 'id', 'student_id');
    }

    // public function projectfiles(){
    //     return $this->hasMany(Projectfiles::class, 'id', 'student_id');
    // }
}

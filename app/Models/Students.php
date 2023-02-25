<?php

namespace App\Models;

use App\Http\Controllers\Backend\StudentCommunication;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;

class Students extends Model
{
    use HasFactory;
    protected $table = "students";

    public function stdUser(){
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function school(){
        return $this->belongsTo(School::class,'school_id','id');
    }

    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function getassignments(){
        return $this->belongsTo(StudentCommunications::class,'assignment','id');
    }
    
    public function assignmentfiles(){
        return $this->hasMany(AssingmentFiles::class, 'assignment_id', 'assignment');
    }

    public function getproject(){
        return $this->hasMany(Project::class, 'student_id', 'id');
    }

    public function projectfiles(){
        return $this->hasMany(Projectfiles::class, 'student_id', 'id');
    }
    
    public function getgrades(){
        return $this->hasMany(Grade::class,'id','grade_id');
    }
}

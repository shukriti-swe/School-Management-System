<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentCommunications extends Model
{
    use HasFactory;
    protected $table = "assignments";

    public function assignmentfiles(){
        return $this->hasMany(AssingmentFiles::class, 'assignment_id', 'id');
    }

     public function assinmentdetails(){
         return $this->hasOne(AssignmentDetails::class, 'assignment_id', 'id');
     }
    
}

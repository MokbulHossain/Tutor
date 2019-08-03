<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hire extends Model
{
	protected $table ='hires';
    //public $timestamps = false;
    
    protected function tutor(){
         return $this->belongsTo(Tutor::class);
    }
    protected function student_parent(){
         return $this->belongsTo(Student_Parent::class,'parent_id');
    }
    protected function student(){
         return $this->belongsTo(User::class,'student_id');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
  protected $table = 'students';
  protected $primaryKey = 'id';
  protected $fillable = ['student_id', 'lec_id','std_title', 'std_fname', 'std_lname', 'facultyname', 'programname', 'academic_year', 'semester', 'project', 'title_research', 'status'];

  public function adviser() {
    return $this->belongsTo('App\Adviser', 'lec_id', 'lec_id');
  }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Adviser extends Model
{
  protected $table = 'tbl_lecturers';
  protected $primaryKey = 'id';
  protected $fillable = ['lec_id', 'personal_id', 'user_name', 'lec_title1', 'lec_title2', 'lec_fname', 'lec_lname', 'academic_name', 'abbreviation', 'major', 'image', 'status'];

  public function student() {
    return $this->hasMany('App\Student', 'lec_id', 'lec_id');
  }
}

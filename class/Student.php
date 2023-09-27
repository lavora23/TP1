<?php

class Student extends Person{
  private $studentId;

  public function setStudentId($studentId){
    $this->studentId = $studentId;
  }

  public function getStudentId(){
    return $this->studentId;
  }
}

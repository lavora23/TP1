<?php
  class person{
  private $name;
  private $address;
  public $zipCode;
  public $phone;
  public $email;
  
 public function __construct($name = null){
    $this->name = $name;
  }
public function getName(){
    return $this->name;

}

public function setName($name){
    $this->name = $name;
  }

public function __destruct(){
    $this->name = "";
}


}

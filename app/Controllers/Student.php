<?php
  namespace App\Controllers;
  use App\Support\Database;
  use App\Facade\HASH;
  use App\Facade\Image;
  class Student extends Database{
    use Image;
    /**create new student**/
    public function createNewStudent($name,$email,$cell,$pass,$photo){
      $file_name=$this->move($photo,'photos/students/');
      //Can use this format as well "this->create();"
      parent::create('students',[
        'name'    => $name,
        'email'   => $email,
        'cell'    => $cell,
        'password'=> HASH::make($pass),
        'photo'   => $file_name['file_name']
      ]);
    }
  }
?>
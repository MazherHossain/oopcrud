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
    /*get all data*/
    public function allStudent($trash=0){
      return $this-> cq("SELECT * FROM students WHERE trash='$trash'");
    }
    /*Delete student*/
    public function deleteStudent($id){
      $this->delete('students',$id);
      header('location:index.php');
    }
    /*Show student*/
    public function showStudent($id){
      return $this->find('students',$id);
    }
    /*edit student*/
    public function editStudent($id){
      return $this->find('students',$id);
    }
    /*update student*/
    public function updateStudentData($name,$email,$cell,$old_photo,$new_photo,$id){
      if(empty($new_photo['name'])){
        $photo_name=$old_photo;
      }
      else{
        $p_name=$this-> move($new_photo,'photos/students/');
        $photo_name=$p_name['file_name'];
        unlink('photos/students/'.$old_photo);
      }
      $this->update('students',$id,[
        'name'    => $name,
        'email'   => $email,
        'cell'    => $cell,
        'photo'   => $photo_name
      ]);
    }

    /*trash*/
    public function dataCount($type='published'){
      if($type=='trash'){
        $data_type=1;
      }
      else{
        $data_type=0;
      }

      $data = $this -> cq("SELECT * FROM students WHERE trash='$data_type'");
      if($data -> num_rows>0){
        return $data -> num_rows;
      }
    }
    public function trashStudent($id){
      $this -> cq("UPDATE students SET trash=1 WHERE id='$id'");
    }
    public function restoreStudent($id){
      $this -> cq("UPDATE students SET trash=0 WHERE id='$id'");
    }
  }
?>
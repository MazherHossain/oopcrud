<?php
  namespace App\Facade;

  trait Image{
    public function move($file_info, $path='/'){
      $file_name = $file_info['name'];
      $file_tmp_name = $file_info['tmp_name'];
      $unique_name = $this -> uniqueName($file_name);
      move_uploaded_file($file_tmp_name,$path.$unique_name);
      return [
        'file_name'=> $unique_name
      ];
    }
  }
?>
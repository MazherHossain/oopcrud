<?php
  namespace App\Facade;

  trait Image{
    
    public function move($file_info, $path='/'){
      $file_name = $file_info['name'];
      $file_arr=explode('.',$file_name);
      $file_extension= end($file_arr);
      $file_tmp_name = $file_info['tmp_name'];
      $unique_name = md5(time().rand()).'.'.strtolower($file_extension);
      move_uploaded_file($file_tmp_name,$path.$unique_name);
      return [
        'file_name'=> $unique_name
      ];
    }
    
  }
?>
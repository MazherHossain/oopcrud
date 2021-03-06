<?php
  
  namespace App\Support;
  use mysqli;

  //Database management
  abstract class Database{
    private $host = 'localhost';
    private $user = 'root';
    private $pass = '';
    private $db = 'oopcrud';
    private $connection;

//Database connection
  private function connection(){
    return $this->connection=new mysqli($this->host,$this->user,$this->pass,$this->db);
  }
//Create Data
  protected function create(string $table,array $data){
    //get column name
    $arr_key=array_keys($data);
    $db_col= implode(', ',$arr_key);
    //get values
    $arr_val = array_values($data);
    $data_str='';
    foreach($arr_val as $val){
      $data_str .= "'".$val."',";
    }
    $data_val= substr($data_str, 0, -1);
    $this->connection()->query("INSERT INTO $table ($db_col) VALUES ($data_val)");
  }
//Find Data
  protected function find($table,$id){
    $data=$this->connection()->query("SELECT * FROM $table WHERE id='$id'");
    return $data->fetch_object();
}
//Delete Data
  protected function delete($table,$id){
    $this->connection()->query("DELETE FROM $table WHERE id = '$id'");
}
//Update Data
  protected function update(string $table,int $id,array $data){
    $query_string ='';
    foreach($data as $key => $value){
      $query_string.=$key."= '".$value . "',";
    }
    $update_str = substr($query_string, 0, -1);
    $this->connection()->query("UPDATE $table SET $update_str WHERE id='$id'");
}
//All Data
  protected function all($table,$order='DESC'){
    return $this -> connection()->query("SELECT * FROM $table ORDER by id $order");
}
//custom query
  protected function cq($sql){
    return $this->connection()->query($sql);
  }
//Where condition
  protected function where(){
    
}
//OrWhere condition
  protected function orWhere(){
    
}

}
?>
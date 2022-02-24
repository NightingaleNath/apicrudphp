<?php
class Database {
public $db;
public function getConnection(){
$this->db = null;
try{
$this->db = new mysqli('remotemysql.com','Jc8lsyo13T','xnCjtmp6L2','Jc8lsyo13T');
}catch(Exception $e){
echo "Database could not be connected: " . $e->getMessage();
}
return $this->db;
}
}
?>

<?php

class Database{
    
private $servername = DB_HOST;
private $user = DB_USER;
private $pass = DB_PASSWORD;
private $dbname = DB_NAME;

private $handler;
private $stmt;
private $errormsg;

public function __construct(){
   $conn = 'mysql:host='. $this->servername .';dbname=' .$this->dbname;
   $options = array(
       PDO::ATTR_PERSISTENT => true,
       PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
       PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
       PDO::ATTR_EMULATE_PREPARES   => false,
   );

try{
$this->handler = new PDO($conn, $this->user, $this->pass, $options);
}

catch(POD_Exception $e){
$this->errormsg = $e->getMessage();
echo $this->errormsg;
}

try {
     $pdo = new PDO($conn, $this->user, $this->pass, $options);
} catch (\PDOException $e) {
     throw new \PDOException($e->getMessage(), (int)$e->getCode());
}
  }//end of construct

public function query($sql){
$this->stmt = $this->handler->prepare($sql);
}//end of query

public function bind($param, $value,$type=null){
if(is_null($type)){
switch(true){

case is_int($value):
$type = PDO::PARAM_INT;
break;

case is_bool($value):
$type = PDO::PARAM_BOOL;
break;

case is_null($value):
$type = PDO::PARAM_NULL;
break;

default:
$type = PDO::PARAM_STR;

}//end of switch
 }//end of if

$this->stmt->bindValue($param, $value,);
  }//end of bind

public function execute(){
return $this->stmt->execute();
}//end of execute

public function resultSet(){
$this->execute();
return $this->stmt->fetchAll(PDO::FETCH_OBJ);
}//end of resultSet

public function single(){
$this->execute();
return $this->stmt->fetch(PDO::FETCH_OBJ);
}//end of single

public function rowCount(){
$this->execute();
return $this->stmt->rowCount();
}//end of rowCount

public function lastInsertedId(){
return $this->stmt->lastInsertedId();
}//end of lastInsertedId


}//end of database
?>
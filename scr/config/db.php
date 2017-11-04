<?php
class db{
//propiedades de conexión con la base
private $dbhost ='senaiot.mysql.database.azure.com';
private $dbuser='juan_amezquita@senaiot';
private $dbpass='Octubre811015';
private $dbname='sensores';

//connect
 public function connect()
{
    $mysql_connect_str="mysql:host=$this->dbhost; dbname=$this->dbname;";
    $dbconnection= new PDO($mysql_connect_str,$this->dbuser,$this->dbpass);
    $dbconnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   return $dbconnection;
}




}
 ?>

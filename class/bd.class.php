<?php
    class Database{
       var $host;
       var $port;
       var $db_name;
       var $user;
       var $password;
       var $con;

       function conectar(){
           $this->host = "localhost";
           $this->db_name = "proyecto";
           $this->user = "elpp";
           $this->password = "1234";
           $this->conn = new PDO('mysql:host='.$this->host.';dbname='.$this->db_name.'', $this->user, $this->password);
       }
       function desconectar(){
            $this->conn = null;
       }
   }
   $pdo = new PDO('mysql:host=localhost;dbname=proyecto','elpp','1234');
?>
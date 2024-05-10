<?php
    require_once("config.php");
    class Poke_bbdd{
        protected $con;
        function __construct(){
            $dsn = 'mysql:host='.BBDD_HOST.';dbname='.BBDD_NAME.';charset=utf8';
            try{
                $this->conn = new PDO($dsn, BBDD_USER, BBDD_PASSWORD);
            } catch ( PDOException $e) {
                die("Error: ".$e->getMessage(). "<br>");
            }
        }

        public function getConDB(){
            return $this->con;
        }

        function __destruct(){
            $this->con = null;
        }

        function registro($username, $password, $email){
            $registrar = $this->conn->prepare("INSERT into user(username, password, email) values(:username, md5(:password), :email)");
            $registrar->execute([":username"=>$username, ":password"=>$password, ":email"=>$email]);
        }
    }
?>
<?php
    require_once("config.php");
    class Poke{
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

        function registro($username, $email, $password){
            $registrar = $this->conn->prepare("INSERT into user(username, password, email) values(:username, md5(:password), :email)");
            $registrar->execute([":username"=>$username, ":password"=>$password, ":email"=>$email]);
        }

        function iniciarSesion($username, $email, $password){
            $sesion = $this->conn->prepare("SELECT username, email FROM user WHERE (username = :username OR email = :email) AND password = md5(:password)");
            $sesion->execute([':username' => $username, ':email' => $email, ':password' => $password]);
        
            if($sesion->rowCount()){
                session_start();
                $usuario = $sesion->fetch(PDO::FETCH_ASSOC);
                $_SESSION['username'] = $usuario['username'];
                return true;
            } else {
                return false;
            }
        }        

        function userEmail($userOrEmail) {
            $query = $this->conn->prepare("SELECT username, email from user where (username = :userOrEmail or email = :userOrEmail)");
            $query->execute(['userOrEmail' => $userOrEmail]);

            $resultado = $query->fetch(PDO::FETCH_ASSOC);

            if($resultado){
                if($resultado['username'] === $userOrEmail){

                }
            }
        }

        function mostrarPokemons(){
            $mostrar = $this->conn->prepare("select name, type_1, type_2 from pokemon");
            $mostrar->execute();

            echo "
                <table>
                <tr>
                    <th>name</th>
                    <th>tiype 1</th>
                    <th>type 2</th>
                <tr>
            ";
            while( $fila = $mostrar->fetch()){
                echo "
                     <tr>
                         <td>{$fila['name']}</td>
                         <td>{$fila['type_1']}</td>
                         <td>{$fila['type_2']}</td>
                     </tr>
                ";
             }
             echo "</table>";
        }

    }
?>
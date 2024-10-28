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

        public function registro($username, $email, $password){
            $registrar = $this->conn->prepare("INSERT into user(username, password, email) values(:username, md5(:password), :email)");
            $registrar->execute([":username"=>$username, ":password"=>$password, ":email"=>$email]);
        }

        public function iniciarSesion($userOrEmail, $password){
            $sesion = $this->conn->prepare("SELECT username, email FROM user WHERE (username = :userOrEmail OR email = :userOrEmail) AND password = md5(:password)");
            $sesion->execute([':userOrEmail' => $userOrEmail, ':password' => $password]);
            
            if($sesion->rowCount()){
                return true;
            } else {
                return false;
            }
        }      

        public function emailToUser($userOrEmail) {
            $query = $this->conn->prepare("SELECT username, email from user where (username = :userOrEmail or email = :userOrEmail)");
            $query->execute([':userOrEmail' => $userOrEmail]);

            $resultado = $query->fetch(PDO::FETCH_ASSOC);

            if($resultado){
                if($resultado['username'] === $userOrEmail){
                    return $resultado['username'];
                } else {
                    return $resultado['username'];
                }
            }
        }

        public function getImage($id){
            $image = $this->conn->prepare("SELECT image from pokemon where id = :id");
            $image->execute([':id' => $id]);
            $row = $image->fetch();
            return $row['image'];
        }

        public function mostrarPokemons() {
            $mostrar = $this->conn->prepare("SELECT id, name, type_1, type_2, image FROM pokemon");
            $mostrar->execute();
        
            while ($fila = $mostrar->fetch()) {
                $image = ($fila['image'] == null) ? '../assets/img/logo.png' : "imagen.php?id=" . $fila['id'];
                echo "
                <form method='GET' class='equipo'>
                    <img src='{$image}' class='equipo-image '>
                    <p>{$fila['name']}</p>
                </form>    
                ";
            }
            
        }
        

    }
?>
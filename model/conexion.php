<?php 
    class Database
    {
        private $hostname = "localhost";
        private $database = "persona_pdf";
        private $username = "root";
        private $password = "";
        private $charset = "utf8";
        private $port = 3306;

        //Este coso para la conexion, aja
        function conectar()
        {
            try {
                $conexion = new mysqli($this->hostname, $this->username, $this->password, $this->database, $this->port);
                return $conexion;
            } catch (Exception $e) {
                echo 'Error connection: ' . $e->getMessage();
                exit;
            }
        }
    }

    $db = new Database();
    $conexion = $db->conectar();
?>
<?php

class Crud {

    // Variavel para executar SQL
    public $PDO;

    // Dados do banco de dados
    private $user;
    private $pass;
    private $data_base;
    private $host;

    // Construtor
    public function __construct($user = null, $pass = null, $data = null, $host = null) {

        $this->setUser($user);
        $this->setPass($pass);
        $this->setDB($data);
        $this->seHost($host);
    }

    // Get dos atributos
    public function getUser() {
        return $this->user;
    }

    public function getPass() {
        return $this->pass;
    }

    public function getDB() {
        return $this->data_base;
    }

    public function getHost() {
        return $this->host;
    }

    // Set dos atributos
    public function setUser($u) {
        $this->user = $u;
    }

    public function setPass($p) {
        $this->pass = $p;
    }

    public function setDB($db) {
        $this->data_base = $db;
    }

    public function seHost($h) {
        $this->host = $h;
    }

    // Metodos CRUD e conexao
    public function connect() {

        try {

            $this->PDO = new PDO("mysql:host=".$this->getHost().";dbname=".$this->getDB()."", $this->getUser(), $this->getPass());

            return $this->PDO;

        }catch(PDOException $e) {
            echo "<script>console.error('[CONECTION] Erro de conexão ao Banco de Dados.')</script>";
        }

    }

    public function create($sql = null, $params = null, $con = null) {

        if(!is_null($sql) or !empty($sql)){
            
            try {

                $sqlCode = "INSERT INTO ".$sql." VALUES ".$params."";

                if (is_null($params)) {

                    $values = $con->prepare($sql);
                    $values->execute();
                }else {

                    $values = $con->prepare($sqlCode);
                    $values->execute();
                }

            }catch(PDOException $e) {
                echo "<script>console.error('[EXECUTE] Não foi possível executar o comando \(CREATE\)')</script>";
            }

        }

    }

    public function ready($table = null, $con = null) {

        if(!is_null($table) or !empty($table)){
            
            try {

                $sqlCode = "SELECT * FROM ".$table;

                $values = $con->prepare($sqlCode);
                $values->execute();
                $count = $values->rowCount();

                if ($count > 0) {
                    return $values->fetchAll(PDO::FETCH_OBJ);
                }else {
                    return false;
                }

            }catch(PDOException $e) {
                echo "<script>console.error('[EXECUTE] Não foi possível executar o comando \(READY\)')</script>";
            }

        }

    }

    public function update($sql = null, $params = null, $id = null, $con = null) {

        if(!is_null($sql) or !empty($sql)){
            
            try {

                $sqlCode = "UPDATE ".$sql." SET ".$params." WHERE ".$id;

                if (is_null($params) && is_null($id)) {

                    $values = $con->prepare($sql);
                    $values->execute();
                }else {

                    $values = $con->prepare($sqlCode);
                    $values->execute();
                }

            }catch(PDOException $e) {
                echo "<script>console.error('[EXECUTE] Não foi possível executar o comando \(UPDATE\)')</script>";
            }

        }

    }

    public function delete($sql = null, $params = null, $con = null) {

        if(!is_null($sql) or !empty($sql)){
            
            try {

                $sqlCode = "DELETE FROM ".$sql." WHERE ".$params;

                if (is_null($params)) {

                    $values = $con->prepare($sql);
                    $values->execute();
                }else {

                    $values = $con->prepare($sqlCode);
                    $values->execute();
                }

            }catch(PDOException $e) {
                echo "<script>console.error('[EXECUTE] Não foi possível executar o comando \(DELETE\)')</script>";
            }

        }

    }

}


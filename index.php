<?php
require_once "Crud.php";

$user = "root"; // Nome de usuário do Banco de Dados
$pass = ""; // Senha de acesso para o Banco de Dados
$data = "api"; // Nome da Base de Dados utilizada
$host = "localhost"; // Nome do Host do Banco de Dados

$app = new Crud($user, $pass, $data, $host);

// Conexão retorna true ou false
$con = $app->connect();

if ($con !== false) {

    $sql = "CREATE TABLE prototype (id INT NOT NULL AUTO_INCREMENT, username VARCHAR(255) NOT NULL, lastname VARCHAR(255) NOT NULL, PRIMARY KEY (id))";

    $table_create = 'prototype (username, lastname)';
    $param_create = '("João", "Batista")';

    $table_list = 'prototype';

    $table_update = 'prototype';
    $param_update = 'username = "Júlia", lastname = "Maria"';
    $id_update = 'id = 1';

    $table_delete = 'prototype';
    $param_delete = 'id = 1';
    
    // Metodos CRUD
    // $app->create($sql, null, $con);
    // $app->create($table_create, $param_create, $con);
    // $list = $app->ready($table_list, $con);
    // print_r($list);
    // $app->update($table_update, $param_update, $id_update, $con);
    // $app->delete($table_delete, $param_delete, $con);

}


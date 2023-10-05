<?php
include 'conexao.php';
include 'habilitar_cors.php';

// Valor do CodFun que você deseja atualizar
$codFunToUpdate = 'Sobrenome';

// Consulta SQL para atualizar o Sobrenome onde CodFun corresponde ao valor fornecido
$sql = "UPDATE funcionarios SET Sobrenome = '' WHERE CodFun = '$codFunToUpdate'";

if ($connection->query($sql) === true) {
    echo ("Atualizado");
} else {
    echo ("Falha de conexão: " . $connection->connect_error);
}
?>
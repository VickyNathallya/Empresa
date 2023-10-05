<?php
	include 'conexao.php';
	include 'habilitar_cors.php';

	// Obtém o corpo da solicitação POST
  $data = file_get_contents("php://input");

  // Decodifica o JSON para um objeto PHP
  $requestData = json_decode($data);

	// CodFun é o nome da coluna que está sendo enviado pelo cliente
	$sql = "DELETE FROM funcionarios WHERE CodFun=''";

    if ($connection->query($sql) === true) {
        $response = [
            'mensagem' => 'Registro apagado com sucesso.'
        ];
    } else {
        $response = [
            'mensagem' => $connection->error
        ];
    }
    echo json_encode($response);
?>
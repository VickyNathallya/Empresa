<?php
	include 'conexao.php';
	include 'habilitar_cors.php';

	// Obtém o corpo da solicitação POST
  $data = file_get_contents("php://input");

  // Decodifica o JSON para um objeto PHP
  $requestData = json_decode($data);

  if (isset($requestData->Sobrennome, $requestData->Nome, $requestData->Cargo, $requestData->DataNasc, $requestData->Endereco, $requestData->Cidade, $requestData->CEP, $requestData->Pais, $requestData->Fone, $requestData->Salario)) {
    $Sobrenome = mysqli_real_escape_string($connection, $requestData->nome);
    $Nome = mysqli_real_escape_string($connection, $requestData->sobrenome);
    $Cargo = mysqli_real_escape_string($connection, $requestData->cargo);
    $DataNasc = mysqli_real_escape_string($connection, $requestData->DataNasc);
    $Endereco = mysqli_real_escape_string($connection, $requestData->Endereco);
    $Cidade = mysqli_real_escape_string($connection, $requestData->Cidade);
    $CEP = mysqli_real_escape_string($connection, $requestData->CEP);
    $Pais = mysqli_real_escape_string($connection, $requestData->Pais);
    $Fone = mysqli_real_escape_string($connection, $requestData->Fone);
    $Salario = mysqli_real_escape_string($connection, $requestData->Salario);

    $sql = "INSERT INTO funcionarios (Sobrenome, Nome, Cargo, DataNasc, Endereco, Cidade, CEP, Pais, Fone, Salario) VALUES ('$Sobrenome', '$Nome', '$Cargo', '$DataNasc', '$Endereco', '$Cidade', '$CEP', '$Pais', '$Fone', '$Salario');";

    if ($connection->query($sql) === true) {
        $response = [
            'mensagem' => 'Registro inserido com sucesso!'
        ];
    } else {
        $response = [
            'mensagem' => 'Erro ao inserir registro: ' . $connection->error
        ];
    }
} else {
    $response = [
        'mensagem' => 'campos obrigatorios nao inseridos'
    ];
}
echo json_encode($response);
?>
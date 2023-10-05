<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Empresa</title>

    <!-- bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

    <!-- css -->
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <?php require 'conexao.php'; ?>
    <?php require 'header.php'; ?>
    
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <form action="index.php" method="GET">
                <label>CodFun:</label>
                    <input class="dados" type="text" name='codFunToUpdate'>

                    <label>Sobrenome:</label>
                    <input class="dados" type="text" name='Sobrenome'>

                    <label>Nome:</label>
                    <input class="dados" type="text" name='Nome'>

                    <label>Cargo:</label>
                    <input class="dados" type="text" name='Cargo'>

                    <label>Data de Nascimento:</label>
                    <input class="dados" type="text" name='DataNasc'>

                    <label>Endereço:</label>
                    <input class="dados" type="text" name='Endereco'>

                    <label>Cidade:</label>
                    <input class="dados" type="text" name='Cidade'>

                    <label>CEP:</label>
                    <input class="dados" type="text" name='CEP'>

                    <label>País:</label>
                    <input class="dados" type="text" name='Pais'>

                    <label>Telefone:</label>
                    <input class="dados" type="text" name='Fone'>

                    <label>Salário:</label>
                    <input class="dados" type="text" name='Salario'>

                    <div class="row">
                        <div class="botoes">
                        <div class="col-12">
                            <input class="button mt-4 mb-4" type="submit" name="acao" value="Inserir">
                        </div>
                    </div>
                </form>
            </div>
        </div>
</div>

    <?php
    require './funcionarios/inserir.php';
    $acao = isset($_GET['acao']) ? $_GET['acao'] : null;

    
	include 'conexao.php';
	include 'habilitar_cors.php';

	// Obtém o corpo da solicitação POST
  $data = file_get_contents("php://input");

  // Decodifica o JSON para um objeto PHP
  $requestData = json_decode($data);

	// CodFun é o nome da coluna que está sendo enviado pelo cliente
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
    ?>





</body>
</html>
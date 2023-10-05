<?php
    require 'conexao.php';
    require 'habilitar_cors.php';

    // Declaração SQL a ser executada
    $sql = "SELECT Cargo FROM funcionarios;";

    // Executa a declaração SQL e retorna o resultado
    $result = $connection->query($sql);

    // Verifica se há linhas de registro
    if ($result->num_rows > 0){
        $funcionarios=[];
        
        // Faz loop em cada registro encontrado
        while ($row = $result->fetch_assoc()) {
            array_push($funcionarios, $row);
        }
        // Deixa o texto legível
        $response=[
            'funcionarios'=>$funcionarios,
        ];
    } else {
        $response=[
            'funcionarios' => 'nenhum registro encontrado!'
        ];
    }
    echo json_encode($response);
?>
<?php

#IMPOSIÇÃO DO ARQUIVO DE CONEXÃO

include('connection.php');

##FUNÇÃO DE LEITURA DE DADOS (SEM CRITÉRIOS) ## 
function read($conn)
{

    $sql = "SELECT * FROM tbl_pessoa";

    if ($resultado = mysqli_query($conn, $sql)) {

        $dados = mysqli_fetch_all($resultado);

        echo json_encode(array("status" => "success", "data" => $dados));
    } else {
        echo json_encode(array("status" => "error", "data" => mysqli_error($conn)));
    }
}

##FUNÇÃO DE LEITURA DE DADOS (COM CRITÉRIOS) ## 
function readID($cod_pessoa, $conn)
{

    $sql = "SELECT * FROM tbl_pessoa WHERE cod_pessoa = $cod_pessoa";

    if ($resultado = mysqli_query($conn, $sql)) {

        $dados = mysqli_fetch_all($resultado);

        echo json_encode(array("status" => "success", "data" => $dados));
    } else {
        echo json_encode(array("status" => "error", "data" => mysqli_error($conn)));
    }
}

##FUNÇÃO DE ATUALIZAÇÃO##

function update($cod_pessoa, $nome, $sobrenome, $email, $celular, $fotografia, $conn)
{

    $sql = "UPDATE tbl_pessoa SET
    nome ='$nome',
    sobrenome = '$sobrenome',
    email = '$email',
    celular = '$celular',
    fotografia ='$fotografia'
    WHERE cod_pessoa = $cod_pessoa";

    if (mysqli_query($conn, $sql)) {
        echo json_encode(array("status" => "success", "data" => "Dados alterados com sucesso"));
    } else {
        echo json_encode(array("status" => "error", "data" => mysqli_error($conn)));
    }
}

##FUNÇÃO DE INSERÇÃO##

function create($nome, $sobrenome, $email, $celular, $fotgrafia, $conn)
{

    $sql = "INSERT INTO tbl_pessoa (nome, sobrenome, email, celular, fotografia) VALUES ('$nome', '$sobrenome','$email','$celular', '$fotgrafia')";

    if (mysqli_query($conn, $sql)) {
        echo json_encode(array("status" => "success", "data" => "Dados inseridos com sucesso"));
    } else {
        echo json_encode(array("status" => "error", "data" => "Erro ao inserir os dados"));
    }
}

##FUNÇÃO DE EXCLUSÃO##

function delete($cod_pessoa, $conn) {

    $sql = "DELETE FROM tbl_pessoa WHERE cod_pessoa = $cod_pessoa";

    if (mysqli_query($conn, $sql)) {
        echo json_encode(array("status" => "success", "data" => "Dados excluídos com sucesso"));
    } else {
        echo json_encode(array("status" => "error", "data" => mysqli_error($conn)));
    }

}

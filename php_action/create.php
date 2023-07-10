<?php
session_start();

require_once 'db_connect.php';
require_once '../includes/clear.php';

if (isset($_POST['btn-cadastrar'])):
    $nome = clear($_POST['nome']);
    $sobrenome = clear($_POST['sobrenome']);
    $email = clear($_POST['email']);
    $idade = clear($_POST['idade']);

    $sql = "INSERT INTO cliente(nome, sobrenome, email, idade) VALUES ('$nome', '$sobrenome', '$email', '$idade');";

    if (mysqli_query($connect, $sql)):
        $_SESSION['mensagem'] = "Cadastrado com sucesso!";
        header('Location: ../index.php');
    else:
        $_SESSION['mensagem'] = "Erro ao cadastrar";
        header('Location: ../index.php');
    endif;

    mysqli_close($connect);
endif;
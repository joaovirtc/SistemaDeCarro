<?php
// carregando dependencias
include_once($_SERVER['DOCUMENT_ROOT'].'/sistemadecarro/src/assets/php/conn.php'); // puxando arquivo de conexao com o banco de dados
session_start(); // carregando sessoes

// definindo variaveis
$id = $_GET['id'];
$hoje = date('Y,m,d');
$raiz = $_SERVER['DOCUMENT_ROOT'];
$pasta = $raiz . "/sistemadecarro/src/assets/img/imagens_veiculos/";
// query's no banco de dados
$foto = mysqli_fetch_array($conn->query("SELECT * FROM `foto` WHERE `foto`.`id_foto` = $id"));


unlink($pasta.$foto["path"]);

$conn->query("DELETE FROM `foto` WHERE `foto`.`id_foto` = $id");

$_SESSION['msgSucess'] = "Imagem excluida";
header("Location: http://localhost/sistemadecarro/src/dashboard/pages/editar-veiculo/?id={$foto['id_carro']}"); //mandando o usuario para pagina de ediçao do veiculo


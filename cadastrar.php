<?php 

require __DIR__ . '/vendor/autoload.php';

define('TITLE', 'Cadastrar Vaga');

use \App\Entity\Vaga;

$obVaga = new Vaga;

//VALIDAÇÃO DO POST
if(isset($_POST['titulo'],$_POST['descricao'], $_POST['ativo'])){
    
    $obVaga->titulo = $_POST['titulo'];
    $obVaga->descricao = $_POST['descricao'];
    $obVaga->ativo = $_POST['ativo'];
    $obVaga->cadastrar();

    header('Location:/index.php?status=success');
    exit;

    // echo "<pre>"; print_r($obVaga); echo "<pre>"; exit;
}

include_once __DIR__ .'/includes/header.php';
include_once __DIR__ .'/includes/formulario.php';
include_once __DIR__ .'/includes/footer.php';

?>
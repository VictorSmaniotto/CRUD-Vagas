<?php 

require __DIR__ . '/vendor/autoload.php';

define('TITLE', 'Editar Vaga');

use \App\Entity\Vaga;

//VALIDAÇÃO DO ID
if(!isset($_GET['id']) or !is_numeric($_GET['id'])){
    header('Location: /index.php?status=error');
    exit;
}

//CONSULTA VAGA
$obVaga = Vaga::getVaga($_GET['id']);

//VALIDAÇÃO DA VAGA
if(!$obVaga instanceof Vaga){
    header('Location: /index.php?status=error');
}

//VALIDAÇÃO DO POST
if(isset($_POST['titulo'],$_POST['descricao'], $_POST['ativo'])){
    $obVaga->titulo = $_POST['titulo'];
    $obVaga->descricao = $_POST['descricao'];
    $obVaga->ativo = $_POST['ativo'];
    $obVaga->atualizar();

    header('Location:/index.php?status=success');
    exit;

    // echo "<pre>"; print_r($obVaga); echo "<pre>"; exit;
}

include_once __DIR__ .'/includes/header.php';
include_once __DIR__ .'/includes/formulario.php';
include_once __DIR__ .'/includes/footer.php';

?>
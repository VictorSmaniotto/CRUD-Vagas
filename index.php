<?php 

require __DIR__ . '/vendor/autoload.php';

use \App\Entity\Vaga;

$vagas = Vaga::getVagas();


include_once __DIR__ .'/includes/header.php';
include_once __DIR__ .'/includes/listagem.php';
include_once __DIR__ .'/includes/footer.php';

?>
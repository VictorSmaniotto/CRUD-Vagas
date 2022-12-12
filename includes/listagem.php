<?php 



?>

<main>

    <section>
        <a href="cadastrar.php">
            <button class="btn btn-success">Nova vaga</button>
        </a>
    </section>

    <section>
        <table class="table bg-light mt-3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Descrição</th>
                    <th>Status</th>
                    <th>Data</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($vagas as $vaga) :?>
                <tr>
                    <th scope="row"><?=$vaga->id?></t>
                    <td><?=$vaga->titulo?></td>
                    <td><?=$vaga->descricao?></td>
                    <td><?=($vaga->ativo == 'S' ? 'Ativo' : 'Inativo') ?></td>
                    <td><?=date('d/m/Y à\s H:i:s', strtotime($vaga->data))?></td>
                    <td>
                        <a href="editar.php?=<?=$vaga->id?>"><button class="btn btn-primary">Editar</button></a>

                        <a href="excluir.php?=<?=$vaga->id?>"><button class="btn btn-danger">Excluir</button></a>
                    </td>
                </tr>
                
                <?php endforeach; ?>
            </tbody>
        </table>
    </section>

</main>
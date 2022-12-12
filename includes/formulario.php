<main>

    <section>
        <a href="index.php">
            <button class="btn btn-success">Voltar</button>
        </a>
    </section>

    <h2 class="mt-3"><?=TITLE?></h2>

    <form method="POST">
        <div class="form-group">
            <label>Título</label>
            <input type="text" class="form-control" name="titulo" value="<?=$obVaga->titulo?>">
        </div>

        <div class="form-group">
            <label for="">Descrição</label>
            <textarea name="descricao" class="form-control"><?=$obVaga->descricao?></textarea>
        </div>

        <div class="form-group">
            <label for="">Status</label>
            <div>
                <div class="form-check form-check-inline">
                    <input type="radio" name="ativo" value="s" checked id="ativo" class="form-check-input"> 
                    <label class="form-check-label" for="ativo">Ativo</label>
                </div>
            </div>
            <div>
                <div class="form-check form-check-inline">
                    <input type="radio" name="ativo" value="n" <?=$obVaga->ativo == 'n' ? 'checked' : ''?> id="inativo" class="form-check-input"> 
                    <label class="form-check-label" for="inativo">Inativo</label>
                </div>
            </div>
        </div>

        <div class="form-group mt-3">
            <button type="submit" class="btn btn-success">Enviar</button>
        </div>
    </form>
</main>
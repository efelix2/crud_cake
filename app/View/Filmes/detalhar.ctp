<style>
    div#content {
        background: #413636 !important;
    }
</style>

<div class="container row">
    <div class="col-4 text-center">
        <?php echo $this->html->image($filmes['Filme']['capa'], array('style' => 'height: 350px; width: 250px;')) ?>
    </div>

    <div class="col-8">
        <div class="card-body text-white">
            <h5 class="card-title"><?php echo $filmes['Filme']['titulo'] ?></h5>
            <p class="card-text"><?php echo $filmes['Filme']['sinopse'] ?></p>
            <?php
            $destino = $origem == 'Filmes' ? 'filmes' : 'cruds'; //DETERMINA PARA QUAL PÁGINA O BOTÃO 'RETORNAR' DIRECIONA
            echo $this->Html->link('Retornar', array('controller' => $destino, 'action' => 'index'), array('class' => 'btn btn-primary d-grid gap-2')); ?>
        </div>
    </div>
</div>
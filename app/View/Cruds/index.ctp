<div class="text-center mb-4">
    <span class="h1 fw-bold">Listagem de filmes</span>
</div>

<p><?php echo $this->Html->link('Registrar filme', array('action' => 'add'), array('class' => 'btn btn-warning')); ?></p>
<table>
    <tr>
        <th>Categoria</th>
        <th>Título</th>
        <th>Ações</th>
    </tr>

    <?php foreach ($filmes as $filme) : ?>
        <tr>
            <td>
                <?php echo $filme['categorias']['nome'] ?>
            </td>
            <td>
                <?php echo $this->Html->link($filme['filmes']['titulo'], array('controller' => 'filmes', 'action' => 'detalhar', $filme['filmes']['id'], 'Cruds')); ?>
            </td>
            <td>
                <?php
                echo $this->Form->postLink( // CRIA LINK CUJOS PARÂMETRO SÃO ENVIADOS VIA MÉTODO POST
                    'Apagar',
                    array('controller' => 'cruds', 'action' => 'delete', $filme['filmes']['id'], $filme['filmes']['titulo']), // ACTION = NOME DA FUNÇÃO NA CONTROLLER
                    array('confirm' => 'Tem certeza?', 'class' => 'btn btn-danger') 
                );
                ?>
                <?php
                echo $this->Html->link(
                    'Editar',
                    array('action' => 'edit', $filme['filmes']['id']), // SEGUNDO VALOR É O PARÂMETRO QUE A FUNÇÃO DA MODEL VAI RECEBER
                    array('class' => 'btn btn-primary')
                );
                ?>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
<div class="text-center ">
    <span class="h1 fw-bold">Cadastrar filme</span>
</div>

<?php
$opcoes = array_combine(array_column(array_column($categorias, 'categorias'), 'id'), array_column(array_column($categorias, 'categorias'), 'nome'));

echo $this->Form->create('Filme', array('type' => 'file'));
echo $this->Form->input('categoria_id', array('type' => 'select', 'options' => $opcoes, 'label' => 'Categoria'));
echo $this->Form->input('titulo',  array('label' => 'Título'));
echo $this->Form->input('sinopse', array('rows' => '4'));
echo $this->Form->input('capa', array(
    'type' => 'file',
    'label' => false
));
echo $this->Form->submit('Salvar', array('class' => 'mx-auto d-block'));
echo $this->Form->end();
?>
<div class="text-center ">
    <span class="h1 fw-bold">Editar registro</span>
</div>

<?php

$opcoes = array_combine(array_column(array_column($categorias, 'categorias'), 'id'), array_column(array_column($categorias, 'categorias'), 'nome'));



echo $this->Form->create('Filme', array('type' => 'file')); // ENVIA P/ MODEL FILME & 2º PARAM SINALIZA ENVIO DE ARQUIVO, SE AUSENTE CONTROLLER SÓ VAI LER O NOME DO ARQUIVO 
echo $this->Form->input('categoria_id', array('type' => 'select', 'options' => $opcoes, 'label' => 'Categoria')); // OPÇÕES SEGUE O MODELO DE ARRAY, ONDE O INDEX É O VALOR E VALOR É A LABEL DO OPTION
echo $this->Form->input('titulo',  array('label' => 'Título'));
echo $this->Form->input('sinopse', array('rows' => '4')); // (1º - NOME DO CAMPO NO BANCO, 2º - ARRAY CONTENDO ATRIBUTOS DO INPUT, INCLUINDO LABEL QUE SERÁ EXIBIDA)
echo $this->Form->input('capa', array(
    'type' => 'file',
    'label' => false
));
echo $this->Form->input('id', array('type' => 'hidden'));
echo $this->Form->submit('Salvar', array('class' => 'mx-auto d-block')); // BOTÃO SUBMIT, FOI FEITO SEPARADO DO END PARA PODER ESTILIZÁ-LO
echo $this->Form->end(); // ENCERRA O FORM, SE UM TEXTO FOR ESCRITO NO END, ELE VIRA UM BOTÃO DE SUBMIT
?>
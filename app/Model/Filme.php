<?php

class Filme extends AppModel
{
    public $validate = array(
        'categoria_id' => array(
            'rule' => 'notBlank'
        ),
        'titulo' => array(
            'rule' => 'notBlank'
        ),
        'sinopse' => array(
            'rule' => 'notBlank'
        ),
        'capa' => array(
            'rule' => array(
                'extension',
                array('gif', 'jpeg', 'png', 'jpg')
            ),
            'allowEmpty' => true,
            'message' => 'Forneça um arquivo em formato de imagem'
        )
    );
}

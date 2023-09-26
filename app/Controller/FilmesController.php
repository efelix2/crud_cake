<?php

/* CONVENÇÃO DE NOMES:
* CONTROLLER: PLURAL COM CAMELCASE + SUFIXO('CONTROLLER')
* MODEL: MESMO NOME DA CONTROLLER EM SINGULAR COM CAMELCASE
* VIEW: NOME DA FUNÇÃO NA CONTROLLER.CTP 
* DIRETÓRIO DE VIEWS PARA CADA CONTROLLER RECEBE O NOME DA CONTROLLER SEM O SUFIXO 'CONTROLLER'
* 
* ** O CAKE POSSUI UM PLUGIN NATIVO QUE FORNECE TODOS OS NOMES NECESSÁRIOS PARA A CRIAÇÃO DO PROJETO -- CHAMA-SE INFLECTOR
* ** VERSÃO ONLINE DISPONÍVEL EM https://inflector.cakephp.org/
*/

class FilmesController extends AppController
{
    public $helpers = array('Html');
    public $name = 'Filmes';

    public function index()
    {
        $this->layout = 'commom';
        $this->set('filmes', $this->Filme->find('all')); //BUSCA TODOS OS REGISTROS DA MODEL FILME
    }

    public function detalhar($id = null, $origem = null)
    {
        $this->Filme->id = $id;  // SETUP DO PARÂMETRO QUE O BANCO BUSCARÁ
        $this->layout = 'commom'; // CARREGAMENTO DE DOCUMENTO HTML5 PADRÃO A TODAS AS TELAS
        $this->set('filmes', $this->Filme->read()); // BUSCA VALORES NA MODEL, 2 PARAMETROS, 1º CAMPOS DA TABELA QUE SERÃO MOSTRADOS, 2º ID A SER BUSCADO SE VAZIO VAI SER $this->Filme->id (ATTR DA MODEL QUE PODE SER ALTERADO, À SUA CONVENIÊNCIA), SE VAZIO BUSCA TODOS OS CAMPOS E USA MODEL::ID (ATTR DA CLASSE DA MODEL)
        $this->set('origem', $origem); // CRIA A VARIÁVEL 'ORIGEM' PARA SER USADA NA VIEW
    }
}

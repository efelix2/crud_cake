<?php

class CrudsController extends AppController
{
    public $helpers = array('Html', 'Form'); // CARREGA HELPERS JÁ PRESENTES NO CAKE QUE AUXILIARÃO EM NOSSO TRABALHO
    public $name = 'Cruds';
    public $uses = array('Filme', 'Categoria'); // ESTABELECE COM QUAIS MODELS ESTA CONTROLE INTERAGE, SE NÃO DECLARADO O CAKE IRÁ SEGUIR A MODEL PADRÃO DA CONTROLLER PELA CONVENÇÃO DE NOMES (SE TENTAR UMA MODEL QUE NÃO É A PADRÃO E NÃO FOI DECLARADA AQUI, O CAKE VAI DAR ERRO)

    public function index()
    {
        $this->layout = 'commom';
        $this->set('filmes', $this->Filme->query('SELECT * FROM filmes, categorias WHERE filmes.categoria_id = categorias.id'));
    }

    public function add()
    {
        $this->layout = 'commom';
        $this->set('categorias', $this->Categoria->query('SELECT * FROM categorias ORDER BY nome'));
        if ($this->request->is('post')) { // VERIFICA SE REQUISIÇÃO É DO TIPO POST

            $filename = null;

            if (
                !empty($this->request->data['Filme']['capa']['tmp_name'])
                && is_uploaded_file($this->request->data['Filme']['capa']['tmp_name'])
            ) {

                $extension = explode('.', $this->request->data['Filme']['capa']['name']);
                $ext = end($extension);

                if (in_array($ext, ['jpg', 'jpeg', 'gif', 'png'])) {
                    $filename = basename($this->request->data['Filme']['capa']['name']);
                    move_uploaded_file( // ARMAZENA ARQUIVO NO SERVIDOR
                        $this->data['Filme']['capa']['tmp_name'],
                        WWW_ROOT . DS . 'media/filmes' . DS . $filename
                    );

                    unset($this->request->data['Filme']['capa']); // NECESSÁRIO PARA A VÁRIAVEL EMBAIXO RECEBER UM VALOR DA CONTROLLER, CASO CONTRÁRIO, SE ELA EXISTIR NÃO VAI ACEITAR O NOVO VALOR
                    $this->request->data['Filme']['capa'] =  '/media/filmes/' . $filename;
                }
            } else {
                $this->request->data['Filme']['capa'] = ' ';
            }

            $this->Filme->create();
            if ($this->Filme->save($this->request->data)) { // GRAVA VALORES DO FORMULÁRIO NO BANCO
                $this->Flash->success(__('Filme registrado com sucesso.')); // MOSTRA MENSAGEM DE RETORNO NA VIEW (INDEPENDENTE DO REDIRECIONAMENTO EM SEGUIDA)
                return $this->redirect(array('action' => 'index'));
            }
            $this->Flash->error(__('Não foi possível registrar o filme.'));
        }
    }

    public function edit($id = null)
    {
        $this->layout = 'commom';
        if (!$id) {
            throw new NotFoundException(__('Invalid post'));
        }

        $this->set('categorias', $this->Categoria->query('SELECT * FROM categorias ORDER BY nome'));

        $post = $this->Filme->findById($id);
        if (!$post) {
            throw new NotFoundException(__('Invalid post'));
        }

        $filename = null;

        if (
            !empty($this->request->data['Filme']['capa']['tmp_name'])
            && is_uploaded_file($this->request->data['Filme']['capa']['tmp_name'])
        ) {

            $extension = explode('.', $this->request->data['Filme']['capa']['name']);
            $ext = end($extension);

            if (in_array($ext, ['jpg', 'jpeg', 'gif', 'png'])) {

                $anexo = $this->Filme->query("SELECT * FROM filmes WHERE id = $id");

                if (file_exists(WWW_ROOT . $anexo[0]['filmes']['capa'])) {
                    unlink(WWW_ROOT . $anexo[0]['filmes']['capa']);
                }

                $filename = basename($this->request->data['Filme']['capa']['name']);
                move_uploaded_file(
                    $this->data['Filme']['capa']['tmp_name'],
                    WWW_ROOT . DS . 'media/filmes' . DS . $filename
                );

                unset($this->request->data['Filme']['capa']);
                $this->request->data['Filme']['capa'] =  '/media/filmes/' . $filename;
            }
        } else {
            unset($this->request->data['Filme']['capa']);
        }

        if ($this->request->is(array('post', 'put'))) {
            $this->Filme->id = $id;
            if ($this->Filme->save($this->request->data)) {
                $this->Flash->success(__('O registro foi alterado com sucesso.'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Flash->error(__('Não foi possível alterar o registro.'));
        }

        if (!$this->request->data) {
            $this->request->data = $post;
        }
    }

    public function delete($id, $titulo)
    {
        $this->layout = 'commom';
        if ($this->request->is('get')) {
            throw new MethodNotAllowedException();
        }

        $anexo = $this->Filme->query("SELECT * FROM filmes WHERE id = $id");

        if (file_exists(WWW_ROOT . $anexo[0]['filmes']['capa'])) {
            unlink(WWW_ROOT . $anexo[0]['filmes']['capa']);
        }

        if ($this->Filme->delete($id)) { // DELETA REGISTRO NA TABELA FILME PELO ID FORNECIDO (CAKE NÃO LIDA BEM COM CHAVES COMPOSTAS)
            $this->Flash->success(
                __('O filme "%s" foi deletado.', h($titulo))
            );
        } else {
            $this->Flash->error(
                __('O filme "%s" não pôde ser deletado.', h($titulo))
            );
        }

        return $this->redirect(array('action' => 'index')); // SAI DA PÁGINA DE FORMULÁRIO E RETORNA PARA PÁGINA DE INDEX
    }
}

<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

use App\models\Viagens;

class ViagensController extends BaseController
{
    protected $model;

    public function __construct()
    {
        $this->model = model(Viagens::class);
    }
    public function index()
    {
        $dados['viagens'] = $this->model->findAll();

        return view('viagens/index', $dados);
    }

    public function novo()
    {
        return view('viagens/form');
    }

    public function salvar($id = null)
    {

        $rules = [
            'local' => 'required',
            'hotel' => 'required',
            'guias' => 'required'
        ];

        if (!$this->validate($rules)):
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        endif;

        $dados = [
            'local' => $this->request->getPost('local'),
            'hotel' => $this->request->getPost('hotel'),
            'guias' => $this->request->getPost('guias')
        ];

        $id ? $this->model->update($id, $dados) : $this->model->insert($dados);

        return redirect()->to('viagens')->with('success', 'Viagem cadastrada com sucesso.');
    }


    public function deletar($id = null)
    {

        if ($id === null || $this->model->find($id) === null):
            return redirect()->to('viagens')->with('errors', 'Registro não encontrado');
        endif;

        $this->model->delete($id);

        return redirect()->to('viagens')->with('success', 'Viagem deletada com sucesso.');
    }

    public function editar($id = null)
    {
        $dados['viagens'] = $this->model->find($id);

        return view('viagens/form', $dados);
    }
}

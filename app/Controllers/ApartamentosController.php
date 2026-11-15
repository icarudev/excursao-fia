<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

use App\models\Apartamentos;
use App\models\Pessoas;
use App\models\Viagens;

class ApartamentosController extends BaseController
{

    protected $apModel;
    protected $pesModel;
    protected $viaModel;

    public function __construct()
    {
        $this->apModel = model(Apartamentos::class);
        $this->pesModel = model(Pessoas::class);
        $this->viaModel = model(Viagens::class);
    }

    public function index()
    {
        $viagemId = $this->request->getGet('viagem_id');

        $dados['apartamentos']      = $this->apModel->getDados($viagemId);
        $dados['pessoas']           = $this->pesModel->findAll();
        $dados['viagens']           = $this->viaModel->findAll();
        $dados['viagemSelecionada'] = $viagemId;

        return view('apartamentos/index', $dados);
    }


    public function novo()
    {
        $dados['apartamentos'] = $this->apModel->getDados();
        $dados['pessoas'] = $this->pesModel->findAll();
        $dados['viagens'] = $this->viaModel->findAll();

        return view('apartamentos/form', $dados);
    }

    public function salvar($id = null)
    {
        $rules = [
            'viagem_id' => 'required',
            'modelos'   => 'required',
            'apelido'   => 'required',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // 1. Salva o Apartamento
        $dadosAp = [
            'viagem_id' => $this->request->getPost('viagem_id'),
            'modelos'   => $this->request->getPost('modelos'),
            'apelido'   => $this->request->getPost('apelido'),
        ];

        if ($id) {
            $this->apModel->update($id, $dadosAp);
            $apartamentoId = $id;
        } else {
            $apartamentoId = $this->apModel->insert($dadosAp); // Pega o ID do apartamento recém-criado
        }

        // 2. Pega os arrays de pessoas enviados pelo formulário
        $nomes = $this->request->getPost('nome');
        $cpfs  = $this->request->getPost('cpf');
        $rgs   = $this->request->getPost('rg');
        $datas = $this->request->getPost('data_nascimento');

        // 3. Percorre e salva cada pessoa que teve o nome preenchido
        if (!empty($nomes)) {
            foreach ($nomes as $index => $nome) {
                // Ignora os campos "(Opcional)" que ficaram em branco
                if (!empty(trim($nome))) {
                    $dadosPes = [
                        'apartamento_id'  => $apartamentoId, // Vincula a pessoa ao apartamento
                        'nome'            => $nome,
                        'cpf'             => $cpfs[$index] ?? null,
                        'rg'              => $rgs[$index] ?? null,
                        'data_nascimento' => !empty($datas[$index]) ? $datas[$index] : null,
                    ];

                    $this->pesModel->insert($dadosPes);
                }
            }
        }

        return redirect()->to('apartamentos')->with('success', ['Apartamento cadastrado com sucesso!']);
    }
}

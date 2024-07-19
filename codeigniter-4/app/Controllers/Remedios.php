<?php

namespace App\Controllers;

use App\Models\RemediosModel;

class Remedios extends BaseController
{
    public function index()
    {
        $model = new RemediosModel();
        $data['remedios'] = $model->findAll();

        return view('remedios/index', $data);
    }

    public function create()
    {
        return view('remedios/create');
    }

    public function store()
    {
        $model = new RemediosModel();

        $data = [
            'nome' => $this->request->getPost('nome'),
            'laboratorio' => $this->request->getPost('laboratorio'),
            'preco' => $this->request->getPost('preco'),
            'quantidade' => $this->request->getPost('quantidade'),
        ];

        $model->save($data);

        return redirect()->to('/remedios');
    }

    public function searchByNome()
    {
        $nome = $this->request->getPost('nome');
    
        $model = new RemediosModel();
        $data['remedio'] = $model->where('nome', $nome)->first();
    
        return view('remedios/search_result', $data);
    }    

    public function findMostExpensive()
    {
        $model = new RemediosModel();
        $data['remedio'] = $model->orderBy('preco', 'DESC')->first();
    
        return view('remedios/most_expensive', $data);
    }    

    public function findMostQuantity()
    {
        $model = new RemediosModel();
        $data['remedio'] = $model->orderBy('quantidade', 'DESC')->first();
    
        return view('remedios/most_quantity', $data);
    }    

    public function edit($id)
    {
        $model = new RemediosModel();
        $data['remedio'] = $model->find($id);

        if (!$data['remedio']) {
            return redirect()->to('/remedios')->with('error', 'Remédio não encontrado.');
        }

        return view('remedios/edit', $data);
    }

    public function update($id)
    {
        $model = new RemediosModel();

        $data = [
            'nome' => $this->request->getPost('nome'),
            'laboratorio' => $this->request->getPost('laboratorio'),
            'preco' => $this->request->getPost('preco'),
            'quantidade' => $this->request->getPost('quantidade'),
        ];

        $model->update($id, $data);

        return redirect()->to('/remedios')->with('success', 'Remédio atualizado com sucesso.');
    }

    public function delete($id)
    {
        $model = new RemediosModel();

        // Verifique se o remédio existe antes de tentar excluí-lo
        $remedio = $model->find($id);
        if (!$remedio) {
            return redirect()->to('/remedios')->with('error', 'Remédio não encontrado.');
        }

        $model->delete($id);

        return redirect()->to('/remedios')->with('success', 'Remédio removido com sucesso.');
    }
}
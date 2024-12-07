<?php

namespace App\Controllers;

use App\Models\ServiceModel;

class ServicesController extends BaseController
{
    protected $serviceModel;

    public function __construct()
    {
        $this->serviceModel = new ServiceModel();
    }

    // Read: Menampilkan daftar services
    public function index()
    {
        $data['services'] = $this->serviceModel->findAll();
        return view('service/index', $data);
    }

    // Create: Form untuk tambah service
    public function create()
    {
        return view('service/create');
    }

    // Store: Menyimpan service baru
    public function store()
    {
        $this->serviceModel->save([
            'name' => $this->request->getPost('name'),
            'description' => $this->request->getPost('description'),
            'price' => $this->request->getPost('price'),
            'duration' => $this->request->getPost('duration'),
        ]);

        return redirect()->to('/services');
    }

    // Edit: Form untuk edit service
    public function edit($id)
    {
        $data['service'] = $this->serviceModel->find($id);
        return view('service/edit', $data);
    }

    // Update: Menyimpan perubahan service
    public function update($id)
    {
        $this->serviceModel->update($id, [
            'name' => $this->request->getPost('name'),
            'description' => $this->request->getPost('description'),
            'price' => $this->request->getPost('price'),
            'duration' => $this->request->getPost('duration'), 
        ]);

        return redirect()->to('/services');
    }

    // Delete: Menghapus service
    public function delete($id)
    {
        $this->serviceModel->delete($id);
        return redirect()->to('/services');
    }
}
<?php

namespace App\Controllers;

use App\Models\CustomersModel;
use CodeIgniter\Controller;

class CustomersController extends Controller
{
    protected $customerModel;

    public function __construct()
    {
        $this->customerModel = new CustomersModel();
    }

    // List all customers
    public function index()
    {
        $data['customers'] = $this->customerModel->findAll();
        return view('customers/index', $data);
    }

    // Show form to create a new customer
    public function create()
    {
        return view('customers/create');
    }

    // Store a new customer
    public function store()
    {
        $this->customerModel->save([
            'id'    => $this->request->getPost('id'),
            'name'    => $this->request->getPost('name'),
            'email'   => $this->request->getPost('email'),
            'phone'   => $this->request->getPost('phone'),
            'address' => $this->request->getPost('address'),
        ]);

        return redirect()->to('customers');
    }

    // Edit customer
    public function edit($id)
    {
        $data['customer'] = $this->customerModel->find($id);
        return view('customers/edit', $data);
    }

    // Update customer
    public function update($id)
    {
        $this->customerModel->update($id, [
            'id'    => $this->request->getPost('id'),
            'name'    => $this->request->getPost('name'),
            'email'   => $this->request->getPost('email'),
            'phone'   => $this->request->getPost('phone'),
            'address' => $this->request->getPost('address'),
        ]);
        

        return redirect()->to('/customers');
    }

    // Delete customer
    public function delete($id)
    {
        $this->customerModel->delete($id);
        return redirect()->to('/customers');
    }
}

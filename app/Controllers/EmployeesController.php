<?php

namespace App\Controllers;

use App\Models\EmployeeModel;
use CodeIgniter\Controller;

class EmployeesController extends BaseController
{
    protected $employeeModel;

    public function __construct()
    {
        $this->employeeModel = new EmployeeModel();
    }

    // Create employee
    public function create()
    {
        return view('Employee/create');
    }

    public function store()
    {
        $this->employeeModel->save([
            'name' => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
            'phone' => $this->request->getPost('phone'),
            'position' => $this->request->getPost('position'),
            'hire_date' => $this->request->getPost('hire_date'),
        ]);

        return redirect()->to('/employees');
    }

    // Read all employees
    public function index()
    {
        $data['employees'] = $this->employeeModel->findAll();
        return view('Employee/index', $data);
    }

    // Read single employee
    public function show($id)
    {
        $data['employee'] = $this->employeeModel->find($id);
        return view('Employee/show', $data);
    }

    // Update employee
    public function edit($id)
    {
        $data['employee'] = $this->employeeModel->find($id);
        return view('Employee/edit', $data);
    }

    public function update($id)
    {
        $this->employeeModel->update($id, [
            'name' => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
            'phone' => $this->request->getPost('phone'),
            'position' => $this->request->getPost('position'),
            'hire_date' => $this->request->getPost('hire_date'),
        ]);

        return redirect()->to('/employees');
    }

    // Delete employee
    public function delete($id)
    {
        $this->employeeModel->delete($id);
        return redirect()->to('/employees');
    }
}
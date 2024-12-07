<?php

namespace App\Controllers;

use App\Models\OrdersModel;
use App\Models\CustomersModel;
use App\Models\ServiceModel;
use App\Models\EmployeeModel;

class OrdersController extends BaseController
{
    protected $orderModel;
    protected $customerModel;
    protected $serviceModel;
    protected $employeeModel;

    public function __construct()
    {
        $this->orderModel = new OrdersModel();
        $this->customerModel = new CustomersModel();
        $this->serviceModel = new ServiceModel();
        $this->employeeModel = new EmployeeModel();
    }

    // Read: Menampilkan semua orders
    public function index()
    {
        $data['orders'] = $this->orderModel->getOrders(); // Mengambil semua order dengan relasi
        $data['getStatusColor'] = [$this, 'getStatusColor']; // Fungsi untuk menentukan warna status
        return view('orders/index', $data);
    }

    public function getStatusColor($status)
    {
        // Menentukan warna berdasarkan status
        $colors = [
            'pending' => 'warning',
            'confirmed' => 'primary',
            'in_progress' => 'info',
            'completed' => 'success',
            'cancelled' => 'danger'
        ];
        return $colors[$status] ?? 'secondary'; // Default 'secondary' jika status tidak ditemukan
    }

    // Create: Menampilkan form create order
    public function create()
    {
        $customerModel = new CustomersModel();
        $serviceModel = new ServiceModel();
        $employeeModel = new EmployeeModel();

        $custom = $employeeModel->findAll();
        // $order =  $this->orderModel->findAll();
        $dataCustome = [];
        $dataCheck = [];
        foreach ($custom as $key1 => $cus) {
            $check = $this->orderModel
            ->groupStart()
            ->where('status', 'pending')
            ->orWhere('status', 'confirmed')
            ->orWhere('status', 'in_progress')
            ->groupEnd()
            ->where('employee_id', $cus['id'])
            ->first();
            if($check == null){
                $dataCustome[] = $cus;
            }
        }
        // dd($dataCustome);

        return view('orders/create', [
            'customers' => $customerModel->findAll(),
            'services' => $serviceModel->findAll(),
            'employees' => $dataCustome,
        ]);
    }

    // Store: Menyimpan data order baru
    public function store()
    {
        $this->orderModel->save([

            'customer_id' => $this->request->getPost('customer_id'),
            'id' => $this->request->getPost('id'),
            'service_id' => $this->request->getPost('service_id'),
            'employee_id' => $this->request->getPost('employee_id'),
            'order_date' => $this->request->getPost('order_date'),
            'start_time' => $this->request->getPost('start_time'),
            'status' => $this->request->getPost('status'),
            'total_price' => $this->request->getPost('total_price'),
        ]);

        return redirect()->to('/orders')->with('message', 'Order berhasil ditambahkan.');
    }

    // Edit: Menampilkan form edit order
    public function edit($id)
    {
        // Ambil data order
        $data['order'] = $this->orderModel->getOrder($id);
        if (!$data['order']) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Order dengan ID $id tidak ditemukan.");
        }

        // Ambil data pelanggan untuk dropdown
        $data['customers'] = $this->customerModel->findAll(); 

        // Ambil data layanan dan pegawai
        $data['services'] = $this->serviceModel->findAll();
        $data['employees'] = $this->employeeModel->findAll(); // Perbaiki nama properti di sini

        // Kirim data ke view
        return view('orders/edit', $data);
    }


    // Update: Menyimpan perubahan data order
    public function update($id)
    {
        $this->orderModel->update($id, [
            'customer_id' => $this->request->getPost('customer_id'),
            'service_id' => $this->request->getPost('service_id'),
            'employee_id' => $this->request->getPost('employee_id'),
            'order_date' => $this->request->getPost('order_date'),
            'start_time' => $this->request->getPost('start_time'),
            'status' => $this->request->getPost('status'),
            'total_price' => $this->request->getPost('total_price'),
        ]);

        return redirect()->to('/orders')->with('message', 'Order berhasil diperbarui.');
    }

    // Delete: Menghapus data order
    public function delete($id)
    {
        $this->orderModel->delete($id);

        return redirect()->to('orders')->with('message', 'Order berhasil dihapus.');
    }


    public function getPrice($orderId)
{
    $order = $this->orderModel->find($orderId);

    if ($order) {
        return $this->response->setJSON([
            'success' => true,
            'price' => $order['price']
        ]);
    }

    return $this->response->setJSON([
        'success' => false,
        'message' => 'Order tidak ditemukan'
    ]);
}

}

<?php

namespace App\Controllers;


use App\Models\PaymentModel;
use App\Models\OrdersModel;
use App\Models\ServiceModel;
use CodeIgniter\Controller;

class PaymentsController extends Controller
{
    protected $paymentModel;
    protected $ordersModel;
    protected $servicesModel;

    public function __construct()
    {
        $this->paymentModel = new PaymentModel();
        $this->ordersModel = new OrdersModel();
        $this->servicesModel = new ServiceModel();
    }

    // Menampilkan semua pembayaran
    public function index()
    {
        // Mengambil semua data payment, termasuk informasi harga dari services
        $payments = $this->paymentModel->getPayments();
        $data['getStatusColor'] = [$this, 'getStatusColor'];
        return view('payments/index', ['payments' => $payments], $data);
    }
    public function getStatusColor($status)
    {
        // Menentukan warna berdasarkan status
        $colors = [
            'pending' => 'warning',
            'completed' => 'success',
            'failed' => 'danger'
        ];
        return $colors[$status] ?? 'secondary'; // Default 'secondary' jika status tidak ditemukan
    }

    // Menampilkan form untuk membuat payment
    public function create()
    {
        {
            // Ambil data orders beserta harga dari tabel services
            $orders = $this->ordersModel
                           ->select('orders.id, orders.service_id, services.name as service_name, services.price as service_price')
                           ->join('services', 'services.id = orders.service_id', 'left')
                           ->findAll();
        
            $data['orders'] = $orders;
        
            return view('payments/create', $data);
        }
        // Ambil data orders dan harga layanan
        // $orders = $this->ordersModel->select('orders.id, services.price')
        //     ->join('services', 'services.id = orders.service_id')
        //     ->findAll();

        // return view('payments/create', ['orders' => $orders]);
    }

    // Menyimpan data pembayaran
    public function store()
{
    // Validasi input
    $validation = $this->validate([
        'order_id'        => 'required|integer',
        'payment_date'    => 'required|valid_date',
        'payment_method'  => 'required',
        'status'          => 'required',
    ]);

    if (!$validation) {
        return redirect()->back()->withInput()->with('validation', \Config\Services::validation());
    }

    // Ambil data order berdasarkan ID
    $order = $this->ordersModel->find($this->request->getPost('order_id'));

    if (!$order) {
        return redirect()->back()->withInput()->with('error', 'Order tidak ditemukan.');
    }

    // Ambil service_id dari order
    $serviceId = $order['service_id'];

    // Ambil harga dari tabel services berdasarkan service_id
    $service = $this->servicesModel->find($serviceId);

    if (!$service) {
        return redirect()->back()->withInput()->with('error', 'Service tidak ditemukan.');
    }

    $price = $service['price']; // Harga diambil dari tabel services

    // Simpan data ke tabel payments
    $this->paymentModel->save([
        'order_id'        => $this->request->getPost('order_id'),
        'service_id'      => $serviceId,
        'price'           => $price, // Simpan harga dari service
        'payment_date'    => $this->request->getPost('payment_date'),
        'payment_method'  => $this->request->getPost('payment_method'),
        'status'          => $this->request->getPost('status'),
    ]);

    return redirect()->to('/payments')->with('success', 'Payment created successfully');
}
    
    
    

    // Menampilkan form untuk mengedit pembayaran
    public function edit($id)
    {
        $data['payment'] = $this->paymentModel->getPaymentById($id);
        $data['orders'] = $this->ordersModel->findAll();

        if (empty($data['payment'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Payment not found');
        }

        return view('payments/edit', $data);
    }

    // Mengupdate data pembayaran
    public function update($id)
    {
        // Validasi input
        $validation = $this->validate([
            'order_id'        => 'required|integer',
            'payment_date'    => 'required|valid_date',
            'payment_method'  => 'required',
            'status'          => 'required',
        ]);

        if (!$validation) {
            return redirect()->back()->withInput()->with('validation', \Config\Services::validation());
        }

        // Update data payment
        $this->paymentModel->update($id, [
            'order_id'        => $this->request->getPost('order_id'),
            'payment_date'    => $this->request->getPost('payment_date'),
            'payment_method'  => $this->request->getPost('payment_method'),
            'status'          => $this->request->getPost('status'),
        ]);

        return redirect()->to('/payments')->with('success', 'Payment updated successfully');
    }

    // Menghapus data pembayaran
    public function delete($id)
    {
        $this->paymentModel->delete($id);
        return redirect()->to('/payments')->with('success', 'Payment deleted successfully');
    }
}

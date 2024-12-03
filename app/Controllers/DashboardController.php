<?php
namespace App\Controllers;

use App\Models\CustomersModel;
use App\Models\EmployeeModel;
use App\Models\OrdersModel;
use App\Models\PaymentModel;
use App\Models\ReviewModel;
use App\Models\ServiceModel;

class DashboardController extends BaseController
{
    public function index()
    {
        // Inisialisasi model
        $customerModel = new CustomersModel();
        $employeeModel = new EmployeeModel();
        $orderModel = new OrdersModel();
        $paymentModel = new PaymentModel();
        
        $serviceModel = new ServiceModel();

        // Menghitung total data dari setiap tabel
        $data['totalCustomers'] = $customerModel->countAllResults();
        $data['totalEmployees'] = $employeeModel->countAllResults();
        $data['ordersToday'] = $orderModel->countAllResults();
        $data['totalPayments'] = $paymentModel->countAllResults();
     
        $data['totalServices'] = $serviceModel->countAllResults();

        // Menampilkan view dengan data yang telah diambil
        return view('admin/Dashboard', $data);
    }
}

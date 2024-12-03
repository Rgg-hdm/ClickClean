<?php
namespace App\Models;

use CodeIgniter\Model;

class OrdersModel extends Model
{
    protected $table = 'orders';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'customer_id',
        'service_id',
        'employee_id',
        'order_date',
        'start_time',
        'status',
        'total_price'
    ];

    // Mengambil semua data orders dengan relasi ke tabel terkait
    public function getOrders()
    {
        return $this->select('orders.*, customers.name as customer_name, services.price as service_price,services.name as services_name, employees.name as employee_name')
                    ->join('customers', 'customers.id = orders.customer_id', 'left')
                    ->join('services', 'services.id = orders.service_id', 'left')
                    ->join('employees', 'employees.id = orders.employee_id', 'left')
                    ->findAll();
    }

    // Mengambil satu data order berdasarkan ID dengan relasi ke tabel terkait
    public function getOrder($id)
    {
        return $this->select('orders.*, customers.name as customer_name, services.price as service_price,services.name as services_name ,employees.name as employee_name')
                    ->join('customers', 'customers.id = orders.customer_id', 'left')
                    ->join('services', 'services.id = orders.service_id', 'left')
                    ->join('employees', 'employees.id = orders.employee_id', 'left')
                    ->find($id);
    }
}

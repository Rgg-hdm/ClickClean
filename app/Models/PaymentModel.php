<?php

namespace App\Models;

use CodeIgniter\Model;

class PaymentModel extends Model
{
    protected $table = 'payments';
    protected $primaryKey = 'id';
    protected $allowedFields = ['order_id','price', 'payment_date', 'payment_method', 'status'];

    /**
     * Mengambil data pembayaran bersama informasi order dan harga layanan
     */
    public function getPayments()
    {
        return $this->select('payments.*, orders.id as order_id, services.price as service_price')
                    ->join('orders', 'orders.id = payments.order_id')
                    ->join('services', 'services.id = orders.service_id')
                    ->findAll();
    }

    // Menambahkan fungsi untuk mengambil data pembayaran berdasarkan ID tertentu
    public function getPaymentById($id)
    {
        return $this->select('payments.*, orders.id as order_id, services.price as service_price')
                    ->join('orders', 'orders.id = payments.order_id')
                    ->join('services', 'services.id = orders.service_id')
                    ->find($id);
    }
}

<?php
namespace App\Models;

use CodeIgniter\Model;

class ReviewModel extends Model
{
    protected $table      = 'reviews';
    protected $primaryKey = 'id';
    protected $allowedFields = ['order_id', 'rating', 'comment'];
}
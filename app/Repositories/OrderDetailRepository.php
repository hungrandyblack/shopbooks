<?php
namespace App\Repositories;

interface OrderDetailRepository extends Repository
{
    public function order_detail_order_id($order_id);
    public function total($order_id);
    public function order_detail($id);
}
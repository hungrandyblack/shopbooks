<?php
namespace App\Services;

interface OrderDetailService
{
    public function getAll();
    public function findById($id);
    public function create($request);
    public function update($request, $id);
    public function destroy($id);
    public function order_detail_order_id($order_id);
    public function total($order_id);
    public function order_detail($id);

}
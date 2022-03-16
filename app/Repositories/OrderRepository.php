<?php
namespace App\Repositories;

interface OrderRepository extends Repository
{
   public function paginate();
}
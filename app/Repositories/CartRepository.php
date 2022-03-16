<?php
namespace App\Repositories;

interface CartRepository extends Repository
{
   public function cartCode($id);
   public function total($id);
   public function delete($id);
}
<?php

namespace App\Services;

interface CartService
{
    public function getAll();
    public function findById($id);
    public function create($request);
    public function update($request, $id);
    public function destroy($id);
    public function cartCode($id);
    public function total($id);
    public function delete($id);
}

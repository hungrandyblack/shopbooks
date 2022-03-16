<?php
namespace App\Repositories;

interface CustomerRepository extends Repository
{
    public function getAll();
    public function findById($id);
    public function create($request);
    public function update($request, $id);
    public function destroy($id);

}
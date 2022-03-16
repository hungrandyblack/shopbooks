<?php
namespace App\Repositories;

interface Repository
{
    public function getAll();
    public function findById($id);
    public function create($data);
    public function update($data,$id);
    public function destroy($id);
}
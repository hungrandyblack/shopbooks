<?php
namespace App\Services;

interface UserService
{
    public function getAll();
    public function findById($id);
    public function create($request);
    public function update($request, $id);
    public function destroy($id);
    public function show($id);
    public function paginate();
}
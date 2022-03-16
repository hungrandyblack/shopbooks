<?php
namespace App\Repositories;

interface UserRepository extends Repository
{
    
    public function getAll();
    public function findById($id);
    public function create($request);
    public function update($request, $id);
    public function destroy($id);
    Public function show($id);
    Public function paginate();
    

}
<?php
namespace App\Repositories;

interface SliderRepository extends Repository
{
    
    public function getAll();
    public function findById($id);
    public function create($request);
    public function update($request, $id);
    public function destroy($id);
    public function paginate();

}
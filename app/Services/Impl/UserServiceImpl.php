<?php 
namespace App\Services\Impl;

use App\Repositories\UserRepository;
use App\Services\UserService;

class UserServiceImpl implements UserService 
{
    protected $userRepository;


    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function getAll()
    {
        $users = $this->userRepository->getAll();

        return $users;
    }

    public function findById($id)
    {
        $user= $this->userRepository->findById($id);

        return $user;
    }

    public function create($request)
    {
        // echo __METHOD__;
        // die();
        $user = $this->userRepository->create($request);


        return $user;
    }

    public function update($request, $id)
    {
        $user = $this->userRepository->update($request, $id);

        return $user;
    }

    public function destroy($id)
    {
        $user = $this->userRepository->destroy($id);
        return $user;
    }
    public function show($id)
    {
        $user = $this->userRepository->show($id);
        return $user;
    }
    public function paginate(){
        $paginate = $this->userRepository->paginate(5);
        return $paginate;
    }


}

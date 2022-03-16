<?php 
namespace App\Repositories\Impl;

use App\Models\User;
use App\Repositories\Eloquent\EloquentRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Hash;

class UserRepositoryImpl extends EloquentRepository  implements UserRepository
{
    public function getModel()
    {
        $model = User::class;
        return $model;
    }
    public function create($request){
      $store = new User();
      $store->name = $request->name;
      $store->email = $request->email;
      $store->password = Hash::make($request->password);
      $store->role = $request->role;
      $store->phone = $request->phone;
      $store->gender = $request->gender;
      $store->address = $request->address;
      $store->birthday = $request->birthday;
      $store->save();
       return $store;
    }
    public function show($id){
        $user = User::find($id);
        return $user;
    }
    public function update($request,$id){
       $user = User::find($id);
       $user->name = $request->name;
       $user->email = $request->email;
       $user->password = Hash::make($request->password);
       $user->role = $request->role;
       $user->phone = $request->phone;
       $user->gender = $request->gender;
       $user->address = $request->address;
       $user->birthday = $request->birthday;
       $user->save();
      return $user;
       
    }
    public function destroy($id){
        $user = User ::find($id)->delete();
        return $user;
    }
    public function paginate(){
        $paginate = User::paginate(5);
        return $paginate;
    }
}
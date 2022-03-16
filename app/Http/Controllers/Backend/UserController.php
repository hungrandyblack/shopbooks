<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\UserService;
use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateCustomerRequest;
use App\Http\Requests\UpdateUserRequest;

// use App\Repositories\UserRepository;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->UserService = $userService;
    }
    public function index()
    {
        
        $users      = $this->UserService->paginate();
        $params     = [
            'users'     => $users,
        ];
        return view('Backend.Admin.Users.index', $params);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Backend.Admin.Users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUserRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        $store = $this->UserService->create($request);
        return redirect()->route('users.index')->with('success', 'Thêm mới thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user    = $this->UserService->show($id);
        $params  = [
            'user'        => $user,
        ];
        return view('Backend.Admin.Users.show', $params);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
    // lấy id 
    $user    = User::find($id);
    $params  = [
        'user'        => $user,
    ];
    return view('Backend.Admin.Users.edit',$params);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUserRequest  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, $id)
    {
        $user = $this->UserService->update($request,$id);
        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = $this->UserService->destroy($id);
        return redirect()->route('users.index')->with('success','Xoá thành công !'); 
    }
}

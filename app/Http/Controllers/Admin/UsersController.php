<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserUpdateRequest;

use App\Http\Requests;
use App\Contracts\Repositories\UserRepository;
use App\User;


class UsersController extends Controller
{

    /**
     * @var UserRepository
     */
    protected $repository;
    protected $role = [1 => 'Admin', 2 => 'User'];

    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = $this->repository->paginate(5);
        return view('admin.users.index', compact('list'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.detail');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  UserCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(UserCreateRequest $request)
    {

        $data = $request->all();
        $data['password'] = bcrypt($request->password);
        $this->repository->create($data);

        return redirect()->route('user.index')->with(['flash_level' => 'success', 'flash_message' => 'User created']);
    }


    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $user,
            ]);
        }

        return view('users.show', compact('user'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $data = $this->repository->find($id);

        return view('admin.users.detail', ['data' => $data, 'role' => $this->role]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  UserUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(UserUpdateRequest $request, $id)
    {
        $data = $request->except('password','password_confirmation', '_token', '_method');
        if ($request->has('password')) {
            $data['password'] = bcrypt($request->password);
        }
        $this->repository->update($data, $id);
        return redirect()->route('user.index')->with(['flash_level' => 'success', 'flash_message' => 'User updated']);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleted = $this->repository->delete($id);

        return response()->json([
            'deleted' => $deleted,
        ]);
    }

    public function listData() {
        return redirect()->route('user.index')->with(['flash_level' => 'success', 'flash_message' => 'User deleted.']);
    }

    public function list_rashedData() {
        return redirect()->route('user.trashed')->with(['flash_level' => 'success', 'flash_message' => 'User permanently deleted.']);
    }

    public function trashed() {
        $list = User::onlyTrashed()->paginate(5);
        return view('admin.users.trashed', compact('list'));
    }

    public function restore($id) {
        $restore = User::withTrashed()->find($id)->restore();
        if($restore) {
            return redirect()->route('user.trashed')->with(['flash_level' => 'success', 'flash_message' => 'User restored.']);
        }
    }

    public function delete($id) {
        $deleted = User::withTrashed()->find($id)->forceDelete();
        return response()->json([
            'deleted' => $deleted,
        ]);
    }
}

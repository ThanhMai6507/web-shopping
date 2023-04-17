<?php

declare(strict_types=1);

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index(Request $request)
    {
        return view('backend.users.index', [
            'users' => $this->userService->getUserRepository()->getAll($request->all()),
        ]);
    }

    public function create()
    {
        return view('backend.users.create');
    }

    public function store(UserRequest $request)
    {
        $newUser = $request->except(['_token']);
        $newUser['password'] = Hash::make($newUser['password']);
        $this->userService->getUserRepository()->save(['id' => ''], $newUser);
        return redirect()->route('users.index')->with('message', 'Created successfully');
    }

    public function edit(int $id)
    {
        return view('backend.users.edit', [
            'user' => $this->userService->getUserRepository()->findById($id),
        ]);
    }

    public function update(UserRequest $request, $id)
    {
        $inputs = $request->except(['_token', '_method']);
        if ($inputs['password']) {
            $inputs['password'] = Hash::make($inputs['password']);
        } else {
            unset($inputs['password']);
        }
        $this->userService->getUserRepository()->save($inputs, ["id" => $id]);
        return redirect()->route('users.index')->with('message', 'Update successfully!');
    }

    public function show(int $id)
    {
        return view('backend.users.show', [
            'user' => $this->userService->getUserRepository()->findById($id),
        ]);
    }

    public function destroy(int $id)
    {
        if (Auth::user()->id == $id) {
            return back()->with('message', "Don't delete yourself");
        }

        $this->userService->getUserRepository()->delete($id);
        return redirect()->route('users.index')->with('message', 'Deleted successfully');
    }
}

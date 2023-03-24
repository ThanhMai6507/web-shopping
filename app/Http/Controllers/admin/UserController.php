<?php

declare(strict_types=1);

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function index(Request $request)
    {
        return view('backend.users.index', [
            'users' => $this->userRepository->getAll($request->all()),
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
        $this->userRepository->save(['id' => ''], $newUser);
        return redirect()->route('users.index')->with('message', 'Created successfully');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Teacher;
use PharIo\Manifest\Url;
use Illuminate\Support\Str;
use illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Http\Resources\AuthResourse;
use App\Repositories\User\UserRepository;
use Illuminate\Support\Facades\Validator;
use Illuminate\Contracts\Auth\UserProvider;
use App\Http\Controllers\API\BaseApiController;
use App\Models\PasswordReset;



class AuthController extends BaseApiController
{
    public function __construct(private UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function index()
    {
        $data = $this->formatMany($this->userRepository->all(), 'App\Http\Resources\AuthResource');
        return response()->json($data);
    }

    public function userRegister(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'cpassword' => 'required|same:password',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif',
        ]);

        $data['role'] = 'user';
        $data['password'] = Hash::make($data['password']);

        $user = $this->userRepository->create($data);

        $data = AuthResourse::transformer($user);

        return response()->json(['user_id' => $user->id], 201);
    }



  


}
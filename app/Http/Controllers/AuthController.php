<?php

namespace App\Http\Controllers;

use App\Helpers\ResponseHelper;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{
    //
    public function register(Request $request)
    {
        $validated = $this->validate($request, [
            "name" => 'required|max:255',
            "email" => 'required|email|max:255|unique:users,email',
            'password' => 'required',
            'user_type' => 'required|integer|in:0,1',
        ]);


        $user = new User();
        $user->name = $validated['name'];
        $user->email = $validated['email'];
        $user->user_type = $validated['user_type'];
        $user->password = Hash::make($validated['password']);

        $user->save();

        return ResponseHelper::baseResponse("Account Success Created", 200, $user, null);
    }
}

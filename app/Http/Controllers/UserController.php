<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;
use App\Http\Resources\User as UserResorce;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::paginate(1);
        return UserResorce::collection($user);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param string $email
     * @param string $password
     * @return \Illuminate\Http\Response
     */
    public function create($email, $password)
    {
        return User::create([
            'name' => $email,
            'email' => $email,
            'password' => Hash::make($password),
            'api_token' => Str::random(60),
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param string $email
     * @param string $password
     * @return \Illuminate\Http\Response
     */
    public function show($email, $password)
    {
        $user = User::findOrFail($email, $password);
        return new UserResorce($user);
    }
}

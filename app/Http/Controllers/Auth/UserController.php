<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function services()
    {
        $services = auth()->user()->services;

        return view('user.services', compact('services'));
    }

    /**
     * Display a listing of the resource.
     */
    public function getUser()
    {
        $user = User::findOrFail(1);

        return $user->toJson();
    }

    /**
     * Show the form for creating a new resource.
     */
}
<?php

namespace App\Http\Controllers;

use App\Models\Language;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    public function services()
    {
        $services = auth()->user()->services;

        return view('user.services', compact('services'));
    }

    public function languages()
    {
        $languages = auth()->user()->languages;

        return view('user.languages', compact('languages'));
    }

    public function addLanguage()
    {
        $languages = Language::all();
        $levels = Language::LEVELS;

        return view('user.add-language', compact('languages', 'levels'));
    }

    public function storeLanguage(Request $request): RedirectResponse
    {
        $request->validate([
            'language' => 'required|exists:languages,id',
            'level' => 'required|in:' . implode(',', Language::LEVELS),
        ]);

        auth()->user()->languages()->attach($request->language, ['level' => $request->level]);

        return Redirect::route('user.languages');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
    }
}

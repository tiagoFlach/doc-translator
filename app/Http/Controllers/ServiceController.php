<?php

namespace App\Http\Controllers;

use App\Http\Requests\ServiceCreateRequest;
use App\Models\Category;
use App\Models\Language;
use App\Models\Service;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ServiceController extends Controller
{
    public function userServices()
    {
        $services = auth()->user()->services;

        return view('services.index', compact('services'));
    }

    public function search()
    {
        $languages = Auth::user()->languages;

        dd($languages);

        // $services = Service::where('title', 'like', '%'.$request->input('search').'%')->get();

        // return view('services.index', compact('services'));
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
    public function create(): View
    {
        $languages = Language::all();
        $categories = Category::all();

        return view('service.create', compact('languages', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ServiceCreateRequest $request): RedirectResponse
    {

        dd($request->all());

        $service = new Service();
        $service->title = $request->input('title');
        $service->description = $request->input('description');
        $service->price = $request->input('price');
        $service->file = $request->input('file');
        $service->category_id = $request->input('category');
        $service->initial_language_id = $request->input('initial_language');
        $service->final_language_id = $request->input('final_language');
        $service->user_id = auth()->user()->id;
        $service->save();

        return Redirect::route('service.show', $service->id)->with('status', 'service-created');
    }

    /**
     * Display the specified resource.
     */
    public function show(Service $service): View
    {
        return view('service.show', compact('service'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $service)
    {
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Service $service)
    {
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\ServiceCreateRequest;
use App\Http\Requests\ServiceSearchRequest;
use App\Models\Category;
use App\Models\Language;
use App\Models\Service;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Illuminate\View\View;

class ServiceController extends Controller
{
    public function search(?ServiceSearchRequest $request): View
    {
        $languages = Auth::user()->languages;
        $categories = Category::all();

        $services = Service::with('category', 'sourceLanguage', 'targetLanguage', 'user')
            ->whereNull('translator_id');

        // Source Language
        if ($request->has('source_language')) {
            $services = $services->where('source_language_id', $request->input('source_language'));
        }

        // Target Language
        if ($request->has('target_language')) {
            $services = $services->where('target_language_id', $request->input('target_language'));
        }

        // Categoria
        if ($request->has('category')) {
            $services = $services->where('category_id', $request->input('category'));
        }

        $services = $services->paginate(10);

        return view('service.index', compact('services', 'languages', 'categories'));
    }

    public function checkout(Service $service): View
    {
        return view('service.checkout', compact('service'));
    }

    public function pay(Service $service)
    {
        return view('service.pay', compact('service'));
    }

    public function confirmPay(Service $service)
    {
        $service->is_paid = true;
        $service->save();

        if (auth()->check() && ($service->isAuthor() || $service->isTranslator())) {
            return Redirect::route('service.show', $service);
        }
        return view('thankyou');
    }

    public function startTranslate(Service $service): RedirectResponse
    {
        $service->translator_id = auth()->user()->id;
        $service->save();

        return Redirect::route('service.show', $service);
    }

    public function addTranslation(Service $service, Request $request): RedirectResponse
    {
        $filePath = null;
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filePath = $file->storeAs(
                'uploads',
                $service->user_id . '_' . Str::camel($service->title) . '_' . time()  . '_translation' . '.' . $file->getClientOriginalExtension(),
                'public'
            );
        }

        $service->is_completed = true;
        $service->target_file = $filePath;
        $service->save();

        return Redirect::route('service.show', $service);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = auth()->user()->services;

        return view('services.index', compact('services'));
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
        $filePath = null;
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filePath = $file->storeAs(
                'uploads',
                $request->user()->id . '_' . Str::camel($request->input('title')) . '_' . time() . '.' . $file->getClientOriginalExtension(),
                'public'
            );
        }

        $service = new Service();
        $service->title = $request->input('title');
        $service->description = $request->input('description');
        $service->price = $request->input('price');
        $service->source_file = $filePath;
        $service->category_id = $request->input('category');
        $service->source_language_id = $request->input('source_language');
        $service->target_language_id = $request->input('target_language');
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
        $languages = Language::all();
        $categories = Category::all();

        return view('service.edit', compact('service', 'languages', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Service $service)
    {
        $service->title = $request->input('title');
        $service->description = $request->input('description');
        $service->price = $request->input('price');
        $service->source_file = $request->input('file');
        $service->category_id = $request->input('category');
        $service->source_language_id = $request->input('source_language');
        $service->target_language_id = $request->input('target_language');
        $service->save();

        return Redirect::route('service.show', $service->id)->with('status', 'service-updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service): RedirectResponse
    {
        $service->delete();

        // return Redirect::route('services.index');
        return Redirect::route('user.services');
    }
}

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ver Serviço') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <header class="mb-4 lg:mb-6 not-format">
                        <h1 class="mb-1 text-3xl font-extrabold leading-tight text-gray-900 lg:mb-6 lg:text-4xl dark:text-white">
                            {{ $service->title }}
                        </h1>
                        <x-language-badge :service="$service" class="bg-indigo-100" />
                        <x-category-badge :service="$service" class="bg-slate-100" />
                    </header>

                    <p class="mb-4 whitespace-pre-line">{{ $service->description }}</p>

                    <p>
                        {{ $service->user->name }},
                        {{ $service->created_at->format('d/m/Y') }}
                    </p>

                    <div class="flex border-t-[1px] pt-4 mt-6 justify-between">
                        <span class="title-font font-medium text-2xl text-gray-900">
                            $ {{ $service->price }}
                        </span>

                        @if (Auth::user()->isTranslator() && Auth::user()->hasServiceLanguages($service))
                        <a href="{{ route('service.checkout', $service->id) }}">
                            <x-primary-button class="ml-4">
                                {{ __('Iniciar Tradução') }}
                            </x-primary-button>
                        </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
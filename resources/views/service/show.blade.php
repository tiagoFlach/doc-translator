<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between h-[42px]">
            <div class="my-auto">
                <h2 class="font-semibold text-gray-800 text-2xl leading-8">
                    {{ __('Ver Serviço') }}
                </h2>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <header class="mb-4 lg:mb-6 not-format">
                        <h1 class="mb-1 text-3xl font-extrabold leading-tight text-gray-900 lg:text-4xl dark:text-white">
                            {{ $service->title }}
                        </h1>
                        <x-language-badge :service="$service" class="bg-indigo-100" />
                        <x-category-badge :service="$service" class="bg-slate-100" />
                    </header>

                    <p class="mb-4 whitespace-pre-line">{{ $service->description }}</p>

                    <p>
                        <a href="mailto:{{ $service->user->email }}">{{ $service->user->name }},</a>
                        {{ $service->created_at->format('d/m/Y') }}
                    </p>

                    @if ($service->isAuthor() && ! $service->isPaid() && $service->hasSourceFile())
                    <div class="mt-10 flex flex-row space-x-2">
                        <a href="{{ url("storage/{$service->source_file}") }}">
                            <x-primary-button>
                                {{ __('Ver Arquivo') }}
                            </x-primary-button>
                        </a>
                        <a href="{{ url("storage/{$service->source_file}") }}" download="{{ str_replace('uploads/', '', $service->source_file) }}">
                            <x-primary-button>
                                {{ __('Download Arquivo') }}
                            </x-primary-button>
                        </a>
                    </div>
                    @endif

                    <div class="flex border-t-[1px] pt-4 mt-6 justify-between">
                        <span class="title-font font-medium text-2xl text-gray-900">
                            $ {{ $service->price }}
                        </span>

                        @if (! $service->hasTranslator() && Auth::user()->isTranslator() && Auth::user()->hasServiceLanguages($service))
                        <a href="{{ route('service.startTranslate', $service->id) }}">
                            <x-primary-button class="ml-4">
                                {{ __('Iniciar Tradução') }}
                            </x-primary-button>
                        </a>
                        @endif
                    </div>
                </div>
            </div>
            @if ($service->hasTranslator() && ($service->isAuthor() || $service->isTranslator()))
            <div class="flex space-x-4">
                <div class="w-1/2 h-full p-4 sm:p-8 shadow sm:rounded-lg space-y-6
                    {{ $service->isAuthor() && ! $service->isPaid() ? 'bg-white' : 'bg-gray-300' }}">
                    @if ($service->isAuthor())
                        @if ($service->isPaid())
                            @include ('service.partials.payed')
                        @else
                            @include('service.partials.payment')
                        @endif
                    @else
                        @if ($service->isPaid())
                            @include ('service.partials.payed')
                        @else
                            <div class="text-center text-slate-600 uppercase">
                                aguardando pagamento
                            </div>
                        @endif
                    @endif
                </div>
                @if ($service->isPaid())
                <div class="w-1/2 h-full p-4 sm:p-8 shadow sm:rounded-lg space-y-6
                    {{ $service->isTranslator() && ! $service->isCompleted() ? 'bg-white' : 'bg-gray-300' }}">
                    @if ($service->isAuthor())
                        @if ($service->isCompleted())
                            @include ('service.partials.translated')
                        @else
                            <div class="text-center text-slate-600 uppercase">
                                aguardando tradução
                            </div>
                        @endif
                    @else
                        @if ($service->isCompleted())
                            @include ('service.partials.translated')
                        @else
                            @include ('service.partials.translate-service-form')
                        @endif
                    @endif
                </div>
                @endif
            </div>
            @if ($service->isCompleted())
            <div class="text-center text-slate-600 uppercase p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                O tradutor receberá o pagamento em até 24 horas.
            </div>
            @endif
            @endif
        </div>
    </div>
</x-app-layout>
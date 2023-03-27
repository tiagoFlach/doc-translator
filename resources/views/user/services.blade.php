<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between h-8.5">
            <div>
                <h2 class="font-semibold text-gray-800 text-xl leading-8">
                    {{ __('Meus Serviços') }}
                </h2>
            </div>

            @if (Auth::user()->isClient())
            <div>
                <x-header-button :href="route('service.create')">
                    {{ __('Criar Serviço') }}
                </x-header-button>
            </div>
            @endif
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                @foreach ($services as $service)
                <div class="p-6 text-gray-900">
                    <div class="flex justify-between">
                        <div>
                            <b>{{ $service->id }}</b>&nbsp;
                            {{ $service->title }}

                            <x-status-badge :service="$service" class="bg-indigo-100" />
                        </div>
                        <div>
                            <a href="{{ route('service.show', $service->id) }}">
                                <x-primary-button>
                                    {{ __('Ver') }}
                                </x-primary-button>
                            </a>

                            @if ($service->isAuthor())
                            <a href="{{ route('service.edit', $service->id) }}">
                                <x-primary-button>
                                    {{ __('Editar') }}
                                </x-primary-button>
                            </a>
                            <a href="{{ route('service.destroy', $service->id) }}">
                                <x-primary-button>
                                    {{ __('Excluir') }}
                                </x-primary-button>
                            </a>
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
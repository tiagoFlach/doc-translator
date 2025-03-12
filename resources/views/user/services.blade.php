<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between h-[42px]">
            <div class="my-auto">
                <h2 class="font-semibold text-gray-800 text-2xl leading-8">
                    {{ __('Meus Serviços') }}
                </h2>
            </div>

            @if (Auth::user()->isClient())
                <div class="my-auto">
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
                        <div class="flex flex-row justify-between">
                            <div>
                                <div class="text-lg mb-1 font-bold">
                                    {{ $service->title }}
                                </div>
                                <x-language-badge :service="$service" class="bg-indigo-100" />
                                <x-status-badge :service="$service" class="bg-indigo-100" />
                            </div>
                            <div class="flex flex-row my-auto space-x-1">
                                <a href="{{ route('service.show', $service->id) }}">
                                    <x-primary-button>
                                        {{ __('Ver') }}
                                    </x-primary-button>
                                </a>

                                @if ($service->isAuthor())
                                    <a href="{{ route('service.edit', $service->id) }}">
                                        <x-edit-button></x-edit-button>
                                    </a>
                                    <form method="post" action="{{ route('service.destroy', $service->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <x-delete-button></x-delete-button>
                                    </form>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>

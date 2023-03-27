<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row justify-between h-8.5">
            <div>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Serviços') }}
                </h2>
            </div>
            <form method="get" action="{{ route('service.search') }}">
                <div class="flex flex-row space-x-2">

                    <div>
                        <!-- Source Language -->
                        <x-select-input id="source_language" name="source_language" class="block w-full">
                            <option value="" selected disabled hidden>{{ __('idioma Inicial') }}</option>
                            @foreach ($languages as $language)
                            <option value="{{ $language->id }}">{{ $language->name }}</option>
                            @endforeach
                        </x-select-input>
                    </div>

                    <div>
                        <!-- Target Language -->
                        <x-select-input id="target_language" name="target_language" class="block w-full">
                            <option value="" selected disabled hidden>{{ __('idioma Final') }}</option>
                            @foreach ($languages as $language)
                            <option value="{{ $language->id }}">{{ $language->name }}</option>
                            @endforeach
                        </x-select-input>
                    </div>

                    <div>
                        <!-- Category -->
                        <x-select-input id="category" name="category" class="block w-full">
                            <option value="" selected disabled hidden>{{ __('Categoria') }}</option>
                            @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </x-select-input>
                    </div>

                    <button type="submit" class="rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" stroke-width="1.5" class="w-6 h-6">
                            <path d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6 0-33.9zM208 336c-70.7 0-128-57.2-128-128s57.2-128 128-128 128 57.2 128 128-57.2 128-128 128z" />
                        </svg>
                    </button>
                </div>
            </form>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-10">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                @foreach ($services as $service)
                    @include ('service.partials.card-service')
                @endforeach
            </div>
            <div class="row">
                <div class="col-md-12">
                    {{ $services->onEachSide(1)->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col md:flex-row justify-between min-h-[42px] gap-y-4">
            <div class="my-auto">
                <h2 class="font-semibold text-gray-800 text-2xl leading-8">
                    {{ __('Serviços') }}
                </h2>
            </div>
            <form method="get" id="search-form" action="{{ route('service.search') }}">
                <div class="flex flex-row space-x-2">

                    <button type="reset" class="rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99" />
                        </svg>
                    </button>

                    <div>
                        <!-- Source Language -->
                        <x-select-input id="source_language" name="source_language" class="block w-full">
                            <option value="" selected disabled hidden>{{ __('Idioma Inicial') }}</option>
                            @foreach ($languages as $language)
                            <option value="{{ $language->id }}" {{ request()->input('source_language') == $language->id ? 'selected' : null }}>{{ $language->name }}</option>
                            @endforeach
                        </x-select-input>
                    </div>

                    <div>
                        <!-- Target Language -->
                        <x-select-input id="target_language" name="target_language" class="block w-full">
                            <option value="" selected disabled hidden>{{ __('Idioma Final') }}</option>
                            @foreach ($languages as $language)
                            <option value="{{ $language->id }}" {{ request()->input('target_language') == $language->id ? 'selected' : null }}>{{ $language->name }}</option>
                            @endforeach
                        </x-select-input>
                    </div>

                    <div>
                        <!-- Category -->
                        <x-select-input id="category" name="category" class="block w-full">
                            <option value="" selected disabled hidden>{{ __('Categoria') }}</option>
                            @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ request()->input('category') == $category->id ? 'selected' : null }}>{{ $category->name }}</option>
                            @endforeach
                        </x-select-input>
                    </div>

                    <button type="submit" class="rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
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
                    {{ $services->onEachSide(1)->appends(request()->input())->links() }}
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        
        const form = document.getElementById('search-form');
        const selects = form.querySelectorAll('select');

        form.addEventListener('reset', (event) => {
            event.preventDefault();
            form.reset();
            selects.forEach((select) => {
                select.selectedIndex = 0;
            });
        });
    </script>
    @endpush
</x-app-layout>

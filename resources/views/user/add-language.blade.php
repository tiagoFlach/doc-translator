<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Adicionar Idioma') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <header>
                        <h2 class="text-lg font-medium text-gray-900">
                            {{ __('Adicionar Idioma') }}
                        </h2>

                        <p class="mt-1 text-sm text-gray-600">
                            {{ __("Adicione um idioma e o seu nível de conhecimento") }}
                        </p>
                    </header>

                    <form method="post" action="{{ route('user.storeLanguage') }}" class="mt-6 space-y-6">
                        @csrf
                        @method('post')

                        <div>
                            <!-- Idioma -->
                            <x-input-label for="language" :value="__('Idioma')" />
                            <x-select-input id="language" name="language" class="mt-1 block w-full" required>
                                <option value="" selected disabled hidden>{{ __('Selecione um idioma') }}</option>
                                @foreach ($languages as $language)
                                <option value="{{ $language->id }}">{{ $language->name }}</option>
                                @endforeach
                            </x-select-input>
                            <x-input-error class="mt-2" :messages="$errors->get('language')" />
                        </div>

                        <div>
                            <!-- Nível -->
                            <x-input-label for="level" :value="__('Nível')" />
                            <x-select-input id="level" name="level" class="mt-1 block w-full" required>
                                <option value="" selected disabled hidden>{{ __('Selecione um nível') }}</option>
                                @foreach ($levels as $level)
                                <option value="{{ $level }}">{{ $level }}</option>
                                @endforeach
                            </x-select-input>
                            <x-input-error class="mt-2" :messages="$errors->get('level')" />
                        </div>

                        <div class="flex items-center gap-4">
                            <x-primary-button>
                                {{ __('Adicionar') }}
                            </x-primary-button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
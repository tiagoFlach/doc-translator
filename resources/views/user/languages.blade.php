<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between h-8.5">
            <div>
                <h2 class="font-semibold text-gray-800 text-xl leading-8">
                    {{ __('Meus Idiomas') }}
                </h2>
            </div>

            <div>
                <x-header-button :href="route('user.addLanguage')">
                    {{ __('Adicionar Idioma') }}
                </x-header-button>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                @forelse ($languages as $language)
                <div class="p-6 text-gray-900">
                    <div class="flex justify-between">
                        <div>
                            {{ $language->name }}
                        </div>
                    </div>
                </div>
                @empty
                <div class="p-6 text-gray-900">
                    <div class="flex justify-between">
                        <div>
                            Você ainda não adicionou nenhum idioma.
                        </div>
                    </div>
                </div>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>
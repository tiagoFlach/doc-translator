<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between h-[42px]">
            <div class="my-auto">
                <h2 class="font-semibold text-gray-800 text-2xl leading-8">
                    {{ __('Criar Serviço') }}
                </h2>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('service.partials.create-service-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
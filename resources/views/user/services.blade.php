<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Meus Serviços') }}
        </h2>
    </x-slot>

    <div class="py-12">
		<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
			<div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
				@foreach ($services as $service)
				<div class="p-6 text-gray-900">
					<b>{{ $service->id }}</b>&nbsp;
					{{ $service->name }}
                </div>
				@endforeach
            </div>
        </div>
    </div>
</x-app-layout>
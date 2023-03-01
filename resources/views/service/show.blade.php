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
                    
					<!-- <header class="mb-4 lg:mb-6 not-format"> -->
						<h1 class="mb-4 text-3xl font-extrabold leading-tight text-gray-900 lg:mb-6 lg:text-4xl dark:text-white">
							{{ $service->title }}
						</h1>
					<!-- </header> -->
          
					<p class="lead">
						{{ $service->description }}
					</p>

					<p>
						Criado em {{ $service->created_at->format('d/m/Y') }}
					</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
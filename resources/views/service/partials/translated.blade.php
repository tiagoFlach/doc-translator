<div class="p-8 w-full text-center rounded bg-gray-300">
    <header class="not-format">
        <h1 class="text-2xl font-black">Traduzido!</h1>
    </header>
</div>
<div class="flex flex-row px-0 justify-center space-x-4">
    <a href="{{ url("storage/{$service->target_file}") }}">
        <x-primary-button>
            {{ __('Ver Arquivo') }}
        </x-primary-button>
    </a>
    <a href="{{ url("storage/{$service->target_file}") }}" download="{{ str_replace('uploads/', '', $service->target_file) }}">
        <x-primary-button>
            {{ __('Download Arquivo') }}
        </x-primary-button>
    </a>
</div>
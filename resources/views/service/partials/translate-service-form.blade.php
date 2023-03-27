<header>
    <h2 class="text-lg font-medium text-gray-900">
        {{ __('Tradução do serviço') }}
    </h2>

    <p class="mt-1 text-sm text-gray-600">
        {{ __("Forneça o arquio traduzido para que o serviço possa ser concluído.") }}
    </p>
</header>
<form method="post" action="{{ route('service.addTranslation', $service) }}" class="mt-6 space-y-6">
    @csrf
    @method('post')
    <div>
        <!-- File -->
        <x-input-label for="file" :value="__('Arquivo')" />
        <x-file-input id="file" name="file" :value="old('file')" class="mt-1 block w-full" required />
        <x-input-error class="mt-2" :messages="$errors->get('file')" />
    </div>
    
    <x-primary-button>{{ __('Finalizar Serviço') }}</x-primary-button>
</form>
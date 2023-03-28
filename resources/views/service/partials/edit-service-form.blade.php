<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Informações do serviço') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Forneça as informações do serviço que você deseja cadastrar.") }}
        </p>
    </header>

	<form method="post" action="{{ route('service.update', $service) }}" class="mt-6 space-y-6" enctype="multipart/form-data">
        @csrf
        @method('patch')

        <div>
			<!-- Título -->
            <x-input-label for="title" :value="__('Título')" />
            <x-text-input id="title" name="title" type="text" :value="old('title', $service->title)" class="mt-1 block w-full" required autocomplete="title" autofocus />
            <x-input-error class="mt-2" :messages="$errors->get('title')" />
        </div>

		<div>
			<!-- Descrição -->
			<x-input-label for="description" :value="__('Descrição')" />
			<x-textarea-input id="description" name="description"  class="mt-1 block w-full" autocomplete="description" required>
				{{ old('description', $service->description) }}
			</x-textarea-input>
			<x-input-error class="mt-2" :messages="$errors->get('description')" />
		</div>

		<div>
			<!-- Preço -->
			<x-input-label for="price" :value="__('Preço')" />
			<x-text-input type="number" id="price" name="price" :value="old('price', $service->price)" class="mt-1 block w-full" required />
			<x-input-error class="mt-2" :messages="$errors->get('price')" />
		</div>

		<div>
			<!-- Categoria -->
			<x-input-label for="category" :value="__('Categoria')" />
			<x-select-input id="category" name="category" class="mt-1 block w-full" required>
				<option value="" selected disabled hidden>{{ __('Selecione uma categoria') }}</option>
				@foreach ($categories as $category)
					<option value="{{ $category->id }}" {{ old('category', $service->category_id) == $category->id ? 'selected' : null }}>{{ $category->name }}</option>
				@endforeach
			</x-select-input>
			<x-input-error class="mt-2" :messages="$errors->get('category')" />
		</div>

		<div>
			<!-- File -->
			<x-input-label for="file" :value="__('Arquivo')" />
			<x-file-input id="file" name="file" :value="old('file', $service->source_file)" class="mt-1 block w-full" required />
			<x-input-error class="mt-2" :messages="$errors->get('file')" />
		</div>

		<div class="flex flex-row gap-4">
			<div class="basis-1/2">
				<!-- Idioma Inicial -->
				<x-input-label for="source_language" :value="__('Idioma Inicial')" />
				<x-select-input id="source_language" name="source_language" class="mt-1 block w-full" required>
					<option value="" selected disabled hidden>{{ __('Selecione um idioma') }}</option>
					@foreach ($languages as $language)
						<option value="{{ $language->id }}" {{ old('source_language', $service->source_language_id) == $language->id ? 'selected' : null }}>{{ $language->name }}</option>
					@endforeach
				</x-select-input>
				<x-input-error class="mt-2" :messages="$errors->get('source_language')" />
			</div>
			<div class="basis-1/2">
				<!-- Idioma Final -->
				<x-input-label for="target_language" :value="__('Idioma Final')" />
				<x-select-input id="target_language" name="target_language" class="mt-1 block w-full" required>
					<option value="" selected disabled hidden>{{ __('Selecione um idioma') }}</option>
					@foreach ($languages as $language)
						<option value="{{ $language->id }}" {{ old('target_language', $service->target_language_id) == $language->id ? 'selected' : null }}>{{ $language->name }}</option>
					@endforeach
				</x-select-input>
				<x-input-error class="mt-2" :messages="$errors->get('target_language')" />
			</div>
		</div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Atualizar') }}</x-primary-button>
        </div>
    </form>
</section>

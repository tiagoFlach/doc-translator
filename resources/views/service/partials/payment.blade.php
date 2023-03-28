<div class="flex flex-col space-y-10">
    <div class="p-8 w-full rounded bg-gray-200">
        <header class="mb-8 lg:mb-6 not-format">
            <h1 class="text-3xl font-black">Resumo do Serviço</h1>
        </header>

        <!-- Item -->
        <div class="flex py-1 justify-between">
            <p>
                {{ $service->translator->name }}
                <small>
                    (tradutor)
                </small>
            </p>
            <p class="font-bold">
                $ {{ $service->price }}
            </p>
        </div>

        <!-- Taxas -->
        <div class="flex py-1 justify-between">
            <p>
                Taxas
            </p>
            <p class="font-bold">
                $ 0
            </p>
        </div>

        <!-- Total -->
        <div class="flex mt-6 py-1 text-lg font-black justify-between">
            <p>
                Total
            </p>
            <p class="font-bold">
                $ {{ $service->price }}
            </p>
        </div>
    </div>

    <div class="w-full">
        <header class="mb-4 lg:mb-6 not-format">
            <h1 class="mb-1 text-3xl font-extrabold leading-tight text-gray-900 lg:mb-6 lg:text-4xl dark:text-white">
                Forma de pagamento
            </h1>
        </header>

        <div class="mb-4 border-b border-gray-200 dark:border-gray-700">
            <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="myTab" data-tabs-toggle="#myTabContent" role="tablist">
                <li class="mr-2" role="presentation">
                    <button class="inline-block p-4 border-b-2 rounded-t-lg" id="credit-card-tab" data-tabs-target="#credit-card" type="button" role="tab" aria-controls="credit-card" aria-selected="false">
                        Cartão de Crédito
                    </button>
                </li>
                <li class="mr-2" role="presentation">
                    <button class="inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="pix-tab" data-tabs-target="#pix" type="button" role="tab" aria-controls="pix" aria-selected="false">
                        PIX
                    </button>
                </li>
            </ul>
        </div>
        <div id="tabs">
            <div class="hidden space-y-6" id="credit-card" role="tabpanel" aria-labelledby="credit-card-tab">
                <!-- <p class="text-sm text-gray-500 dark:text-gray-400">This is some placeholder content the <strong class="font-medium text-gray-800 dark:text-white">Profile tab's associated content</strong>. Clicking another tab will toggle the visibility of this one for the next. The tab JavaScript swaps classes to control the content visibility and styling.</p> -->
                <div>
                    <x-input-label for="card-number" :value="__('Número do cartão')" />
                    <x-text-input type="number" id="card-number" class="block mt-1 w-full" type="text" name="card-number" :value="old('card-number')" placeholder="0000 0000 0000 0000" required autofocus />
                    <x-input-error :messages="$errors->get('card-error')" for="card-number" class="mt-2" />
                </div>
                <div>
                    <x-input-label for="card-name" :value="__('Nome impresso no cartão')" />
                    <x-text-input id="card-name" class="block mt-1 w-full" type="text" name="card-name" :value="old('card-name')" placeholder="Nome impresso no cartão" required autofocus />
                    <x-input-error :messages="$errors->get('card-error')" for="card-name" class="mt-2" />
                </div>
                <div>
                    <x-input-label for="card-expiration" :value="__('Data de expiração')" />
                    <x-text-input type="number" id="card-expiration" class="block mt-1 w-full" type="text" name="card-expiration" :value="old('card-expiration')" placeholder="MM/AA" required autofocus />
                    <x-input-error :messages="$errors->get('card-error')" for="card-expiration" class="mt-2" />
                </div>
                <div>
                    <x-input-label for="card-cvv" :value="__('CVV')" />
                    <x-text-input type="number" id="card-cvv" class="block mt-1 w-full" type="text" name="card-cvv" :value="old('card-cvv')" placeholder="CVV" required autofocus />
                    <x-input-error :messages="$errors->get('card-error')" for="card-cvv" class="mt-2" />
                </div>
                <div>
                    <a href="{{ route('service.pay', $service->id) }}">
                        <x-primary-button>
                            {{ __('Pagar') }}
                        </x-primary-button>
                    </a>
                </div>
            </div>
            <div class="hidden items-center space-y-6" id="pix" role="tabpanel" aria-labelledby="pix-tab">
                <!-- <img class="w-16 md:w-32 lg:w-48" src="..."> -->
                <div class="flex justify-center">
                    {{ QrCode::size(200)->generate(route('service.pay', $service->id)) }}
                </div>
            </div>
        </div>
    </div>
</div>
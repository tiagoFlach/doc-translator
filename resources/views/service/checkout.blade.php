<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Check Out') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">


            <div class="inline-flex space-x-4 p-4 sm:p-8 bg-white shadow sm:rounded-lg">

                <div class="p-8 w-1/2 h-full rounded bg-gray-200">
                    <header class="mb-8 lg:mb-6 not-format">
                        <h1 class="text-3xl font-black">Resumo do Pedido</h1>
                    </header>

                    <!-- Item -->
                    <div class="flex py-1 justify-between">
                        <p>
                            {{ $service->user->name }}
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


                <div class="p-8 w-1/2">
                    <header class="mb-4 lg:mb-6 not-format">
                        <h1 class="mb-1 text-3xl font-extrabold leading-tight text-gray-900 lg:mb-6 lg:text-4xl dark:text-white">
                            Forma de pagamento
                        </h1>
                    </header>


                    <div class="sm:hidden">
                        <label for="tabs" class="sr-only">Select your country</label>
                        <select id="tabs" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option>Cartão de Crédito</option>
                            <option>PIX</option>
                        </select>
                    </div>
                    <ul class="hidden text-sm font-medium text-center text-gray-500 divide-x divide-gray-200 rounded-lg sm:flex dark:divide-gray-700 dark:text-gray-400">
                        <li class="w-full">
                            <a href="#" class="inline-block w-full p-4 text-gray-900 bg-gray-100 rounded-l-lg focus:ring-4 focus:ring-blue-300 active focus:outline-none dark:bg-gray-700 dark:text-white" aria-current="page">
                                Cartão de Crédito
                            </a>
                        </li>
                        <li class="w-full">
                            <a href="#" class="inline-block w-full p-4 bg-white hover:text-gray-700 hover:bg-gray-50 focus:ring-4 focus:ring-blue-300 focus:outline-none dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700">
                                PIX
                            </a>
                        </li>
                    </ul>

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
                        <div class="hidden" id="credit-card" role="tabpanel" aria-labelledby="credit-card-tab">
                            <p class="text-sm text-gray-500 dark:text-gray-400">This is some placeholder content the <strong class="font-medium text-gray-800 dark:text-white">Profile tab's associated content</strong>. Clicking another tab will toggle the visibility of this one for the next. The tab JavaScript swaps classes to control the content visibility and styling.</p>
                        </div>
                        <div class="hidden" id="pix" role="tabpanel" aria-labelledby="pix-tab">

                            <img class="w-16 md:w-32 lg:w-48" src="...">

                            {{ QrCode::size(200)->generate(route('service.pay', $service->id)) }}

                            <a href="{{ route('service.pay', $service->id) }}">
                                <x-primary-button>
                                    {{ __('Pagar') }}
                                </x-primary-button>
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
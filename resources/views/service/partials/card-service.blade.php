<div class="flex flex-col rounded-lg bg-white shadow-lg dark:bg-neutral-700 md:max-w-xl md:flex-row">
    @if ($service->category->name == 'Medic')
    <div class="flex items-center justify-center h-24 md:h-full w-full md:w-32 rounded-t-lg md:rounded-none md:rounded-l-lg bg-gradient-to-br from-cyan-500/50 to-blue-500/50">
        <div>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="w-12 h-12"><!--! Font Awesome Pro 6.3.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                <path d="M126.4 21.9c5.6 16.8-3.5 34.9-20.2 40.5L80 71.1V192c0 53 43 96 96 96s96-43 96-96V71.1l-26.1-8.7c-16.8-5.6-25.8-23.7-20.2-40.5s23.7-25.8 40.5-20.2l26.1 8.7C318.4 19.1 336 43.5 336 71.1V192c0 77.2-54.6 141.6-127.3 156.7C215 404.6 262.4 448 320 448c61.9 0 112-50.1 112-112V265.3c-28.3-12.3-48-40.5-48-73.3c0-44.2 35.8-80 80-80s80 35.8 80 80c0 32.8-19.7 61-48 73.3V336c0 97.2-78.8 176-176 176c-92.9 0-168.9-71.9-175.5-163.1C71.2 334.2 16 269.6 16 192V71.1c0-27.5 17.6-52 43.8-60.7L85.9 1.6c16.8-5.6 34.9 3.5 40.5 20.2zM464 224a32 32 0 1 0 0-64 32 32 0 1 0 0 64z" />
            </svg>
        </div>
    </div>
    @elseif ($service->category->name == 'Study')
    <div class="flex items-center justify-center h-24 md:h-full w-full md:w-32 rounded-t-lg md:rounded-none md:rounded-l-lg bg-gradient-to-br from-rose-500/50 to-red-500/50">
        <div>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" class="w-12 h-12"><!--! Font Awesome Pro 6.3.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                <path d="M320 32c-8.1 0-16.1 1.4-23.7 4.1L15.8 137.4C6.3 140.9 0 149.9 0 160s6.3 19.1 15.8 22.6l57.9 20.9C57.3 229.3 48 259.8 48 291.9v28.1c0 28.4-10.8 57.7-22.3 80.8c-6.5 13-13.9 25.8-22.5 37.6C0 442.7-.9 448.3 .9 453.4s6 8.9 11.2 10.2l64 16c4.2 1.1 8.7 .3 12.4-2s6.3-6.1 7.1-10.4c8.6-42.8 4.3-81.2-2.1-108.7C90.3 344.3 86 329.8 80 316.5V291.9c0-30.2 10.2-58.7 27.9-81.5c12.9-15.5 29.6-28 49.2-35.7l157-61.7c8.2-3.2 17.5 .8 20.7 9s-.8 17.5-9 20.7l-157 61.7c-12.4 4.9-23.3 12.4-32.2 21.6l159.6 57.6c7.6 2.7 15.6 4.1 23.7 4.1s16.1-1.4 23.7-4.1L624.2 182.6c9.5-3.4 15.8-12.5 15.8-22.6s-6.3-19.1-15.8-22.6L343.7 36.1C336.1 33.4 328.1 32 320 32zM128 408c0 35.3 86 72 192 72s192-36.7 192-72L496.7 262.6 354.5 314c-11.1 4-22.8 6-34.5 6s-23.5-2-34.5-6L143.3 262.6 128 408z" />
            </svg>
        </div>
    </div>
    @else
    <div class="flex items-center justify-center h-24 md:h-full w-full md:w-32 rounded-t-lg md:rounded-none md:rounded-l-lg bg-gradient-to-br from-amber-400/50 to-yellow-500/50">
        <div>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" class="w-12 h-12"><!--! Font Awesome Pro 6.3.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                <path d="M64 464c-8.8 0-16-7.2-16-16V64c0-8.8 7.2-16 16-16H224v80c0 17.7 14.3 32 32 32h80V448c0 8.8-7.2 16-16 16H64zM64 0C28.7 0 0 28.7 0 64V448c0 35.3 28.7 64 64 64H320c35.3 0 64-28.7 64-64V154.5c0-17-6.7-33.3-18.7-45.3L274.7 18.7C262.7 6.7 246.5 0 229.5 0H64zm56 256c-13.3 0-24 10.7-24 24s10.7 24 24 24H264c13.3 0 24-10.7 24-24s-10.7-24-24-24H120zm0 96c-13.3 0-24 10.7-24 24s10.7 24 24 24H264c13.3 0 24-10.7 24-24s-10.7-24-24-24H120z" />
            </svg>
        </div>
    </div>
    @endif

    <div class="flex flex-col justify-between w-full md:w-4/5 p-6">
        <div>
            <header class="mb-3 lg:mb-6 not-format">
                <h5 class="mb-1 text-xl font-medium text-neutral-800 dark:text-neutral-50">
                    {{ $service->title }}
                </h5>
                <x-language-badge :service="$service" class="bg-slate-100" />
            </header>

            <p class="mb-4 text-base text-neutral-600 dark:text-neutral-200">
                {{ mb_strimwidth($service->description, 0, 120, "..."); }}
            </p>
            <p class="text-xs text-neutral-500 dark:text-neutral-300">
                {{ $service->created_at }}
            </p>
        </div>

        <div class="flex mt-3 justify-between">
            <span class="inline-block align-block text-lg font-bold">
                $ {{ $service->price }}
            </span>

            <a href="{{ route('service.show', $service->id) }}">
                <x-secondary-button class="ml-4">
                    {{ __('Ver') }}
                </x-secondary-button>
            </a>
        </div>
    </div>
</div>
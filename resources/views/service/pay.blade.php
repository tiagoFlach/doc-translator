<x-blank-layout>
    <p class="mb-1 text-xl">
        {{ $service->translator->name }}
    </p>
    <h1 class="mb-10 text-4xl font-bold">
        {{ $service->title }}
    </h1>

    <p class="mb-10 text-5xl font-black">
        $ {{ $service->price }}
    </p>

    <a href="{{ route('service.confirmPay', $service->id) }}">
        <button type="submit" class="inline-flex items-center px-6 py-2 bg-gray-800 border border-transparent rounded-md font-bold text-xl text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-hidden focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
            {{ __('Pagar') }}
        </button>
    </a>
</x-blank-layout>
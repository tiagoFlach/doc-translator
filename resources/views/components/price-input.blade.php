@props(['disabled' => false])

<!-- <input type="file" {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'text-sm focus:border-indigo-500 focus:ring-indigo-500 text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold hover:file:bg-slate-100']) !!}> -->

<div class="flex" {{ $disabled ? 'disabled' : '' }}>
    <span class="inline-flex items-center px-3 text-sm text-gray-900 bg-slate-100 border border-r-0 border-gray-300 rounded-l-md dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
        $
    </span>
    <input type="number" id="website-admin" class="rounded-none rounded-r-lg block flex-1 min-w-0 w-full text-sm border-gray-300 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >
</div>
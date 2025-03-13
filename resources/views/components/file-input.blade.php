@props(['disabled' => false])

<input type="file" {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge([
    'class' =>
        'px-4 text-sm focus:border-indigo-500 focus:ring-indigo-500 text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold hover:file:bg-slate-100',
]) !!}>

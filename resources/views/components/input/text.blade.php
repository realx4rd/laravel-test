@props(['name', 'label'])

<div>
    <x-input-label for="{{ $name }}" :value="$label" />

    <input {!! $attributes->merge([
        'id' => $name,
        'wire:model' => $name,
        'class' =>
            'block w-full border-gray-300 border-gray-700 bg-gray-900 text-gray-300 focus:border-indigo-500 focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm',
    ]) !!}>

    {{-- show error message --}}
    @error($name)
        <p class="text-sm text-red-600 dark:text-red-400 space-y-1">{{ $message }}</p>
    @enderror
</div>

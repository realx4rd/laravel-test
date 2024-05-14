@props(['name', 'label'])

<div>
    <x-input-label for="{{ $name }}" :value="$label" />

    <input {!! $attributes->merge([
        'id' => $name,
        'wire:model' => $name,
        'class' => 'w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm',
    ]) !!}>

    {{-- show error message --}}
    @error($name)
        <p class="text-sm text-red-600 dark:text-red-400 space-y-1">{{ $message }}</p>
    @enderror
</div>

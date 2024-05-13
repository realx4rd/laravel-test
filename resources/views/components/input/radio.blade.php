@props(['name', 'label', 'values' => [0 => 'No', 1 => 'Yes']])

<div>
    <label class="block text-gray-700 font-bold mb-2" for="{{ $name }}">
        {{ $label }}
    </label>
    <div class="mt-2">
        @foreach ($values as $key => $option)
            <div class="flex items-center gap-2">
                <input type="radio" id="{{ $name . $key }}" class="form-radio text-indigo-600 h-5 w-5"
                    name="{{ $name }}" value="{{ $key }}" wire:model.live="{{ $name }}">
                <label for="{{ $name . $key }}">{{ $option }}</label>
            </div>
        @endforeach
    </div>

    @error($name)
        <p class="text-sm text-red-600 dark:text-red-400 space-y-1">{{ $message }}</p>
    @enderror
</div>

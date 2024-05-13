@props(['label', 'name'])
<div>
    <label class="block mb-1">{{ $label }}</label>
    <div class="flex mb-4">

        <select name="{{ $name }}Month" wire:model="{{ $name }}Month"
            class="w-1/3 rounded-md border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 mr-2">
            <!-- Month options here -->
            <option selected value="">Select</option>
            @for ($i = 1; $i < 12; $i++)
                <option value="{{ $i }}">{{ date('F', mktime(0, 0, 0, $i, 10)) }}</option>
            @endfor
        </select>

        <select name="{{ $name }}Day" wire:model="{{ $name }}Day"
            class="w-1/3 rounded-md border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 mr-2">
            <!-- Day options here -->
            <option selected value="">Select</option>
            @for ($i = 1; $i < 32; $i++)
                <option value="{{ $i }}">{{ $i }}</option>
            @endfor
        </select>
        <select name="{{ $name }}Year" wire:model="{{ $name }}Year"
            class="w-1/3 rounded-md border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200">
            <!-- Year options here -->
            <option selected value="">Select</option>
            @for ($i = date('Y'); $i > 1950; $i--)
                <option value="{{ $i }}">{{ $i }}</option>
            @endfor
        </select>
    </div>

    @error($name . 'Day')
        <p class="text-sm text-red-600 dark:text-red-400 space-y-1">{{ $message }}</p>
    @enderror
    @error($name . 'Month')
        <p class="text-sm text-red-600 dark:text-red-400 space-y-1">{{ $message }}</p>
    @enderror
    @error($name . 'Year')
        <p class="text-sm text-red-600 dark:text-red-400 space-y-1">{{ $message }}</p>
    @enderror
</div>

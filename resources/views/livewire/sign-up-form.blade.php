<div x-data="{ marriedCheck: $wire.entangle('advance.isMarried'), isBasicForm: $wire.entangle('isBasicForm') }">

    <form wire:submit="submit">

        <div class="flex justify-between">
            <h2 class="text-xl font-medium mb-4" x-text="isBasicForm ? 'Basic Form' : 'Advance Form'"></h2>
            <div wire:loading>Loading..</div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4" x-show="isBasicForm">
            <x-input.text name="basic.firstName" label="First Name" />
            <x-input.text name="basic.lastName" label="Last Name" />
            <x-input.text name="basic.address" label="Address" />
            <x-input.text name="basic.city" label="City" />
            <x-input.text name="basic.country" label="Country" />
            <x-input.date name="basic.birth" label="Date of birth" />
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4" x-show="!isBasicForm">
            <x-input.radio name="advance.isMarried" label="Are you married?" />

            <!-- Conditional Fields for isMarried -->
            <div style="display: none" x-show="marriedCheck === true">
                <x-input.date name="advance.marriage" label="Date of marriage" class="mb-4" />
                <x-input.text name="advance.marriageCountry" label="Country of marriage" />

                @error('marriageDate')
                    <p class="text-sm text-red-600 dark:text-red-400 space-y-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Conditional Fields for Not Married -->
            <div style="display: none" x-show="marriedCheck === false">
                <x-input.radio name="advance.isWidow" label="Are you widowed?" />
                <x-input.radio name="advance.isMarriadInPast" label=" Have you ever been married in the past?" />
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-6">
            <div class="flex justify-between">
                <x-primary-button type="submit" x-bind:disabled="isBasicForm">Submit</x-primary-button>
                <div class="flex justify-end gap-2">
                    <x-primary-button type="button" x-bind:disabled="isBasicForm"
                        wire:click="previous">Previous</x-primary-button>
                    <x-primary-button type="button" x-bind:disabled="!isBasicForm"
                        wire:click="next">Next</x-primary-button>
                </div>
            </div>
        </div>
    </form>
</div>

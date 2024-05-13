<x-layouts.app>
    <div class="py-4">

        @session('formData')
            @foreach (session('formData') as $key => $value)
                <h2 class="font-bold text-xl text-gray-700 mb-4 mt-4">{{ ucfirst($key) }}</h2>
                <table class="w-full border-collapse table-auto">
                    <tbody>
                        @foreach ($value as $itemKey => $item)
                            <tr class="border-b border-gray-200">
                                <td class="px-4 py-2">{{ $itemKey }}</td>
                                <td class="px-4 py-2">{{ $item }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endforeach
        @endSession

    </div>
</x-layouts.app>

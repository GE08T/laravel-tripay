<x-app-layout>
    <x-slot name="header">
        <a href="{{ route('donation') }}" class="text-white bg-red-800 hover:bg-red-900 focus:outline-none focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 inline-flex ">Back</a>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight inline-flex ml-3">
            {{ __('Transaction') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    test
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
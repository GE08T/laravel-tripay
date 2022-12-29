<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <p class="font-semibold text-lg mb-3">Last Donation</p>


                    <div class="overflow-x-auto relative m-4 shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left text-gray-500">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-100">
                                <tr>
                                    <th scope="col" class="py-3 px-6">
                                        Name
                                    </th>
                                    <th scope="col" class="py-3 px-6">
                                        Title
                                    </th>
                                    <th scope="col" class="py-3 px-6">
                                        Amount
                                    </th>
                                    <th scope="col" class="py-3 px-6">
                                        Status
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($transactions as $transaction)
                                    <tr class="bg-white border-b ">
                                        <th scope="row"
                                            class="flex items-center py-4 px-6 text-gray-900 whitespace-nowrap">
                                            <img class="w-10 h-10 rounded-full"
                                                src="{{ 'https://randomuser.me/photos' }}" alt="Jese image">
                                            <div class="pl-3">
                                                <div class="text-base font-semibold">{{ $transaction->user->name }}
                                                </div>
                                                <div class="font-normal text-gray-500">{{ $transaction->user->email }}
                                                </div>
                                            </div>
                                        </th>
                                        <td class="py-4 px-6">
                                            {{ $transaction->title }}
                                        </td>
                                        <td class="py-4 px-6">
                                            Rp. {{ number_format($transaction->total_amount) }}
                                        </td>
                                        <td class="py-4 px-6">
                                            @if ($transaction->status == 'paid')
                                                <span
                                                    class="bg-green-100 text-green-800 text-sm font-semibold uppercase mr-2 px-2.5 py-0.5 rounded-xl">{{ $transaction->status }}</span>
                                            @else
                                                <span
                                                    class="bg-red-100 text-red-800 text-sm font-semibold uppercase mr-2 px-2.5 py-0.5 rounded-xl">{{ $transaction->status }}</span>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>

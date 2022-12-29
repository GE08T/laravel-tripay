<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight ml-3">
            {{ __('Transaction') }}
        </h2>
    </x-slot>

    <div class="py-12 px-12">

        <div class="max-w-7xl mb-12 col-rows-3 rounded-lg shadow-sm bg-white">
            <div class="p-6 ">
                <div class="flow-root mb-8">  
                    <p class="text-xl font-light float-left">Transaction Detail</p> 
                    <p class="text-xl font-bold float-right">#{{ $detail->reference }}</p>
                </div>

                <p class="text-5xl font-extrabold mb-4">Rp. {{ number_format($detail->amount) }}</p>
                    @if($detail->status == "paid")
                    <span class="bg-green-100 text-green-800 text-sm font-semibold uppercase mr-2 px-2.5 py-0.5 rounded-xl">{{ $detail->status }}</span>
                    @else
                    <span class="bg-red-100 text-red-800 text-sm font-semibold uppercase mr-2 px-2.5 py-0.5 rounded-xl">{{ $detail->status }}</span>
                    @endif
            </div>
        </div>
        <div class="max-w-7xl rounded-lg shadow-sm bg-white">
            <div class="p-6">
                <p class="text-xl font-light mb-6">Instruction</p>

                <ul class="grid gap-6 w-full mb-5 grid-cols-3">
                    @foreach($detail->instructions as $instruction)
                    <li>
                        <div class="rounded-lg shadow-sm bg-white p-6 border border-gray-500 ">
                            <p class="text-xl font-bold mb-3">{{ $instruction->title }} :</p>

                            <ol class="space-y-2 max-w-7xl list-decimal list-inside text-gray-500 ">
                                @foreach($instruction->steps as $step)
                                <li class="font-semibold text-gray-900">
                                    {!! $step !!}
                                </li>
                                @endforeach
                            </ol>
                        </div>
                    </li>
                    @endforeach
                </ul>
                
            </div>
        </div>

    </div>
</x-app-layout>